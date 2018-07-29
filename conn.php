<?php
	// establish database connection
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "toor";
	$dbname = "ailab";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	// test if connection successful
	if(mysqli_connect_error()) {
		die("Database connection failed: " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
	}
?>