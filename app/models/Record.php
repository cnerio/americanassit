<?php 
class Record {
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	
	public function saveApiLog($customer_id,$url,$request,$response,$title){
		$data=[
		"customer_id"=>$customer_id,
		"url"=>$url,
		"request"=>$request,
		"response"=>$response,
		"title"=>$title
		];
		$this->db->insertQuery("lifeline_apis_log",$data);
	}

	public function getReport()
	{
		$this->db->query('SELECT arc.customer_id as "CUSTOMER_ID",arc.first_name as "FIRST NAME",arc.second_name as "LAST NAME",arc.phone_number as "PHONE NUMBER", arc.email as "EMAIL",arc.dob as "DOB",arc.address1 as "ADDRESS1",arc.address2 as "ADDRESS2",arc.city as "CITY",arc.state as "STATE",arc.zipcode as "ZIPODE", arc.program_before as "PROGRAM BEFORE", ebp.name as "PROGRAM BENEFIT",arc.order_id as "ORDER ID",arc.account as "ACCOUNT",arc.acp_status as "STATUS",arc.company as "COMPANY ENROLLED",arc.created_at as "CREATED AT" FROM lifeline_records arc LEFT JOIN lifeline_programs ebp ON ebp.id_program=arc.program_benefit WHERE order_id is not null ORDER BY id desc;');
		$getData = $this->db->resultSet();
		return $getData;
	}
	
	public function internalNotes($data){
		/*$data=[
			"customer_id"=>$customer_id,
			"date_note"=>$date_note,
			"type_note"=>$type_note,
			"message_send"=>$message_send,
			"message_confirmation"=>$message_confirmation,
			"id_script"=>$id_script
			"id_user"=>$id_user
		];*/
		$this->db->insertQuery("internal_notes",$data);
	}
	
	public function updateOrder($data){
		$row = $this->db->updateQuery("lifeline_records",$data,"id=:id");
		return $row;
	}

	public function updateOrderbycustomerid($data){
		$row = $this->db->updateQuery("lifeline_records",$data,"customer_id=:customer_id");
		return $row;
	}
	
	public function countRegisters($filters,$firstload){
		$sql = "SELECT count(*) as total FROM lifeline_records";
		$params = [];

		if ($firstload !== "YES" && !empty($filters)) {
			$whereParts = [];
			foreach ($filters as $field => $value) {
				$param = ":f_" . $field;
				$whereParts[] = "$field LIKE $param";
				$params[$param] = '%' . $value . '%';
			}
			$sql .= " WHERE " . implode(" AND ", $whereParts);
		}

		$this->db->query($sql);
		foreach ($params as $param => $value) {
			$this->db->bind($param, $value);
		}

		$count = $this->db->single();
		return $count['total'];
	}
	
	public function getProgram(){
		$this->db->query("SELECT * FROM lifeline_programs WHERE active = 1");
		$this->db->execute();
		$row = $this->db->resultSet();
		return $row;
	}

    public function getProgramNames($idProgram){
		$this->db->query("SELECT * FROM lifeline_programs WHERE id_program=:id_program");
        $this->db->bind(":id_program",$idProgram);
		$this->db->execute();
		$row = $this->db->resultSet();
		return $row;
	}
	

	
	public function getScript($source){
		$this->db->query("SELECT * FROM c1_surgephone.script WHERE source=:source");
		$this->db->bind("source",$source);
		$this->db->execute();
		$row = $this->db->resultSet();
		return $row;
	}
	
	
	public function getOrder($orderid){
		$this->db->query('SELECT * FROM lifeline_records WHERE id=:id');
		$this->db->bind("id",$orderid);
		$getOrder = $this->db->single();
		return $getOrder;
		
	}

