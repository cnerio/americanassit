<?php
class Shockwave extends Controller {
  private $recordsModel;
  private $enrollModel;

  public function __construct(){
    if(!isLoggedIn()){
      redirect('users/login');
    }

    $this->recordsModel = $this->model('Record');
    $this->enrollModel = $this->model('Enroll');
  }

  public function index(){
    $data = [
      'leads' => $this->recordsModel->getShockwaveRetryQueue()
    ];

    $this->view('shockwave/index', $data);
  }

  public function recreate(){
    header('Content-Type: application/json; charset=utf-8');

    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
      http_response_code(405);
      echo json_encode([
        'success' => false,
        'message' => 'Method not allowed.'
      ]);
      return;
    }

    $customerId = trim((string)($_POST['customer_id'] ?? ''));
    if($customerId === ''){
      http_response_code(422);
      echo json_encode([
        'success' => false,
        'message' => 'customer_id is required.'
      ]);
      return;
    }

    $retryRecord = $this->recordsModel->getShockwaveRetryRecord($customerId);
    if(empty($retryRecord)){
      http_response_code(404);
      echo json_encode([
        'success' => false,
        'message' => 'Lead is not in the Shockwave retry queue.'
      ]);
      return;
    }

    $rows = $this->enrollModel->getCustomerData($customerId);
    if(empty($rows) || empty($rows[0])){
      http_response_code(404);
      echo json_encode([
        'success' => false,
        'message' => 'Customer not found.'
      ]);
      return;
    }

    $customerData = $rows[0];
    $company = !empty($customerData['ETC']) ? $customerData['ETC'] : 'AMBT';
    $credentials = $this->enrollModel->getCredentials($company);

    if(empty($credentials) || empty($credentials[0])){
      http_response_code(500);
      echo json_encode([
        'success' => false,
        'message' => 'Credentials not found for company ' . $company
      ]);
      return;
    }

    $packages = $this->enrollModel->getPackages($company);
    $ambtApi = new AmbtApiHelper();
    $selectedPackage = $ambtApi->selectPackageForCustomer($customerData, $packages);
    $payload = $ambtApi->buildAddSubscriberPayload($customerData, $credentials[0], $selectedPackage);

