<?php
//ob_start();
 session_start();
 include 'include/db.php';
include 'include/function.php';
include 'include/session_check.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
$getappdata = getAppsById($_GET['id'], $_GET['table']);
//debugger($getappdata, true);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../bootstrap/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../bootstrap/js/jquery.min.js"></script>
   <script  src="js/bootstrap.min.js"></script>
</head>
<body>

<div id="wrapper" >
<?php include 'include/nav.php'; ?>
	 <div id="page-wrapper">

            <div class="container-fluid">
                <?php include'include/notification.php'; ?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Games Page
                            <small class="pull-right"><?php echo date('Y-M-d'); ?></small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
<form  action="process/apps.php?act=games" method="post" enctype="multipart/form-data" class="form form-horizontal">
<div class="form-group">
    <label class="col-sm-3">Upload Game Here:</label>
    <div class="col-sm-6">
    <input type="file" game/zip <?php echo isset($getappdata)?"":"required"; ?>  name="games" id="game">
    <?php 
    if (isset($getappdata['games'])) {
        ?>
        <input style="text-align: center;" readonly name = "old_games" type="text" value="<?php echo $getappdata['games']; ?>" class="form-control">
        <?php
    }
     ?>
</div>
</div>
<div class="form-group">
    <label class="col-sm-3">Name of the Game:</label>
    <div  class="col-sm-6">
    <input style="text-align: center;" type="text" required name="games_name"  value="<?php echo isset($getappdata['games_name'])? $getappdata['games_name']:''; ?>" id="games_name" ></div></div>

<div class="form-group">
    <label class="col-sm-3">Add Image:</label>
    <div class="col-sm-6">
    <input type="file" <?php echo isset($getappdata)?"":"required"; ?> name="games_image" id="game_image" accept="image/*">
 <?php 
    if (isset($getappdata['games_image'])) {
        ?>
        <img src="upload/gamesImage/<?php echo $getappdata['games_image']; ?>" class="img img-thumbnail">
        <input  hidden type="text" name="old_image" value="<?php echo $getappdata['games_image']; ?>"> 
        <?php
    }
     ?>
</div>
</div>

<div class="form-group">
    <label class="col-sm-3">Features:</label>
    <div class="col-sm-6">
    <textarea  name="features" id="features" rows="5" class="form-control"><?php echo isset($getappdata['features'])?$getappdata['features']:""; ?></textarea> </div>
</div>

<div class="form-group">
    <label class="col-sm-3"></label>
    <div class="col-sm-6">
    <input type="radio" <?php  if(isset($getappdata) && $getappdata['status'] == "Free"){ echo "checked"; }  ?> onclick="no_price();"  name="paid_free"  value="Free" id="paid_free">Free
    <input type="radio" <?php if(isset($getappdata) && $getappdata['status'] == "Paid"){ echo "checked"; } ?> onclick="price();"  name="paid_free"  value="Paid" id="paid_free">Paid
</div>
</div>

<div id="remove-hidden" class="hidden form-group">
    <label class="col-sm-3">Price:</label>
    <div class="col-sm-6">
    <input type="number" step="0.01" min="0"  name="games_price" value="<?php echo isset($getappdata['price'])?$getappdata['price']:''; ?>"  id="games_price"></div>
</div>



<div class="form-group"><label class="col-sm-3"></label>
    <div class="col-sm-4">
                <input type="text" hidden name="hidden_id" value="<?php echo $getappdata['id'];?>">
<button class="btn btn-success" type="submit">Upload</button></div>
</div>
    
</form>
        </div>


    </div>
    <script type="text/javascript">
        function price(){
            $('#remove-hidden').removeClass('hidden');

        }
         function no_price(){
            $('#remove-hidden').addClass('hidden');

        }
    </script>

<?php include 'include/footer.php'; ?>