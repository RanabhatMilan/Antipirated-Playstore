<?php
function debugger($data){
	echo "<pre>";
	print_r($data);
	echo "<pre>";
	exit;
}
function setFlash($status, $message){
	  if (!isset($_SESSION)) {
	  	session_start();
	  }
	  $_SESSION[$status] = $message;
}
 function randomString( $length=10 ){

	$chars="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPSQRSTUVWXYZ";
	$chars_len=strlen($chars);
	$rand_str='';
	for($i=0; $i < $length; $i++){
		$rand_str=$rand_str.$chars[rand(0,$chars_len-1)];
	
	}return $rand_str;
}

 session_start();
//debugger(sha1($_POST['p_word']));
$conn = mysqli_connect('localhost','root','');

$abc = $conn->select_db('major_Project');
//debugger($abc);
$act = $_GET['act'];
if ($act =="register") {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email_address'];
	$gender = $_POST['gender'];
	$password = sha1($_POST['password']);

	$sql = "INSERT INTO customer_login SET first_name = ?, last_name = ?, email = ?, gender = ?, password = ?";
	$stmt = $conn->prepare($sql);
	//debugger($sql);
	$stmt->bind_param('sssss', $first_name, $last_name, $email, $gender, $password);
	
//;
	$result = $stmt->execute();
	if ($result) {
		setFlash('success','Your account has been registered. Now you can Login.');
 		
	}else{
		setFlash('error','Your account cannot be created.');
	}
		@header('location:login-register.php');
 	    exit;
}

if ($_GET['act'] == "login") {
	$e_address = $_POST['e_address'];

	$sql = "SELECT * FROM registered_users WHERE email_address ='".$e_address."'";

	$user_info = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($user_info);
 //debugger($data);
	if($user_info && $data['password'] == sha1($_POST['p_word'])){
					$_SESSION['success']="Welcome to admin panel.";
		$_SESSION['user_id']=$data['id'];
		$_SESSION['user_name']=$data['name'];		
		$_SESSION['user_email']=$data['email_address'];
 	//if(isset($_POST['Rem']) && $_POST['Rem']=="1"){
 	
 	//			setcookie('abc','Cookie saved',time()+(5*86400));
 	//		}
 			$_SESSION['session_id']=randomString(15);
 			//echo $_SESSION['session_id'];
 			//exit;
		@header('location:../admin/adminpage.php');
		exit();
		

	}else{

		$sql = "SELECT * FROM customer_login WHERE email = '".$e_address."'";
	 //$stmt = $conn->prepare($sql);

	 //
	 $c_info = mysqli_query($conn, $sql);

	 //debugger($c_info);
	  if (!empty($c_info->num_rows)) {
	  	$data = mysqli_fetch_assoc($c_info);
  	if($data['password'] == sha1($_POST['p_word'])){
  		$_SESSION['customer'] = $e_address;
  		$_SESSION['customer_id'] = $data['id'];
  		$_SESSION['first_name'] = $data['first_name'];
  		//debugger($_SESSION['customer']);
  	//	$token = randomString(15);
  		//if (isset($_POST['remember_me']) && $_POST['remember_me']==1) {
	//				setcookie('user_8',$token,time()+(86400*365));
		//		}
  		@header('location:../');
  		exit;
  	}else{
  		setFlash('error','Passord does not match.');
  		@header('location:login-register.php');
  		exit;
  }	
  	
  }else{
  	setFlash('error','Email Address does not exist.');
 	@header('location:login-register.php');
 	exit;
  }
	}

	 

}
		?>