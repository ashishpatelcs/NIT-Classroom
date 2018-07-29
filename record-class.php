<?php
echo time();
include_once("conn.php");
$name = $_GET["name"];
$start = time();
$end = 0;
$remarks = $_GET["remarks"];
$query = "INSERT into class VALUES ('$name', '$start', '$end', '$remarks')";
$result = mysqli_query($connection, $query);
echo "Class Recording!";
?>