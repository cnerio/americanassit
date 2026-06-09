<?php
class Users extends Controller{
    public $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    private function isAdminUser(){
        return isLoggedIn() && (int)($_SESSION['rol'] ?? 0) === 1;
    }

    private function ensureAdminJson(){
        if(!$this->isAdminUser()){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Unauthorized"
            ]);
            return false;
        }

        return true;
    }

    public function hashed($string){
        return password_hash($string, PASSWORD_DEFAULT);
    }

    public function adduser(){
        if(!$this->ensureAdminJson()){
            return;
        }

        if($_SERVER['REQUEST_METHOD']!=="POST"){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Invalid request method"
            ]);
            return;
        }

        $name = trim($_POST['addname'] ?? '');
        $email = trim(strtolower($_POST['addemail'] ?? ''));
        $password = trim($_POST['addpassword'] ?? '');
        $rol = isset($_POST['addrol']) ? (int) $_POST['addrol'] : -1;

        if($name === '' || $email === '' || $password === '' || !in_array($rol, [0, 1], true)){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Please complete all required fields"
            ]);
            return;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Please enter a valid email"
            ]);
            return;
        }

        if(strlen($password) < 6){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Password must be at least 6 characters"
            ]);
            return;
        }

        if($this->userModel->findUserByEmail($email)){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Email already exists"
            ]);
            return;
        }

        $data=[
            "name"=>trim(ucfirst(strtolower($name))),
            "email"=>$email,
            "password"=>password_hash($password, PASSWORD_DEFAULT),
            "rol"=>$rol
        ];

        $userId = $this->userModel->saveUser($data);
        if($userId){
            $result = [
                "status"=>"success",
                "user_id"=>$userId,
                "msg"=>"User added successfully"
            ];
        }else{
            $result = [
                "status"=>"error",
                "msg"=>"Somthing Wrong adding user"
            ];
        }

        echo json_encode($result);
    }

       public function updateuser(){
        if(!$this->ensureAdminJson()){
            return;
        }

        if($_SERVER['REQUEST_METHOD']!=="POST"){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Invalid request method"
            ]);
            return;
        }

        $id = isset($_POST['id_user']) ? (int) $_POST['id_user'] : 0;
        $name = trim($_POST['editname'] ?? '');
        $email = trim(strtolower($_POST['editemail'] ?? ''));
        $rol = isset($_POST['editrol']) ? (int) $_POST['editrol'] : -1;
        $resetPass = $_POST['resetPass'] ?? 'N';

        if($id <= 0 || $name === '' || $email === '' || !in_array($rol, [0, 1], true)){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Please complete all required fields"
            ]);
            return;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Please enter a valid email"
            ]);
            return;
        }

        if($this->userModel->findOtherUserByEmail($email, $id)){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Email already exists"
            ]);
            return;
        }

        $data=[
            "name"=>trim(ucfirst(strtolower($name))),
            "email"=>$email,
            "rol"=>$rol,
            "id"=>$id
        ];

        if($resetPass === "Y"){
            $password = trim($_POST['editpass'] ?? '');
            $confirmPassword = trim($_POST['editconfirmpass'] ?? '');

            if(strlen($password) < 6){
                echo json_encode([
                    "status"=>"error",
                    "msg"=>"Password must be at least 6 characters"
                ]);
                return;
            }

            if($password !== $confirmPassword){
                echo json_encode([
                    "status"=>"error",
                    "msg"=>"Password confirmation does not match"
                ]);
                return;
            }

            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userId = $this->userModel->updateuser($data);
        if($userId){
            $result = [
                "status"=>"success",
                "msg"=>"User updated successfully"
            ];
        }else{
            $result = [
                "status"=>"error",
                "user_id"=>$userId,
                "msg"=>"Something wrong updating infor"
            ];
        }

        echo json_encode($result);
    }

    public function removeUser(){
        if(!$this->ensureAdminJson()){
            return;
        }

        if($_SERVER['REQUEST_METHOD']!=="POST"){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Invalid request method"
            ]);
            return;
        }

        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        if($id <= 0){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Invalid user id"
            ]);
            return;
        }

        $data=[
            "id"=>$id,
            "active"=>0
        ];

        $userId = $this->userModel->updateuser($data);
        if($userId){
            $result = [
                "status"=>"success",
                "msg"=>"User removed successfully"
            ];
        }else{
            $result = [
                "status"=>"error",
                "msg"=>"Something wrong removing user"
            ];
        }

        echo json_encode($result);
    }

    public function reactivateUser(){
        if(!$this->ensureAdminJson()){
            return;
        }

        if($_SERVER['REQUEST_METHOD']!=="POST"){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Invalid request method"
            ]);
            return;
        }

        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        if($id <= 0){
            echo json_encode([
                "status"=>"error",
                "msg"=>"Invalid user id"
            ]);
            return;
        }

        $data=[
            "id"=>$id,
            "active"=>1
        ];

        $userId = $this->userModel->updateuser($data);
        if($userId){
            $result = [
                "status"=>"success",
                "msg"=>"User reactivated successfully"
            ];
        }else{
            $result = [
                "status"=>"error",
                "msg"=>"Something wrong reactivating user"
            ];
        }

        echo json_encode($result);
    }

    public function register(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
           // process form
           //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '' 
            ];

            //valide name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            //validate email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }else{
                //check for email
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email already exist';
                }
            }

            //validate password 
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter your password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be atleast six characters';
            }

            //validate confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            }else{
                if($data['password'] != $data['confirm_password'])
                {
                    $data['confirm_password_err'] = 'Password does not match';
                }
            }

            //make sure error are empty
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['password_confirm_err'])){
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if($this->userModel->register($data)){
                    flash('register_success', 'you are registerd you can login now');
                    redirect('users/login');
                }
            }else{
                $this->view('users/register', $data);
            }
        }else{
            //init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '' 
            ];
            //load view
            $this->view('users/register', $data);          
        }
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            return $this->loginProcess();
        }

        $data = [
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => ''
        ];

        $this->view('users/login', $data);
    }

    public function loginProcess(){
        if ($_SERVER['REQUEST_METHOD'] != 'POST'){
            redirect('users/login');
            return;
        }

        $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'email_err' => '',
            'password_err' => ''
        ];

        if(empty($data['email'])){
            $data['email_err'] = 'Please enter email';
        }elseif(!$this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'User not found';
        }

        if(empty($data['password'])){
            $data['password_err'] = 'Please enter your password';
        }

        if(empty($data['email_err']) && empty($data['password_err'])){
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
            if($loggedInUser){
                $this->createUserSession($loggedInUser);
                return;
            }
            $data['password_err'] = 'Password incorrect';
        }

        $this->view('users/login', $data);
    }

    //setting user section variable
    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['name'] = $user->name;
        $_SESSION['email'] = $user->email;
        $_SESSION['rol'] = $user->rol;
        redirect('records/index');
    }

    //logout and destroy user session
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['rol']);
        session_destroy();
        redirect('users/login');
    }

    public function admin(){
        if(!isLoggedIn()){
            redirect('users/login');
            return;
        }

        if(!$this->isAdminUser()){
            redirect('records/index');
            return;
        }

        $data = [
            'users' => $this->userModel->getData(0, 1000, '', 'id desc', 'YES')
        ];
        $this->view('users/admin', $data);
    }

    public function getUser(){
        if(!$this->ensureAdminJson()){
            return;
        }

        if($_SERVER['REQUEST_METHOD']=='POST'){
           // $_POST= filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $id=$_POST['id'];
            $result = $this->userModel->getUserById($id);
            echo json_encode($result);
        }
    }

    public function read(){
			if(!$this->ensureAdminJson()){
				return;
			}

			if($_SERVER['REQUEST_METHOD']=='POST'){
		//if($_POST){
			//die('Submit');
			//$_POST= filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
			$page = (isset($_POST['page']) && !empty($_POST['page']))?$_POST['page']:1;
			$data = [
				'action'=>trim($_POST['action']),
				'firstload'=>$_POST['firstload'],
				'arrayCampos'=>(empty($_POST['search']))?[]:$_POST['search'],
				'order_by'=>'id desc',
				'length'=>$_POST['length'],
				'page'=>$page,
				'per_page'=>'',
				'adjacents'=>'',
				'offset'=>'',
				'offsetToShow'=>'',
				'numrows'=>'',
				'total_pages'=>'',
				'c'=>'',
				'pagination'=>'',
			];
			//print_r($data);
			//die('Submit');
		}else{
			$data = [
				'action'=>'',
				'firstload'=>'YES',
				'arrayCampos'=>[],
				'order_by'=>'id desc',
				'length'=>10,
				'page'=>1,
				'per_page'=>'',
				'adjacents'=>'',
				'offset'=>'',
				'offsetToShow'=>'',
				'numrows'=>'',
				'total_pages'=>'',
				'c'=>'',
				'pagination'=>'',
				'fields'=>'',
			];
				}
			
			
		
			//print_r($data);
			$camposBase=array("name","email","rol","active");
			$addWhere="";
			$count=0;
			for($index=0;$index<count($data['arrayCampos']);$index++){
				$count += ($data['arrayCampos'][$index]!='')?1:0;
				
					if(!empty($data['arrayCampos'][$index])){

                        if($camposBase[$index]=="rol" || $camposBase[$index]=="active"){
                            if($count<=1){
								$addWhere.=" ".$camposBase[$index]." = ".$data['arrayCampos'][$index]."";
							}else{
								$addWhere.=" and ".$camposBase[$index]." = ".$data['arrayCampos'][$index]."";
							}
                        }else{
                            if($count<=1){
								$addWhere.=" ".$camposBase[$index]." LIKE '%".$data['arrayCampos'][$index]."%'";
							}else{
								$addWhere.=" and ".$camposBase[$index]." LIKE '%".$data['arrayCampos'][$index]."%'";
							}
                        }

							


					}
				}
			//$status  = $this->getOrderStatus();
			
			$consultaBusqueda = "";
			$contarCuantasBusquedas = 0;
            $camposAscDesc="";
			$per_page = $data['length']; //la cantidad de registros que desea mostrar
			$adjacents  = 2; //brecha entre páginas después de varios adyacentes
			$offset = ($data['page'] - 1) * $per_page;
			$offsetnumeroMostrar = ($data['page']-1) * $per_page + 1;
			$numrows = $this->userModel->countRegisters($addWhere,$data['firstload']);
			$total_pages = ceil($numrows/$per_page);
			$reload = 'index.php';
			$data['per_page']=$per_page;
			$data['adjacents']=$adjacents;
			$data['offset']=$offset;
			$data['offsetToShow'] = $offsetnumeroMostrar;
			$data['numrows']=$numrows;
			$data['total_pages']=$total_pages;
			$paginate = $this->paginate($reload,$data['page'] , $total_pages, $adjacents, $data['arrayCampos'],$data['length'],$camposAscDesc);
			$data['pagination']=$paginate;
			//$per_page = 30; //la cantidad de registros que desea mostrar
			
			$getOrders = $this->userModel->getData($data['offset'],$data['per_page'],$addWhere,$data['order_by'], $data['firstload']);

			$data['fields']=$getOrders;
		
			echo json_encode($data);
			//return $getOrders;
			
			//$this->view('dashboard/index',$data);
		//header('Content-type: application/json; charset=utf-8');
			
		}

	
	
	public function paginate($reload, $page, $tpages, $adjacents,$ArrayCampos,$example_length,$camposAscDesc) {

		//$ArrayCampos="";
			$ArrayCampos = json_encode($ArrayCampos);
			$camposAscDesc = json_encode($camposAscDesc);
			//print("<pre>".print_r($ArrayCampos,true)."</pre>");
			//$camposAscDesc="";
		
			$prevlabel = "&lsaquo;";
			$nextlabel = "&rsaquo;";
			$out = '<ul class="pagination">';
			 
			// previous label
		
			if($page==1) {
				$out.= "<li class='page-item disabled'><span><a class='page-link'>$prevlabel</a></span></li>";
			} else if($page==2) {
				$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='load(1,".$ArrayCampos.",".$example_length.",".$camposAscDesc.")'>$prevlabel</a></li>";
			}else {
				$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='load(".($page-1).",$ArrayCampos,$example_length,$camposAscDesc)'>$prevlabel</a></li>";
		
			}
			
			// first label
			if($page>($adjacents+1)) {
				$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='load(1,".$ArrayCampos.",".$example_length.",".$camposAscDesc.")'>1</a></li>";
			}
			// interval
			if($page>($adjacents+2)) {
				$out.= "<li class='page-item'><a class='page-link'>...</a></li>";
			}
		
			// pages
		
			$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
			$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
			for($i=$pmin; $i<=$pmax; $i++) {
				if($i==$page) {
					$out.= "<li class='page-item active'><a class='page-link'>$i</a></li>";
				}else if($i==1) {
					$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='load(1,".$ArrayCampos.",".$example_length.",".$camposAscDesc.")'>$i</a></li>";
				}else {
					$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='load(".$i.",$ArrayCampos,$example_length,$camposAscDesc)'>$i</a></li>";
				}
			}
		
			// interval
		
			if($page<($tpages-$adjacents-1)) {
				$out.= "<li class='page-item'><a class='page-link'>...</a></li>";
			}
		
			// last
		
			if($page<($tpages-$adjacents)) {
				$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='load($tpages,".$ArrayCampos.",".$example_length.",".$camposAscDesc.")'>$tpages</a></li>";
			}
		
			// next
		
			if($page<$tpages) {
				$out.= "<li class='page-item'><span><a class='page-link' href='javascript:void(0);' onclick='load(".($page+1).",$ArrayCampos,$example_length,$camposAscDesc)'>$nextlabel</a></span></li>";
			}else {
				$out.= "<li class='page-item disabled'><span><a class='page-link'>$nextlabel</a></span></li>";
			}
			
			$out.= "</ul>";
			return $out;
		}
}