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
	$type = 'Admin';
	
	$data = array(
		"name" => $name,
		"email" => $email,
		"phone" => $phone,
		"password" => $password,
		"type"=>$type,
		"created_date" => $date,
		"created_time" => $time
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

// update profile
if (isset($_POST["edit_name"]) && $_POST["edit_name"]!="") {
	$user_id = $_POST['user_id'];
	$name = filter_var($_POST['edit_name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['edit_email'], FILTER_SANITIZE_EMAIL);
	$phone = $_POST['edit_phone'];
	
	$data = array(
		"name" => $name,
		"email" => $email,
		"phone" => $phone
	);

    $where = array("id"=>$user_id);
	$crudObj->update_record("tbl_users",$where,$data);

	$response = array(true);
	echo json_encode($response);
}

// delete
if (isset($_POST['id'])) {
	$rowNoToDelete = $_POST["id"];
	$where = array("id" => $rowNoToDelete);
	$crudObj->delete_record("tbl_users",$where);
}

?>