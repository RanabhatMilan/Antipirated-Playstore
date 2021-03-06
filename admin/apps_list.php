
 <?php
//ob_start();
 session_start();
 include 'include/db.php';
include 'include/function.php';
include 'include/session_check.php';

$apps_info = getAllAppsInfo('applications');
 //debugger($apps_info,true); ?>
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
                           
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <div id="page-wrapper">
        	<h3>Applications List:</h3>
        	<table class="table table-bordered">
        		<thead>
        			<th>S.N</th>
                    <th>Apps Name</th>
                    <th>Apps Image</th>
                    <th>Features</th>
                    <th>Status</th>
        			<th>Added By</th>
                    <th>Added Date</th>
                    <th>Remarks</th>
        		</thead>
        		<tbody>
                    <?php if (!empty($apps_info)) {
                        foreach ($apps_info as $key => $apps) {
                            ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                 <td><?php echo $apps['apps_name']; ?></td>
                                <td> 
                                    <?php if ($apps['apps_image'] !="" &&file_exists('upload/appsImage/'.$apps['apps_image'])) {
                                        ?>
                                        <div class="img img-responsive">
                                        <img src="<?php echo  'upload/appsImage/'.$apps['apps_image'];?>" class="img img-thumbnail" style="max-width:100px;">
                                        </div>
                                        <?php  
                                    } ?>
                                </td>
                                <td><?php echo $apps['features']; ?></td>
                                <td><?php echo $apps['status']; ?></td>
                                <td>
                                    <?php 
                                    echo $apps['uploaded_by'];
                                    ?>
                                </td>
                                <td><?php echo $apps['uploaded_date']; ?></td>
                                <td><a href="apps_add.php?id=<?php echo $apps['id']; ?>&act=edit&table=applications" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('Are you sure you want to delete this app?')" href="process/apps.php?id=<?php echo $apps['id']; ?>&act=delete&table=applications" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                               </tr>

                            <?php 
                        }
                    } ?>

        		</tbody>
        		
        	</table>
        </div>
    <?php include 'include/footer.php'; ?>