    public function getCustomerInfo($customer_id){
        $this->db->query('SELECT lr.id, lr.customer_id, lr.first_name, lr.second_name, lr.email, lr.dob, lr.phone_number, lr.ssn, lr.address1, lr.address2, lr.city, lr.state, lr.zipcode, lr.order_id, lr.order_status, lr.program_benefit, lr.created_at, lr.status_text, lp.name AS program_name FROM lifeline_records lr LEFT JOIN lifeline_programs lp ON lr.program_benefit = lp.id_program WHERE lr.customer_id=:id LIMIT 1');
		$this->db->bind("id",$customer_id);
		$getOrder = $this->db->single();

		if(!$getOrder){
			return null;
		}

        $this->db->query('SELECT * FROM lifeline_documents WHERE customer_id=:id');
        $this->db->bind("id",$customer_id);
		$getDocuments = $this->db->resultSet();
        
        $getOrder['documents']=($getDocuments)?$getDocuments:null;
		return $getOrder;
    }
	
	public function datatoExport(){
		$this->db->query('SELECT arc.customer_id as "CUSTOMER ID",arc.first_name as "FIRST NAME",arc.second_name as "LAST NAME",arc.phone_number as "PHONE NUMBER", arc.email as "EMAIL",arc.dob as "DOB",arc.address1 as "ADDRESS1",arc.address2 as "ADDRESS2",arc.city as "CITY",arc.state as "STATE",arc.zipcode as "ZIPODE", arc.program_before as "PROGRAM BEFORE", ebp.description as "PROGRAM BENEFIT",arc.order_id as "ORDER ID",arc.account as "ACCOUNT",arc.acp_status as "ACP STATUS",arc.company as "COMPANY ENROLLED",UPPER(arc.source) as "SOURCE",arc.created_at as "CREATED AT" FROM lifeline_records arc JOIN c1_surgephone.ebb_programs ebp ON ebp.type_id=arc.program_benefit;');
		$row = $this->db->resultSet();
		return $row;
	}
	
	public function getData($offset,$per_page,$filters,$orderby,$firstload){
		$allowedSortFields = [
			"id", "customer_id", "first_name", "second_name", "phone_number", "email", "dob",
			"city", "state", "zipcode", "order_id", "order_status", "program_benefit", "created_at"
		];

		$sortField = "created_at";
		$sortDirection = "DESC";
		$orderby = trim((string)$orderby);
		if ($orderby !== '') {
			$parts = preg_split('/\s+/', $orderby);
			if (!empty($parts[0]) && in_array($parts[0], $allowedSortFields, true)) {
				$sortField = $parts[0];
			}
			if (isset($parts[1]) && strtoupper($parts[1]) === 'ASC') {
				$sortDirection = 'ASC';
			}
		}

		$sql = "SELECT * FROM lifeline_records";
		$params = [];

		if ($firstload !== "YES" && !empty($filters)) {
			$whereParts = [];
			foreach ($filters as $field => $value) {
				$param = ":f_" . $field;
				$whereParts[] = "$field LIKE $param";
				$params[$param] = '%' . $value . '%';
			}
			$sql .= " WHERE " . implode(" AND ", $whereParts);
		}

		$sql .= " ORDER BY {$sortField} {$sortDirection} LIMIT :offset, :per_page";
		$this->db->query($sql);
		foreach ($params as $param => $value) {
			$this->db->bind($param, $value);
		}
		$this->db->bind(':offset', (int)$offset, PDO::PARAM_INT);
		$this->db->bind(':per_page', (int)$per_page, PDO::PARAM_INT);

		return $this->db->resultSet();
	}

