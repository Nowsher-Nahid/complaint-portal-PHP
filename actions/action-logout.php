<?php session_start();
unset($_SESSION['user_id']);
echo "<script>window.location.href = '../login.php?logout=true';</script>";
exit;
?>