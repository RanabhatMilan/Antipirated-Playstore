<?php
ob_start();
 session_start();
include 'include/function.php';
include 'include/session_check.php';
 //debugger($_SESSION,true); ?>
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
<?php include 'include/nav.php'; ?>
	 <div id="page-wrapper">

            <div class="container-fluid">
                <?php include'include/notification.php'; ?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Page
                            <small class="pull-right"><?php echo date('Y-M-d'); ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="adminpage.php">HomePage</a>
                            </li>
                           
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
    <?php include 'include/footer.php'; ?>