	public function getAllRecords(){
		$sql = 'SELECT lr.id, lr.customer_id, lr.first_name, lr.second_name, lr.phone_number, lr.email, lr.dob, lr.city, lr.state, lr.zipcode, lr.order_id, lr.order_status, lp.name as program_benefit, lr.created_at_ny AS created_at FROM lifeline_records lr LEFT JOIN lifeline_programs lp ON lp.id_program = lr.program_benefit ORDER BY lr.created_at_ny DESC';
		//$logFile = dirname(APPROOT) . '/public/querylog.txt';
		try {
			$this->db->query($sql);
			$rows = $this->db->resultSet();
			//file_put_contents($logFile, sprintf("[%s] getAllRecords rows=%d\nSQL: %s\n", date('Y-m-d H:i:s'), count($rows), $sql), FILE_APPEND);
			return $rows;
		} catch (Throwable $e) {
			//file_put_contents($logFile, sprintf("[%s] getAllRecords ERROR: %s\nSQL: %s\n", date('Y-m-d H:i:s'), $e->getMessage(), $sql), FILE_APPEND);
			return [];
		}
	}

	public function getShockwaveRetryQueue(){
		$this->db->query("SELECT id, customer_id, first_name, second_name, email, phone_number, order_id, order_status, status_text, created_at_ny AS created_at FROM lifeline_records WHERE LOWER(TRIM(COALESCE(order_status, ''))) IN ('unknown error', 'unknow error', 'unfinished') ORDER BY created_at_ny DESC");
		return $this->db->resultSet();
	}

	public function getShockwaveRetryRecord($customerId){
		$this->db->query("SELECT * FROM lifeline_records WHERE customer_id = :customer_id AND LOWER(TRIM(COALESCE(order_status, ''))) IN ('unknown error', 'unknow error', 'unfinished') LIMIT 1");
		$this->db->bind(':customer_id', $customerId);
		return $this->db->single();
	}

    public function getNotes($customer_id){
		$this->db->query("SELECT * FROM internal_notes WHERE customer_id=:customer_id");
		$this->db->bind("customer_id",$customer_id);
		$this->db->execute();
		$row = $this->db->resultSet();
		return $row;
	}

    public function getResponses($customer_id){
		$this->db->query("SELECT * FROM lifeline_apis_log WHERE customer_id=:customer_id");
		$this->db->bind("customer_id",$customer_id);
		$this->db->execute();
		$row = $this->db->resultSet();
		return $row;
	}

	// public function saveStaff($data){
	// 	$this->db->updateOrder("lifeline_records",$data);
	// }

	public function countAllRecords() {
		$this->db->query("SELECT COUNT(*) as total FROM lifeline_records");
		$row = $this->db->single();
		return (int)$row['total'];
	}

	public function countFilteredRecords($search, $statusFilter, $benefitFilter, $startDate, $endDate) {
		$sql = "SELECT COUNT(*) as total FROM lifeline_records lr LEFT JOIN lifeline_programs lp ON lp.id_program = lr.program_benefit WHERE 1=1";
		$params = [];

		if ($search !== '') {
			$sql .= " AND (lr.customer_id LIKE :s1 OR lr.first_name LIKE :s2 OR lr.second_name LIKE :s3 OR lr.phone_number LIKE :s4 OR lr.email LIKE :s5 OR lr.order_id LIKE :s6 OR lr.order_status LIKE :s7)";
			$sv = '%' . $search . '%';
			$params[':s1'] = $sv; $params[':s2'] = $sv; $params[':s3'] = $sv;
			$params[':s4'] = $sv; $params[':s5'] = $sv; $params[':s6'] = $sv; $params[':s7'] = $sv;
		}
		if ($statusFilter !== '') {
			$sql .= " AND lr.order_status = :status_filter";
			$params[':status_filter'] = $statusFilter;
		}
		if ($benefitFilter !== '') {
			$sql .= " AND lp.name = :benefit_filter";
			$params[':benefit_filter'] = $benefitFilter;
		}
		if ($startDate !== '') {
			$sql .= " AND DATE(lr.created_at_ny) >= :start_date";
			$params[':start_date'] = $startDate;
		}
		if ($endDate !== '') {
			$sql .= " AND DATE(lr.created_at_ny) <= :end_date";
			$params[':end_date'] = $endDate;
		}

		$this->db->query($sql);
		foreach ($params as $key => $value) {
			$this->db->bind($key, $value);
		}
		$row = $this->db->single();
		return (int)$row['total'];
	}

