<?php  session_start();
require_once('controller/crudFunctions.php');
$crudObj = new CrudOparation;

if(isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
  $where = array("id"=>$user_id);
  $user_data = $crudObj->select_record("*", $where, "tbl_users");

  $user_name = $user_data[0]['name'];
  $user_email = $user_data[0]['email'];
  $user_phone = $user_data[0]['phone'];
  $user_type = $user_data[0]['type'];
}else{
  echo '<script>window.location.href = "login.php";</script>';
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Complaint Portal</title>
  <link rel="icon" type="image/x-icon" href="assets/images/logo.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Sweet alert -->
  <link rel="stylesheet" href="assets/vendors/sweetalert2/sweetalert2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- custom css -->
  <link rel="stylesheet" href="assets/dist/css/custom.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">