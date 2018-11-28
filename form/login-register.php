<?php 
//require '../config/config.php';
//require '../config/function.php';
function debugger($data){
  echo "<pre>";
  print_r($data);
  echo "<pre>";
  exit;
}
session_start();

//debugger($_SESSION);
//debugger($_GET['act'],true);
function getFlash(){
  if (isset($_SESSION['success']) && $_SESSION['success']!="") {
     echo '<span  style="color: red;" class="alert">' .$_SESSION['success'].'</span>';
     unset($_SESSION['success']);
  }
  if(isset($_SESSION['error']) && $_SESSION['error']!=""){
    echo '<span  style="color: red;" class="alert">'.$_SESSION['error'].'</span>';
    unset ($_SESSION['error']);
  }
  if(isset($_SESSION['warning']) && $_SESSION['warning']!=""){
    echo '<p class="alert alert-warning">'.$_SESSION['warning'].'</p>';
    unset ($_SESSION['warning']);

 }

    if(isset($_SESSION['info']) && $_SESSION['info']!=""){
    echo '<p class="alert alert-info">'.$_SESSION['info'].'</p>';
    unset ($_SESSION['info']);
  }
 }
 ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href="css/fonts_googleapis.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type='text/css' href="css/normalize.min.css">

     <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <h2 align="center"><a href="../" style="text-decoration-line: none;">AntiPirated PlayStore</a></h2>
  <div class="form" >

   
      <h2 id="heading" style="color: red;">If already have an account you can Login.</h2>
      <ul class="tab-group">
        <li class="tab active"><a onclick="add_heading();" href="#signup">Sign Up</a></li>
        <li class="tab "><a onclick="remove_heading();" href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
        <form action="login_register.php?act=register" method="post">
           <b><?php getFlash(); ?></b>
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input name="first_name" type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input name="last_name" type="text"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input name="email_address" type="email"required autocomplete="off"/>
          </div>
          
     

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input id="password" name="password" type="password" required autocomplete="off"/>
          </div>
          
          <button id="submit" type="submit" class="button button-block">Create Account</button>
          
        </form>
         
         
        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="login_register.php?act=login" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input name="e_address" type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input name="p_word" type="password"required autocomplete="off"/>
          </div>
          
          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- 'http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js' -->
  <script src='js/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>
<script type="text/javascript">
  setTimeout(function(){
    $('.alert').slideUp('slow');
    }, 5000);
  function remove_heading(){
    $('#heading').html('If no account please Signup first.');
    //$('#heading').addClass('hidden');
  }
  function add_heading(){
    $('#heading').html('If already have an account you can Login.');
  }


</script>



</body>

</html>
