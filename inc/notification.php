<?php 

if (isset($_SESSION['success']) && $_SESSION['success']!=" " ) {

	echo "<p class='alert alert-success'>".$_SESSION['success']."</p>";
	unset($_SESSION['success']);
	}

if (isset($_SESSION['error']) && $_SESSION['error']!=" " ) {

	echo "<p class='alert alert-success'>".$_SESSION['error']."</p>";
	unset($_SESSION['error']);
	}

if (isset($_SESSION['warning']) && $_SESSION['warning']!=" " ) {

	echo "<p class='alert alert-warning'>".$_SESSION['warning']."</p>";
	unset($_SESSION['warning']);
	}










 ?>