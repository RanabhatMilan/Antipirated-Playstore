<?php
require "admin/include/db.php";
require "admin/include/function.php";
if (isset($_GET['id'])) {
  $get_id = $_GET['id'];
  $apps_by_id = getAppsById($_GET['id'], $_GET['table']);

}
  $current_page = pathinfo($_SERVER['PHP_SELF'],PATHINFO_BASENAME);
  ob_start();
  session_start();

 ?>
<!DOCTYPE HTML>
<html>

<head>
  <title><?php echo ($current_page == 'index') ? 'Login' : ucfirst($current_page);?> </title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css"/>
</head>

<body>
  <div  id="main">
    <div id="header">
      <div id="logo">
        <div style="padding-left: 650px; padding-top: 100px;">
          <?php if (isset($_SESSION['customer']) ){
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
          <!-- class="logo_colour", allows you to change the colour of the text -->
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
    <div style="min-height: 500px;" id="site_content">

    	 
        <?php if (isset($_SESSION['customer']) && isset($_GET['id']) && isset($_GET['table'])) {
           
                  if((isset($_SESSION['apps_id'.$get_id]) && $_SESSION['apps_id'.$get_id] == $_GET['id']) || $_GET['status'] == "free"){ 
                    
                      
?>
                        <div id="content">
                            <img  alt="" width="195px" height="200px" src="admin/upload/<?php  
                            if($_GET['table']== "games"){
                            echo 'gamesImage/'.$apps_by_id['games_image'];
                          }
                            else {
                            echo 'appsImage/'.$apps_by_id['apps_image']; } ?>">
                            <div class="column" style="float: right; width: 300px; " ><h4>Features:</h4>
                             <p> <?php echo $apps_by_id['features']; ?></p></div>
                          <div style="margin-top: 10px;">
                            <h3>
                            <div class="product-body">
                                <span class="product-price"> <?php echo '$'.$apps_by_id['price']." "; ?></span>
                            <span class="product-rating">
                                  <?php
                                  $class = "fa-star"; 
                                  for($i=0; $i<5; $i++){
                                    if($apps_by_id['rating'] <= $i){
                                      $class = "fa-star-o empty";
                                    }
                                    echo '<i class="fa '.$class.'"></i>';
                                  }
                                    ?></span>
                                 
                        
                            </div></h3>

                            <h3><?php

                             if($_GET['table'] == "games"){

                            echo $apps_by_id['games_name'];
                          }
                            else{
                            echo $apps_by_id['apps_name']; 
                            } ?></h3>

                            <?php if (isset($_SESSION['new_session'.$get_id])) { ?>
                              
                              <h3>Thank You for downloading this <?php if($_GET['table']=="applications") echo "application";else echo "game"; ?>. Check your email account to get your Product Key.</h3>
                               <h3> If want to download again Click Here: <button style="color: red;" id="dwn_agn">DOWNLOAD</button></h3>

                          <?php  }else{ ?>

                            <h3>
                            
                            <a id="remove_download"  onclick="remove_download();"  href="admin/upload/<?php  
                            if($_GET['table'] == "games"){
                            echo 'games/'.$apps_by_id['games'];
                             }
                            else {
                            echo 'applications/'.$apps_by_id['apps']; } ?>" download style="text-decoration-line: none; " > Download </a>
                            /
                               <a id="remove_download" href="" onclick="remove_download();" style="text-decoration-line: none; " > Get Product Key </a>
                            
                            

                            </h3>
                            <span hidden id="p_id_gen"><?php if($_GET['table'] == "applications"){
                            echo $apps_by_id['apps_name']; 
                          }
                            else {
                              echo  $apps_by_id['games_name'];
                            } ?></span>
                            <span hidden id="app_gen"><?php if($_GET['table'] == "applications"){
                            echo $apps_by_id['apps']; 
                          }
                            else {
                              echo  $apps_by_id['games'];
                            } ?></span>
                            <span hidden id="table_name"><?php echo $_GET['table'] ;?></span>
                            <span hidden id="status"><?php echo $_GET['status']; ?></span>
                             <span hidden id="namm"> <?php

                             if($_GET['table'] == "games"){

                            echo $apps_by_id['games_name'];
                          }
                            else{
                            echo $apps_by_id['apps_name']; 
                            } ?> </span>
                            <?php  } ?>


                            </div><span hidden id="<?php echo 'hidden'; ?>" ><?php echo $_GET['id']; ?></span>
                            <?php if (isset($_SESSION['download_info_id'.$get_id])){ ?> 
                              <span hidden  id="new_hidden"><?php echo $_SESSION['download_info_id'.$get_id]; ?></span>
                              <?php } ?>
                              
                            
                            
                        </div>

<?php
                      // echo "Now you can download this apps.";
                    
                  }else{ ?>
          
          <table style="width:50%; border: 1px solid black;"  >
            <thead>
      <th>You need to Fill the Form:</th>
      
    </thead>
   <tbody>
    <form  action="#" method="post">
      
    
    <tr><td><label>Email:</label><input  type="text" style="min-width: 100%;" name="email_address" id="email_address"  placeholder="Please Enter the valid email address."></td></tr>
    <tr><td><label>Credit Card No:</label><input type="text" style="min-width: 100%;" name="number" id="number" placeholder="Please Enter the valid credit card number." ></td></tr>
    <tr><td><button id="submit">Submit</button></td></tr><span hidden id="<?php echo 'hidden'; ?>" ><?php echo $_GET['id']; ?></span><span hidden id="<?php echo 'name-hidden'; ?>" ><?php if($_GET['table'] == "applications"){
                            echo $apps_by_id['apps_name'];
                          }
                            else {
                            echo $apps_by_id['games_name'];
                            } ?></span>
    
    
    </form>
    
   </tbody>
   </table>
   <?php 
      }
        } else{?>
          <h2>You need to LogIn.</h2>

          <?php } ?>
   	

      </div>
    </div>


 <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>

<script type="text/javascript">
$('#remove_download').click(function(){
  return alert('Application is ready to download.');
});
 /*function remove_download(){

  document.getElementById("remove_download").setAttribute("hidden","");
 }*/
  
 /*function hide_download(){
  $('#download').setAttribute('hidden');
 }*/

 $('#dwn_agn').click(function(){
   var app_id = $('#hidden').html();
    $.post('inc/api2.php', { app_id: app_id, act:"download-again"}, function(res){
      console.log(res);
      document.location.href = document.location.href;
    });
 });

 
  function remove_download(){
      //return alert('Application is ready to download.');
      var p_id_gen = $('#p_id_gen').html();
      var app_gen = $('#app_gen').html();
      var tab_name = $('#table_name').html();
      var dwn_id = $('#new_hidden').html();
     var app_id = $('#hidden').html();
     var stat  = $('#status').html();
     var nam = $('#namm').html();
    $.post('inc/api.php', { app_id: app_id, p_id_gen: p_id_gen, tab_name:tab_name, dwn_id:dwn_id, app_gen:app_gen, status: stat, name: nam, act:"download-completed" }, function(res){
     // alert(res);
      //console.log(res);
      document.location.href = document.location.href;
    });
  }

      $('#submit').click(function(e){
        e.preventDefault();
        var app_name = $('#name-hidden').html();
        var app_id = $('#hidden').html();

        var email = $('#email_address').val();
        //console.log(email);
        var c_number = $('#number').val();
        if( email == '' || c_number == ''){

        }else{
        $.post('inc/api.php', {app_id: app_id, app_name:app_name, email_address: email, credit_c_num: c_number, act: 'form-submit'}, function(res){
          //alert(res);
         if (res) {
          //var id = res;
          //$('#new_hidden').html("This is my app.");
          document.location.href = document.location.href;
          
         }
          

        });
        

}
      });
    </script>
   
   <?php require 'inc/footer.php'; ?>
   
 