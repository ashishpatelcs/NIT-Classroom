<?php

session_start();
if(isset($_POST['enroll'])) {
	$name = $_POST['name'];
	$enroll = $_POST['enroll'];
	$seatno = $_POST['seatno'];
	$seatcode = $_POST['seatcode'];
}
else {
	die("Please fill all details! Go back and try again.");
}

include_once('conn.php');
$query = "insert into seatplan VALUES('S$seatno', '$name', '$enroll', '210A', 'Artificial Intelligence', '2018-01-01')";
$result = mysqli_query($connection, $query);

echo '<meta http-equiv="refresh" content="0;url=action2.php">';

?>