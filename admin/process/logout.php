<?php 
session_start();

 	unset($_SESSION['user_id']);
 	 	unset($_SESSION['user_name']);
 	unset($_SESSION['user_email']);
 	unset($_SESSION['session_id']);

	@header('location: ../admin_login.php');
 exit();
 ?>