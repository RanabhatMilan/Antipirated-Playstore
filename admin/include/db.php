<?php 
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'major_project');
define('DB_HOST', 'localhost');

$conn= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Error in establishing database connection.');
mysqli_select_db($conn,DB_NAME) or die(mysqli_error($conn));
mysqli_query($conn,"SET NAMES UTF8");
 ?>