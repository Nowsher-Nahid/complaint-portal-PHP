<?php session_start();
require_once('../controller/crudFunctions.php');
$crudObj = new CrudOparation;
$date = date('Y-m-d');
$time = date('h:i a');

// Insert
if (isset($_POST["email"]) && $_POST["email"]!="") {
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password = md5($_POST['password']);

	$where = array("email"=>$email,"password"=>$password);
	$user_data = $crudObj->select_record("*", $where, "tbl_users");

	if(!empty($user_data)){
		$user_email = $user_data[0]['email'];
		$user_password = $user_data[0]['password'];

		if($email == $user_email && $password == $user_password){
			$user_type = $user_data[0]['type'];
			$_SESSION["user_id"] = $user_data[0]['id'];
			$response = array($user_type);
		}else{
			$response = array(false);
		}
	}else{
		$response = array(false);
	}
	echo json_encode($response);
}

?>