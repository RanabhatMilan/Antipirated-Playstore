<?php 

function debugger($data, $is_die= false){

	echo "<pre style='color: #ff0000;'>";
	print_r($data);

	echo "</pre>";

	 if ($is_die) {
	 	exit();
	 }

}
function sanitize($string){
 global $conn;
 return mysqli_real_escape_string($conn, $string);
}
function getUserByUsername($username){
 global $conn;
 $sql="SELECT * FROM registered_users WHERE email_address='".$username."'";
 $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));

/*echo "<pre>";
print_r($query);
echo "</pre>";
*/
if (mysqli_num_rows($query)<= 0 || mysqli_num_rows($query)>1) {
	return false;
}else{
	$data=mysqli_fetch_assoc($query);
	return $data;
}

}

function randomString( $length=10 ){

	$chars="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPSQRSTUVWXYZ";
	$chars_len=strlen($chars);
	$rand_str='';
	for($i=0; $i < $length; $i++){
		$rand_str=$rand_str.$chars[rand(0,$chars_len-1)];
	
	}return $rand_str;
}

 function uploadfile($files, $dest_dir, $oldfile = "", $paths){
      if($files['error']==0){
       $ext=pathinfo($files['name'],PATHINFO_EXTENSION);
       $allowed_ext=array('jpg','jepg','png','bmp','gif','exe','apk','zip');
       if(in_array(strtolower($ext), $allowed_ext)){
       	$path='../upload/'.$dest_dir;
       	if(!is_dir($path)){
       		mkdir($path,'0777',true);
       	}
       	$filename=ucfirst($dest_dir).'-'.time().rand(0,99).'.'.$ext;
       	$success=move_uploaded_file($files['tmp_name'], $path.'/'.$filename);
       	//debugger($success,true);
       	if ($success) {
          if ($oldfile !="") {
            $path = $_SERVER['DOCUMENT_ROOT'].'/majorProject/admin/upload/'.$paths.$oldfile;
        if (file_exists($path)) {
          unlink($path);
        }
          }
          
			return $filename;
				}else{
       	return null;
       }
       }else{
       	return null;
       }
 }}

 function store($data, $table){
 	global $conn;
 	$sql="INSERT INTO ".$table." SET ";
 	if (is_array($data)) {
 		$col_value= array();
 		foreach ($data as $column => $value) {
 			$col_value[]=$column."='".$value."'";
 		}
 		$sql.=implode(',',$col_value);
 		//echo $sql;
 		//exit;
 	$query=mysqli_query($conn,$sql);
 	/*echo "<pre>";
 	print_r($conn);
 	echo "</pre>";
 	exit();*/
 	if ($query) {
 		return mysqli_insert_id($conn);

 	}else{
 		return false;
 	}
 	}}

  function update($up_data, $tab, $id){
    global $conn;
    $sql = "UPDATE ".$tab." SET ";
    if (is_array($up_data)) {
    $col_value= array();
    foreach ($up_data as $column => $value) {
      $col_value[]=$column."='".$value."'";
    }
    $sql.=implode(',',$col_value);
    //echo $sql;
    //exit;
    $sql.=" WHERE id =  ".$id;
  $query=mysqli_query($conn,$sql);
  /*echo "<pre>";
  print_r($conn);
  echo "</pre>";
  exit();*/
  if ($query) {
    return 1;

  }else{
    return false;
  }
  }

  }

function getAllAppsInfo($table){


    global $conn;
    $sql="SELECT * FROM ".$table." ORDER BY id DESC";
    
    
    $query= mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($query)<= 0) {
      return false;
   }else{
    $data = array();
    while($row= mysqli_fetch_assoc($query)){
      $data[]=$row;
    }return $data;
   }
  }


 	function getAppsInfo($table,$status){


 		global $conn;
  	$sql="SELECT * FROM ".$table." WHERE status = '".$status."' ORDER BY id DESC";
  	
  	
  	$query= mysqli_query($conn,$sql);
  	
  	if (mysqli_num_rows($query)<= 0) {
  		return false;
   }else{
   	$data = array();
   	while($row= mysqli_fetch_assoc($query)){
   		$data[]=$row;
   	}return $data;
   }
 	}

  function getAppsById($id,$apps_table){
    global $conn;
    $sql = "SELECT * FROM ".$apps_table." WHERE id = ".$id;
    //echo $sql;
    $query = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($query)<=0) {
      return 1111;
    }else{
      $data =  mysqli_fetch_assoc($query);
       //debugger($data,true);
      return $data; 
      }
    }
  
  function get_cus_info($cid){
    global $conn;
    $sql = "SELECT last_name FROM customer_login WHERE id = ".$cid;
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query)<=0) {
      return false;
    }else{
      $data = mysqli_fetch_assoc($query);
      return $data;
    }
  }

  function get_app_info($cus_id){
    global $conn;
    $sql = "SELECT apps_name, product_key, added_date FROM download_info WHERE login_id = ".$cus_id." AND product_key != '' ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query)<=0) {
    return false;
    }else{
        $data = array();
    while($row= mysqli_fetch_assoc($query)){
      $data[]=$row;
    }return $data;
    }
  }

  function deleteapp($appid, $table){
    global $conn;
    $sql = "DELETE FROM ".$table." WHERE id = ".$appid;
    //echo $sql;
    $query = mysqli_query($conn, $sql);
    if ($query) {
       return 1;
    }else{
      return false;
    }
   
    
  }

  function deleteimageFF($img, $path){
    $path = $_SERVER['DOCUMENT_ROOT'].'/majorProject/admin/'.$path.$img;
   // echo $path;
    //exit;
    $success = false;
    if (file_exists($path) && $path != "") {
    $success = unlink($path);
    }
    return $success;
  }

  function deleteappFF($app, $filepaath){
     $path = $_SERVER['DOCUMENT_ROOT'].'/majorProject/admin/'.$filepaath.$app;
      $success = false;
    if (file_exists($path) && $path != "") {
    $success = unlink($path);
    }
    return $success;
  }
 ?>