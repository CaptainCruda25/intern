<?php

require 'server.php';
session_start();
error_reporting(0);

if(!$_SESSION['username']){
	header('location: index.php');
	exit();
}

if(isset($_POST['add'])){
	$details = $_POST['details'];
	$time = strftime("%X"); //time
	$date = strftime("%B %d, %Y"); // date
	$choice = "No";

	if(empty($details) || empty($choice)){
		echo "<script>window.alert('Please Fill All The Fields!');</script>";
		echo "<script>window.location.assign('home.php');</script>";
	}
	else {
		foreach($_POST['public'] as &$each_key){
			if (!empty($each_key)){
				$choice = "Yes";
			}
		}
		$sql = "INSERT INTO list_tbl(details, dateposted, timeposted, public)VALUES('$details', '$date','$time', '$choice' );";
		$query = mysqli_query($conn, $sql);
		echo "<script>window.alert('Added Successfully!')</script>";
		echo "<script>window.location.assign('home.php')</script>";

	}
}
else{
	echo "<script>window.alert('Please Fill All The Fields!');</script>";
	echo "<script>window.location.assign('home.php');</script>";
}




?>