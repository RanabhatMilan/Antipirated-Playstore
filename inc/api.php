<?php 
require "../admin/include/db.php";
require "../admin/include/function.php";
session_start();
ob_start();
$act = $_POST['act'];

$conn = mysqli_connect('localhost','root','');

$abc=$conn->select_db('major_Project');
if ($act == "add") {
	$email = $_POST['email'];
	$name = $_POST['name'];
	$message = $_POST['message'];

	$sql = "INSERT INTO contact_info SET name = ?, email_address = ?, message = ?";
	$stmt = $conn->prepare($sql);
	
	$stmt->bind_param('sss', $name, $email, $message);
	
	$result = $stmt->execute();
	if ($result) {
		echo $conn->insert_id;
		exit;
	}else{
		echo 0;
		exit;
	}
}
 else if ($act == "form-submit") {
	$apps_id = $_POST['app_id'];
	$apps_name = $_POST['app_name'];
	$login_id = $_SESSION['customer_id'];
	$email = $_POST['email_address'];
	$number = $_POST['credit_c_num'];

	$sql = "INSERT INTO download_info SET login_id = ".$login_id.", apps_id = ".$apps_id.", apps_name = '".$apps_name."', downloader_email = '".$email."', credit_card_no = '".$number."'";
	$stmt = $conn->prepare($sql);
	$result = $stmt->execute();
	if ($result) {
		$_SESSION['apps_id'.$apps_id] = $apps_id;
		$_SESSION['download_info_id'.$apps_id] = $conn->insert_id;
		echo $conn->insert_id;
		exit;
	}else{
		echo 0;
		exit;
	}
}

else if ($act = "download-completed") {
	$download_id = $_POST['dwn_id'];
	$apps_id = $_POST['app_id'];
	$b = $_POST['p_id_gen'];
	$a = $_POST['app_gen'];
	$t = $_POST['tab_name'];
	$stat = $_POST['status'];
	$_SESSION['new_session'.$apps_id] = $apps_id;



		$ipAddress=$_SERVER['REMOTE_ADDR'];
			$server = $_SERVER['SERVER_ADDR'];
			if ($ipAddress == $server) {
				ob_start(); // Turn on output buffering
					system('ipconfig/all'); //Execute external program to display output
					$mycom=ob_get_contents(); // Capture the output into a variable
					ob_clean(); // Clean (erase) the output buffer
					$findme = "Wireless LAN adapter Wi-Fi:";
		$pmac = strpos($mycom, $findme);
		//echo $pmac; // Find the position of Physical text
		$Fmac=substr($mycom,($pmac),300);
		$findmac ="Physical Address";
		$found = strpos($Fmac, $findmac);
	//	echo "abc";
		$mac = substr($Fmac,($found+36),17);
		$U_mac = strtoupper($mac);
			}else{
			 
			  ob_start(); // Turn on output buffering
					system('arp -a'); //Execute external program to display output
					$mycom=ob_get_contents(); // Capture the output into a variable
					ob_clean(); // Clean (erase) the output buffer
					$findme = $ipAddress;
					$pmac = strpos($mycom, $findme);
					//echo $pmac; // Find the position of Physical text
					$mac=substr($mycom,($pmac+22),18);
					$U_mac = strtoupper($mac);
					} // Get Physical Address
					

										$dataFile = 'item.txt';
										file_put_contents($dataFile, $U_mac);
										$newFile = $b.'/resources/app/node_modules/mac/item.txt';
										//file_put_contents($newFile, "");
										//create zip file and put the data file in it.

										// #2 create zip archive
										$zip = new ZipArchive();
										$zipFile = "../admin/upload/".$t."/".$a;
										if ($zip->open($zipFile, ZipArchive::CREATE)) {
										  $success =  $zip->addFile($dataFile, $newFile);
										  if ($success) {
										  //  echo "Successed!!";
										  }
										}
										$zip->close();
										unlink($dataFile);
					//$a = randomString(6);
					//$randPos = rand(0,strlen($a));
					//$c = substr($a, 0, $randPos).$b.substr($a, $randPos);
					$mid_pid = strtolower($b);
					$p_key = randomString(3).substr($mid_pid, 0,3).randomString(3);
					if ($stat == "paid") {
						$sql = "UPDATE download_info SET mac_address = '".$U_mac."', product_key = '".$p_key."' WHERE id = ".$download_id;
					$stmt = $conn->prepare($sql);
					$result = $stmt->execute();
					if ($result) {
						echo $mac;
						exit;
					}
					}else{

						$login_id = $_SESSION['customer_id'];
						$app_id =  $apps_id;
						$apps_name = $_POST['name'];
						$email = $_SESSION['customer'];
						$number = "Free";
						$sql = "INSERT INTO download_info SET login_id = ".$login_id.", apps_id = ".$apps_id.", apps_name = '".$apps_name."', downloader_email = '".$email."', credit_card_no = '".$number."', mac_address = '".$U_mac."', product_key = '".$p_key."'";
								//debugger($sql,true);
								$stmt = $conn->prepare($sql);
								//debugger($stmt,true);
								$result = $stmt->execute();
								//debugger($result,true);
								if ($result) {
									$_SESSION['apps_id'.$apps_id] = $apps_id;
									$_SESSION['download_info_id'.$apps_id] = $conn->insert_id;
									echo $conn->insert_id;
									exit;
								}else{
									echo 0;
									exit;
								}
					}
					
		

	echo 1;
	exit;
}
else{
	echo 0;
	exit;
}
 ?>
