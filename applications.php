<?php 
require "admin/include/db.php";
require "admin/include/function.php";


   $apps_info = getAppsInfo('applications','Paid');
   $free_apps_info = getAppsInfo('applications','Free');
   //echo $apps_info[0]['apps'];
 //debugger($apps_info,true);
 require "inc/header.php"; 
   ?>
   
    <div class="row" style="min-height: 500px;" id="site_content">
      
      
        <div class="column" style="float: left; width: 50%;">
           <h2>Free Apps</h2>
      	<?php 
        if (!empty($free_apps_info)) {
          
        
        foreach ($free_apps_info as $key => $free_apps) {
      		?>
          <div id="content">
      		<img alt="<?php echo $free_apps['apps_name'] ?>" width="200px" height="200px" src="admin/upload/appsImage/<?php echo $free_apps['apps_image'] ?>">
        
         </div>
         <h3>
         <div style="padding-top: 10px; padding-bottom: 10px; width: 200px;">
         <a  href="form.php?id=<?php echo $free_apps['id']; ?>&table=applications&status=free" style="text-decoration-line: none;" > Download </a> <span style="float: right;">Free</span>
          <a   href="style/<?php echo $free_apps['apps_name']; ?>/" style="text-decoration-line: none;"> Use Online </a>

       </div></h3>
      		<?php  
      	}
        } 
      	?>
        </div>

        <div class="column"  style="float: left; width: 50%;">
           <h2>Paid Apps</h2>
        <?php 
        if (!empty($apps_info)) {
         foreach ($apps_info as $key => $apps) {
          ?>
          <div id="content">
          <img alt="<?php echo $apps['apps_name'] ?>" width="200px" height="200px" src="admin/upload/appsImage/<?php echo $apps['apps_image'] ?>">
          <h3>
           <div style="padding-top: 10px; padding-bottom: 10px;">
        <a  href="form.php?id=<?php echo $apps['id']; ?>&table=applications&status=paid" style="text-decoration-line: none;" > Download </a>/
        <a   href="style/<?php echo $apps['apps_name']; ?>/" style="text-decoration-line: none;"> Use Online </a>

         </div></h3></div>

          <?php  
        } 
       } ?>
        </div>

      
       
     
    </div>



 </script>
     <?php require 'inc/footer.php'; ?>

   