    if (empty($payload['DOB']) || preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $payload['DOB']) !== 1) {
      http_response_code(422);
      echo json_encode([
        'success' => false,
        'message' => 'Invalid DOB format. Expected mm/dd/yyyy.',
        'customer_id' => $customerId
      ]);
      return;
    }

    $this->updateProcessStatus($customerId, 'Retrying AddSubscriberOrderWithEBBData API');
    $apiResult = $ambtApi->submitAddSubscriberOrder($payload);

    $this->enrollModel->saveData([
      'customer_id' => $customerId,
      'url' => $apiResult['url'] ?? AMBT_ADD_SUBSCRIBER_URL,
      'request' => $apiResult['request'] ?? json_encode($payload),
      'response' => is_array($apiResult['response'] ?? null) ? json_encode($apiResult['response']) : ($apiResult['response'] ?? ''),
      'title' => 'Retry AddSubscriberOrderWithEBBData'
    ], 'lifeline_apis_log');

    if(($apiResult['status'] ?? 'error') !== 'success'){
      $this->enrollModel->updateData([
        'customer_id' => $customerId,
        'order_status' => 'Unknown Error',
        'process_status' => 'Retry AddSubscriberOrderWithEBBData API failed',
        'status_text' => $apiResult['msg'] ?? 'Unknown Error'
      ], 'lifeline_records');

      http_response_code(502);
      echo json_encode([
        'success' => false,
        'message' => $apiResult['msg'] ?? 'Shockwave API request failed.'
      ]);
      return;
    }

    $responseBody = is_array($apiResult['response'] ?? null) ? $apiResult['response'] : [];
    $orderId = (int)($responseBody['SubscriberOrderID'] ?? 0);
    $orderStatus = $this->resolveOrderStatus($orderId);

    $this->enrollModel->updateData([
      'customer_id' => $customerId,
      'order_id' => $orderId > 0 ? $orderId : null,
      'account' => $responseBody['AccountNumber'] ?? null,
      'acp_status' => $responseBody['NLADStatus'] ?? ($responseBody['Status'] ?? null),
      'status_text' => $responseBody['StatusText'] ?? null,
      'process_status' => 'Retry AddSubscriberOrderWithEBBData API',
      'order_status' => $orderStatus
    ], 'lifeline_records');

    $documentUploads = [];
    $idDoc = null;
    $pobDoc = null;

    if($orderId > 0){
      $documentUploads['Consent'] = $this->ensureConsentAndUpload($customerId, $orderId, $company);

      $idDoc = $this->enrollModel->getFiles($customerId, 'ID');
      if(!empty($idDoc)){
        $documentUploads['ID'] = $this->uploadDocumentForOrder($customerId, $orderId, 'ID', $company, $idDoc);
      }

      $pobDoc = $this->enrollModel->getFiles($customerId, 'POB');
      if(!empty($pobDoc)){
        $documentUploads['POB'] = $this->uploadDocumentForOrder($customerId, $orderId, 'POB', $company, $pobDoc);
      }

      if(empty($idDoc) && empty($pobDoc)){
        $this->enrollModel->updateData([
          'customer_id' => $customerId,
          'order_status' => 'Missing Documents',
          'process_status' => 'Retry created order but no ID or POB documents were found'
        ], 'lifeline_records');
        $orderStatus = 'Missing Documents';
      }
    }

    echo json_encode([
      'success' => true,
      'message' => $orderId > 0 ? 'Shockwave order recreated.' : 'Shockwave returned no valid order ID.',
      'customer_id' => $customerId,
      'order_id' => $orderId,
      'order_status' => $orderStatus,
      'documents' => $documentUploads,
      'response' => $responseBody
    ]);
  }

  private function resolveOrderStatus($orderId){
    if($orderId === 0){
      return 'Rejected by Shockwave';
    }

    if($orderId > 0){
      return 'New';
    }

    return 'Unknown Error';
  }

  private function updateProcessStatus($customerId, $status){
    $this->enrollModel->updateData([
      'customer_id' => $customerId,
      'process_status' => $status
    ], 'lifeline_records');
  }

  private function ensureConsentAndUpload($customerId, $orderId, $company){
    $consentDoc = $this->enrollModel->getFiles($customerId, 'Consent');

    if(empty($consentDoc)){
      $this->updateProcessStatus($customerId, 'Generating consent PDF for retry');
      $consentFile = $this->getConsentFile($orderId);
      if(($consentFile['status'] ?? 'error') !== 'success' || empty($consentFile['URL'])){
        $this->updateProcessStatus($customerId, 'Retry consent generation failed');
        return [
          'status' => 'error',
          'msg' => 'Consent PDF generation failed: ' . ($consentFile['msg'] ?? 'unknown error')
        ];
      }

      $this->enrollModel->saveData([
        'customer_id' => $customerId,
        'filepath' => $consentFile['URL'],
        'type_doc' => 'Consent'
      ], 'lifeline_documents');

      $consentDoc = $this->enrollModel->getFiles($customerId, 'Consent');
    }

    if(empty($consentDoc)){
      return [
        'status' => 'error',
        'msg' => 'Consent document is missing after generation.'
      ];
    }

    return $this->uploadDocumentForOrder($customerId, $orderId, 'Consent', $company, $consentDoc);
  }

  private function uploadDocumentForOrder($customerId, $orderId, $fileType, $company, $fileData){
    $diskFilePath = $this->resolveDocumentDiskPath($fileData['filepath'] ?? '');
    if($diskFilePath === '' || !file_exists($diskFilePath)){
      $result = [
        'status' => 'error',
        'msg' => $fileType . ' file path not found on disk.'
      ];
      $this->updateProcessStatus($customerId, $result['msg']);
      return $result;
    }

    $imageData = file_get_contents($diskFilePath);
    if($imageData === false){
      $result = [
        'status' => 'error',
        'msg' => 'Unable to read ' . $fileType . ' file.'
      ];
      $this->updateProcessStatus($customerId, $result['msg']);
      return $result;
    }

    $credentials = $this->enrollModel->getCredentials($company);
    if(empty($credentials) || empty($credentials[0])){
      $result = [
        'status' => 'error',
        'msg' => 'Credentials not found for company ' . $company
      ];
      $this->updateProcessStatus($customerId, $result['msg']);
      return $result;
    }

    $ambtApi = new AmbtApiHelper();
    $upload = $ambtApi->uploadDocument(
      $credentials[0],
      $orderId,
      basename($diskFilePath),
      base64_encode($imageData),
      $this->getDocumentTypeId($fileType)
    );

    $this->enrollModel->saveData([
      'customer_id' => $customerId,
      'url' => $upload['url'] ?? AMBT_UPLOAD_DOCUMENT_URL,
      'request' => $upload['request'] ?? '',
      'response' => is_array($upload['response'] ?? null) ? json_encode($upload['response']) : ($upload['response'] ?? ''),
      'title' => 'Retry Upload ' . $fileType
    ], 'lifeline_apis_log');

    if(($upload['status'] ?? 'error') === 'success' && !empty($fileData['id_lifeline_doc'])){
      $this->enrollModel->updateDocStatus([
        'id_lifeline_doc' => $fileData['id_lifeline_doc'],
        'to_unavo' => 1
      ], 'lifeline_documents');
    }

    $result = [
      'status' => $upload['status'] ?? 'error',
      'msg' => ($upload['status'] ?? 'error') === 'success' ? $fileType . ' FILE UPLOADED' : ($upload['msg'] ?? ($fileType . ' FILE COULDN\'T BE UPLOADED'))
    ];
    $this->updateProcessStatus($customerId, $result['msg']);

    return $result;
  }

  private function getDocumentTypeId($fileType){
    switch($fileType){
      case 'ID':
        return '100001';
      case 'POB':
        return '100000';
      case 'Consent':
        return '100025';
    }

    return '';
  }

  private function resolveDocumentDiskPath($filePath){
    $normalizedPath = trim((string)$filePath);
    if($normalizedPath === ''){
      return '';
    }

    $normalizedPath = str_replace('\\', '/', $normalizedPath);
    $projectRoot = rtrim(str_replace('\\', '/', dirname(APPROOT)), '/');

    if(preg_match('/^[A-Za-z]:\//', $normalizedPath) === 1){
      return str_replace('/', DIRECTORY_SEPARATOR, $normalizedPath);
    }

    if(strpos($normalizedPath, URLROOT) === 0){
      $normalizedPath = substr($normalizedPath, strlen(URLROOT));
    }

    $normalizedPath = ltrim($normalizedPath, '/');
    if(strpos($normalizedPath, 'public/') !== 0){
      $normalizedPath = 'public/' . $normalizedPath;
    }

    return str_replace('/', DIRECTORY_SEPARATOR, $projectRoot . '/' . $normalizedPath);
  }

  private function getConsentFile($orderId){
    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => URLROOT . '/public/files/consentPDF/',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => json_encode([
        'orderId' => (int)$orderId
      ]),
      CURLOPT_SSL_VERIFYHOST => IS_LOCALHOST ? 0 : 2,
      CURLOPT_SSL_VERIFYPEER => IS_LOCALHOST ? 0 : 1,
      CURLOPT_HTTPHEADER => [
        'Content-Type: application/json'
      ]
    ]);

    $response = curl_exec($curl);
    $curlError = curl_error($curl);
    $curlErrno = curl_errno($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if($curlErrno){
      return [
        'status' => 'error',
        'msg' => $curlError
      ];
    }

    if($httpCode >= 400){
      return [
        'status' => 'error',
        'msg' => 'HTTP ERROR CODE: ' . $httpCode
      ];
    }

    $decoded = json_decode($response, true);
    return is_array($decoded) ? $decoded : [
      'status' => 'error',
      'msg' => 'Invalid consent response.'
    ];
  }
}