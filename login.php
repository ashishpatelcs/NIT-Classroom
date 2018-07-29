<?php
	// start session
	session_start();
	
	// get username and password from $_POST
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(isset($_POST['admin'])) $admin = true;
		else $admin = false;
	}
	else die("Login failed!");
	
	// establish database connection
	include_once('conn.php');
	
	// query to find the user in database
	if($admin)
		$query = "SELECT `enroll` FROM `users` WHERE enroll = '$username' AND password = '$password'";
	else $query = "SELECT `enroll` FROM `students` WHERE enroll = '$username' AND password = '$password'";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		echo "Database query failed!<br/><h2>Incorrect Login Details: <a href='index.php'>click here</a> to go back to Login.";
	}
	$row = mysqli_fetch_array($result);
	$user_id = $row['enroll'];
	if(!$user_id) {
		echo "<br/><h2>Invalid Login Details: <a href='index.php'>click here</a> to go back to Login.";
	}
	else {
		if($admin) {
			$_SESSION['uid'] = $user_id;
			echo '<meta http-equiv="refresh" content="0;url=record.php">';
		} else {
			$_SESSION['sid'] = $user_id;
			echo '<meta http-equiv="refresh" content="0;url=manualseat.php">';
		}
	}
?>