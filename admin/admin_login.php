<?php 
 //ob_start();
 session_start();
 require 'include/db.php';
require 'include/function.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../bootstrap/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="wrapper" >
	<?php 
	if (isset($_SESSION['session_id'])) {
        if($_SESSION['session_id']!='' && strlen($_SESSION['session_id'])==15) {
    $_SESSION['success']="You are already logged in.";
    @header('location: adminpage.php');
    exit;
    } 
}    ?>

		<div id="page-wrapper" style="border-style: solid; width:800px;">

            <div class="container-fluid" >
                <?php include'include/notification.php'; ?>
                <!-- Page Heading -->
                <div class="row"  >
                	<form method="post" name="login" action="process/login.php" >
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" id="username" required />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" id="password" required />
						</div>

                       

						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-primary" id="submit" required />
						</div>
                	</form>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>

	<?php include 'include/footer.php'; ?>