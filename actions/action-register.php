<?php 
require_once('../controller/crudFunctions.php');
$crudObj = new CrudOparation;
$date = date('Y-m-d');
$time = date('h:i a');

// Insert
if (isset($_POST["name"]) && $_POST["name"]!="") {
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$phone = $_POST['phone'];
	$password = md5($_POST['password']);
	$type = 'User';
	
	$data = array(
		"name" => $name,
		"email" => $email,
		"phone" => $phone,
		"password" => $password,
		"type"=>$type,
		"created_date" => $date,
		"created_time" => $time,
	);

    $where = array("email"=>$email);
	$isExist = $crudObj->existence($where,"tbl_users");

	if($isExist[0]>=1){
		$response = array(false);
	}else{
		$crudObj->insert("tbl_users",$data);
		$response = array(true);
	}
	echo json_encode($response);
}

?>