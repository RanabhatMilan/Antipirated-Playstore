<?php 

include '../include/db.php';
include '../include/function.php';
ob_start();
session_start();
if (isset($_POST) && !empty($_POST)) {

	$username=sanitize($_POST['username']);
$password= sha1($_POST['password']);
$user_info=getUserByUsername($username);
//debugger($user_info);
if ($user_info) {
	if ($password== $user_info['password']) {
		$_SESSION['success']="Welcome to admin panel.";
		$_SESSION['user_id']=$user_info['id'];
		$_SESSION['user_name']=$user_info['name'];		
		$_SESSION['user_email']=$user_info['email_address'];
 	//if(isset($_POST['Rem']) && $_POST['Rem']=="1"){
 	
 	//			setcookie('abc','Cookie saved',time()+(5*86400));
 	//		}
 			$_SESSION['session_id']=randomString(15);
 			//echo $_SESSION['session_id'];
 			//exit;
		@header('location: ../adminpage.php');
		exit();
	}else{
		$_SESSION['error']="Password does not match.";
		@header('location: ../admin_login.php');
		exit();
	}
	}else{
		$_SESSION['error']="No user or registered with same email for multiple time.Please contact our admin.";
		@header('location: ../admin_login.php');
		exit();
	}
	//@header('location: adminpage.php');
	//	exit();
	}else{
		$_SESSION['error']="Unauthorized Access";
		@header('location: ../admin_login.php');
		exit();
	}



 ?>