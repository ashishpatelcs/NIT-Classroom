<?php
include_once("conn.php");
$flag = $_GET["flag"];
$rec_time = $_GET["rec-time"];
$action = time();
$action = ($action - $rec_time)/60;
$query = "INSERT into activity(`flag`, `action`, `classid`) VALUES ('$flag', '$action', '$rec_time')";
$result = mysqli_query($connection, $query);
?>