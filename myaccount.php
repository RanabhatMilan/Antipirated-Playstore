


<?php require "inc/header.php";
		require "admin/include/db.php"; 
		require "admin/include/function.php";
    if(isset($_SESSION['customer_id'])){
		$cus_login_info = get_cus_info($_SESSION['customer_id']);
		$apps_info = get_app_info($_SESSION['customer_id']);
		//debugger($apps_info, true);
		?>
    <div  style="min-height: 500px;" id="site_content">
      <div class="container">
      	<h4><?php echo $_SESSION['first_name']." ".$cus_login_info['last_name']; ?></h4>
      	<h4><?php echo $_SESSION['customer']; ?></h4>
      	<h3 style="color: red;">My Apps</h3>
      	<ul>
      		<?php
          if(!empty($apps_info)){
           foreach($apps_info as $key => $ainfo){
            if(!empty($ainfo)){

              ?>
            <div class="row"><span class="column" style="width: 250px; float: left;"><?php echo $ainfo['apps_name']; ?></span><h5 class="column" style="width: 250px; float: left;">Product Key:<?php echo $ainfo['product_key']; ?></h5>
           <h5 class="column" style="width: 250px; float: left;"><?php echo $ainfo['added_date']; ?></h5> </div>
      <?php   }

            }
      		
      }else{
        echo "No apps found.";
      } ?>
      		

      	</ul>

      </div>
      </div>
    </div>
   <?php require 'inc/footer.php'; 
}else{
  header('location:form.php');
  exit;
}
?>