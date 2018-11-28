<?php 
  $current_page = pathinfo($_SERVER['PHP_SELF'],PATHINFO_BASENAME);
  ob_start();
  session_start();
/*function debugger($data){
  echo "<pre>";
  print_r($data);
  echo "<pre>";
  exit;
}*/
 

//  debugger($_SESSION);
//exit;
 // echo $current_page;
 // echo isset($current_page == "index.php")?"abc":"xyz";
  //exit;
 ?>
<!DOCTYPE HTML>
<html>

<head>
  <title><?php echo ($current_page == 'index') ? 'Login' : ucfirst($current_page);?> </title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
 <!-- -->
</head>

<body>
  <div  id="main">
    <div id="header">
      <div id="logo">
        <div style="padding-left: 600px; padding-top: 100px;">
          <?php if (isset($_SESSION['customer'])){
            ?>
            <a style="text-decoration-line: none; color: blue;"  class="pull-right" href="myaccount.php"><b><?php echo ucfirst($_SESSION['first_name']); ?> : My Account</b></a></br>
            <a style="text-decoration-line: none; color: blue;"  class="pull-right" href="logout.php"><b>Logout</b></a></br>
          <?php }else{
            ?>
            <a style="text-decoration-line: none; color: blue;"  class="pull-right" href="form/login-register.php"><b>Login/Register</b></a>
            <?php 
          } ?>
            
          
          </div>
        <div id="logo_text">
          <h1><a href="index.php">AntiPirated PlayStore</a>
          </h1>
          <h2 style="color: green;">Use Antipirated Softwares Contribute To <span style="color: red;">Stop Piracy</span></h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li  class="<?php if($current_page =='index.php'){echo'selected';}else{echo '';} ?>" ><a href="index.php">Home</a></li>
          <li class= "<?php if($current_page =='applications.php'){echo'selected';}else{echo '';} ?>"><a href="applications.php">Applications</a></li>
          <li class= "<?php if($current_page =='games.php'){echo'selected';}else{echo '';} ?>"><a href="games.php">Games</a></li>
          
          <li  class= "<?php if($current_page =='about_us.php'){echo'selected';}else{echo '';} ?>"><a href="about_us.php">About Us</a></li>
          <li class= "<?php if($current_page =='contact.php'){echo'selected';}else{echo '';} ?>"><a href="contact.php">Contact Us</a></li>

        </ul>
      </div>
    </div>
    