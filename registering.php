<?php

session_start();
if(isset($_POST['enroll'])) {
	$name = $_POST['name'];
	$enroll = $_POST['enroll'];
	$password = $_POST['password'];
}
else {
	die("Please fill all details! Go back and try again.");
}

include_once('conn.php');
$query = "insert into students VALUES('$name', '$enroll', '$password')";
$result = mysqli_query($connection, $query);

$_SESSION['sid'] = $enroll;
echo '<meta http-equiv="refresh" content="0;url=manualseat.php">';

?>