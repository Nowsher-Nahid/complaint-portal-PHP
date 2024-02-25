<?php 
require_once('../controller/crudFunctions.php');
$crudObj = new CrudOparation;

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

// update password
if (isset($_POST["old_password"]) && $_POST["old_password"]!="") {
	$user_id = $_POST['user_id'];
	$old_password = md5($_POST['old_password']);
	$new_password = md5($_POST['new_password']);

	$where = array("id"=>$user_id);
	$user_data = $crudObj->select_record("password", $where, "tbl_users");
	$current_password = $user_data[0]["password"];

	if($old_password == $current_password){
		$data = array("password" => $new_password);
		$crudObj->update_record("tbl_users",$where,$data);
		$response = array(true);
	}else{
		$response = array(false);
	}
	
	echo json_encode($response);
}

?>