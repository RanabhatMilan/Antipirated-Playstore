<?php 
//ob_start();
session_start();
include '../include/db.php';
include '../include/session_check.php';
include '../include/function.php';
/*debugger($_SESSION);
debugger($_POST);
*/
//debugger($_FILES);
//debugger($_REQUEST,true);
 if (isset($_FILES) && !empty($_FILES)) {
 	
	 if($_GET['act'] == "games"){
	    	$data['games_name'] = $_POST['games_name'];
	    	if ($_FILES['games_image']['error'] == 0) {
	    	$data['games_image'] = uploadfile($_FILES['games_image'],"gamesImage",$_POST['old_image'], "gamesImage/");

	    	}
	    	if ($_FILES['games']['error'] == 0) {
	    	$data['games'] = uploadfile($_FILES['games'],"games",$_POST['old_games'], "games/");
	
	    	}
			$data['features'] = addslashes($_POST['features']);
			$data['status'] = $_POST['paid_free'];
			$data['uploaded_by'] = $_SESSION['user_name'];
			$hidden_id = $_POST['hidden_id'];
			if (!empty($_POST['games_price'])) {
				$data['price'] = $_POST['games_price'];
			}
			//debugger($data,true);
			if (isset($_POST['old_image']) || isset($_POST['old_games'])) {
				$appsinfo_id = update($data,'games', $hidden_id);
				$operation = "updat";
			}else{
				$appsinfo_id = store($data,'games');
				$operation = "add";
			}



			if($appsinfo_id){
		 	$_SESSION['success']='Game '.$operation.'ed successfully.';

		 }else{
		 	$_SESSION['error']= "Sorry! There was problem while ".$operation."ing game.";
		 }
		@header('location: ../list_games.php');
		exit();
	}
	else if ($_GET['act'] == "application") {
		 	$data['apps_name'] = $_POST['apps_name'];
		 	if ($_FILES['apps_image']['error'] == 0) {
	    	$data['apps_image'] = uploadfile($_FILES['apps_image'],"appsImage",$_POST['old_image'], "appsImage/");

	    	}
	    	if ($_FILES['apps']['error'] == 0) {
	    	$data['apps'] = uploadfile($_FILES['apps'],"applications",$_POST['old_apps'], "applications/");
	
	    	}
			$data['features'] = addslashes($_POST['features']);
			$data['status'] = $_POST['paid_free'];
			$data['uploaded_by'] = $_SESSION['user_name'];
			$hidden_id = $_POST['hidden_id'];
			if (!empty($_POST['apps_price'])) {
				$data['price'] = $_POST['apps_price'];
			}
			//debugger($data,true);
			if (isset($_POST['old_image']) || isset($_POST['old_apps'])) {
				$appsinfo_id = update($data,'applications', $hidden_id);
				$operation = "updat";
			}else{
				$appsinfo_id = store($data,'applications');
				$operation = "add";
			}




			if($appsinfo_id){
		 	$_SESSION['success']='Application '.$operation.'ed successfully.';

		 }else{
		 	$_SESSION['error']="Sorry! There was problem while ".$operation."ing application.";
		 }
		@header('location: ../apps_list.php');
		exit();
		}
 	}
	
	




if ($_GET['act'] = "delete") {
	$appinfo = getAppsById($_GET['id'], $_GET['table']);
	//debugger($appinfo , true);
$notif = deleteapp($_GET['id'], $_GET['table']);
//debugger($notif , true);
if ($_GET['table'] == "applications") {
	$imgpath = 'upload/appsImage/';
	$filepath = 'upload/applications/';
	$location = '../apps_list.php';
	$name = 'App';
	$img = $appinfo['apps_image'];
	$file = $appinfo['apps'];
}else if($_GET['table'] == "games"){
	$imgpath = 'upload/gamesImage/';
	$filepath = 'upload/games/';
	$location = '../list_games.php';
	$name = 'Game';
	$img = $appinfo['games_image'];
	$file = $appinfo['games'];
}else{
	$name = "Contact Info";
	$location = "../contact_info.php";
}
if ($notif == 1) {
	$_SESSION['success'] = $name.' deleted successfully.';
	if ($_GET['table'] == "applications" || $_GET['table'] == "games" ) {
			$del = deleteimageFF($img,$imgpath);
	        $del_app = deleteappFF($file, $filepath);
	}

	@header('location: '.$location);
	exit;
}else{
	$_SESSION['error'] = "Problem while deleting this ".$name;
	@header('location: '.$location);
	exit;
}
}



 ?>