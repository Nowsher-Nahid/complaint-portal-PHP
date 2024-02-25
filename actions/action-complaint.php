<?php
require_once('../controller/crudFunctions.php');
$crudObj = new CrudOparation;
$date = date('Y-m-d');
$time = date('h:i a');

// send complaint
if (isset($_POST["title"]) && $_POST["title"]!="") {
	$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
	$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

	$attachments = "";
	$files = $_FILES["files"]["name"];
	if(isset($files[0]) && $files[0] != ""){
		$total = count($_FILES['files']['name']);
		$array_of_files = [];
		for($i=0; $i < $total; $i++){
			$temp = explode(".", $files[$i]);
	        $newfilename = round(microtime(true)). $temp[0] . '.' . end($temp);
	        move_uploaded_file($_FILES["files"]["tmp_name"][$i], "../assets/files/complaint/".$newfilename);
	        array_push($array_of_files,$newfilename);
		}
		$attachments = json_encode($array_of_files);
	}
	
	$data = array(
		"sender_name"=>$_POST["user_name"],
		"sender_email"=>$_POST["user_email"],
		"sender_phone"=>$_POST["user_phone"],
		"title"=>$title,
		"description"=>$description,
		"files"=>$attachments,
		"status"=>0, //0 means unread
		"nt_status"=>0,
		"created_date"=>$date,
		"created_time"=>$time
	);

	$crudObj->insert("tbl_complaints",$data);
	$response = array(true);
	echo json_encode($response);
}

// reply to the complaints
if (isset($_POST["complaint_title"]) && $_POST["complaint_title"]!="") {
	$title = filter_var($_POST['complaint_title'], FILTER_SANITIZE_STRING);
	$reply = filter_var($_POST['reply'], FILTER_SANITIZE_STRING);

	$attachments = "";
	$files = $_FILES["files"]["name"];
	if(isset($files[0]) && $files[0] != ""){
		$total = count($_FILES['files']['name']);
		$array_of_files = [];
		for($i=0; $i < $total; $i++){
			$temp = explode(".", $files[$i]);
	        $newfilename = round(microtime(true)). $temp[0] . '.' . end($temp);
	        move_uploaded_file($_FILES["files"]["tmp_name"][$i], "../assets/files/complaint/".$newfilename);
	        array_push($array_of_files,$newfilename);
		}
		$attachments = json_encode($array_of_files);
	}

	$data = array(
		"receiver_name"=>$_POST["receiver_name"],
		"receiver_email"=>$_POST["receiver_email"],
		"title"=>$title,
		"reply"=>$reply,
		"files"=>$attachments,
		"status"=>0, //0 means unread
		"nt_status"=>0,
		"created_date"=>$date,
		"created_time"=>$time
	);

	$crudObj->insert("tbl_replies",$data);
	$response = array(true);
	echo json_encode($response);
}

?>