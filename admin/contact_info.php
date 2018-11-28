<?php
ob_start();
 session_start();
 include 'include/db.php';
include 'include/function.php';
include 'include/session_check.php';

$c_info = getAllAppsInfo('contact_info');

 //debugger($c_info,true); ?>
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
                           Contact Info Page
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            <div class="container-fluid">
                <table class="table table-bordered">
                    <thead>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Message</th>
                        <th>Added Date</th>
                        <th>Remarks</th>
                    </thead>
                    <tbody>
                        <?php 
                        if (isset($c_info)) {
                            foreach ($c_info as $key => $contact) {
                                ?>
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $contact['name']; ?></td>
                                        <td><?php echo $contact['email_address']; ?></td>
                                        <td><?php echo $contact['message']; ?></td>
                                        <td><?php echo $contact['added_date']; ?></td>
                                        <td><a href="process/apps.php?id= <?php echo $contact['id'];?> &act=delete&table=contact_info"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <?php 
                            }
                        }
                         ?>

                    </tbody>
                </table>
            </div>
        </div>
        
    <?php include 'include/footer.php'; ?>