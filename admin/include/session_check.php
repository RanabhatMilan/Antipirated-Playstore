<?php 

if(!isset($_SESSION['session_id']) || $_SESSION['session_id']=='' || strlen($_SESSION['session_id'])!=15){

    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_id']);
    unset($_SESSION['session_id']);

    $_SESSION['error']="Please Login First.";
    @header('location: admin_login.php');
    exit;
}


 ?>