	public function getRecordsPaged($start, $length, $search, $orderColumn, $orderDir, $statusFilter, $benefitFilter, $startDate, $endDate) {
		$allowedColumns = ['id', 'customer_id', 'first_name', 'second_name', 'phone_number', 'email', 'dob', 'city', 'state', 'zipcode', 'order_id', 'order_status', 'program_benefit', 'created_at'];
		if (!in_array($orderColumn, $allowedColumns, true)) {
			$orderColumn = 'created_at';
		}
		$orderDir = ($orderDir === 'ASC') ? 'ASC' : 'DESC';
		$columnMap = ['program_benefit' => 'lp.name', 'created_at' => 'lr.created_at_ny'];
		$orderSql = isset($columnMap[$orderColumn]) ? $columnMap[$orderColumn] : 'lr.' . $orderColumn;

		$sql = "SELECT lr.id, lr.customer_id, lr.first_name, lr.second_name, lr.phone_number, lr.email, lr.dob, lr.city, lr.state, lr.zipcode, lr.order_id, lr.order_status, lp.name as program_benefit, lr.created_at_ny AS created_at FROM lifeline_records lr LEFT JOIN lifeline_programs lp ON lp.id_program = lr.program_benefit WHERE 1=1";
		$params = [];

		if ($search !== '') {
			$sql .= " AND (lr.customer_id LIKE :s1 OR lr.first_name LIKE :s2 OR lr.second_name LIKE :s3 OR lr.phone_number LIKE :s4 OR lr.email LIKE :s5 OR lr.order_id LIKE :s6 OR lr.order_status LIKE :s7)";
			$sv = '%' . $search . '%';
			$params[':s1'] = $sv; $params[':s2'] = $sv; $params[':s3'] = $sv;
			$params[':s4'] = $sv; $params[':s5'] = $sv; $params[':s6'] = $sv; $params[':s7'] = $sv;
		}
		if ($statusFilter !== '') {
			$sql .= " AND lr.order_status = :status_filter";
			$params[':status_filter'] = $statusFilter;
		}
		if ($benefitFilter !== '') {
			$sql .= " AND lp.name = :benefit_filter";
			$params[':benefit_filter'] = $benefitFilter;
		}
		if ($startDate !== '') {
			$sql .= " AND DATE(lr.created_at_ny) >= :start_date";
			$params[':start_date'] = $startDate;
		}
		if ($endDate !== '') {
			$sql .= " AND DATE(lr.created_at_ny) <= :end_date";
			$params[':end_date'] = $endDate;
		}

		$sql .= " ORDER BY {$orderSql} {$orderDir} LIMIT :offset, :per_page";
		$this->db->query($sql);
		foreach ($params as $key => $value) {
			$this->db->bind($key, $value);
		}
		$this->db->bind(':offset', (int)$start, PDO::PARAM_INT);
		$this->db->bind(':per_page', (int)$length, PDO::PARAM_INT);
		return $this->db->resultSet();
	}

	public function getDistinctFilterOptions() {
		$this->db->query("SELECT DISTINCT order_status FROM lifeline_records WHERE order_status IS NOT NULL AND order_status != '' ORDER BY order_status");
		$statuses = $this->db->resultSet();

		$this->db->query("SELECT DISTINCT lp.name as program_benefit FROM lifeline_records lr LEFT JOIN lifeline_programs lp ON lp.id_program = lr.program_benefit WHERE lp.name IS NOT NULL AND lp.name != '' ORDER BY lp.name");
		$benefits = $this->db->resultSet();

		return [
			'statuses' => array_column($statuses, 'order_status'),
			'benefits' => array_column($benefits, 'program_benefit'),
		];
	}


}