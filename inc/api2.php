<?php 
require "../admin/include/db.php";
require "../admin/include/function.php";
session_start();
$act = $_POST['act'];
if ($act = "download-again"){
	$apps_id = $_POST['app_id'];
	unset($_SESSION['apps_id'.$apps_id]);
	unset($_SESSION['new_session'.$apps_id]);
	echo 2;
	exit;
}

 ?>
