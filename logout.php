
<?php 

session_start();
//unset($_SESSION['customer']);
//unset($_SESSION['customer_id']);
//unset($_SESSION['first_name']);

session_destroy();

if (isset($_COOKIE, $_COOKIE['user_8'])) {
 	setcookie('user_8', '', time()-60);
 }

@header('location:./');
exit;
 ?>