<?php
	$servername = "localhost";
	$username = "root";
	$password="";
	$db="sp_rec";
	$conn = mysqli_connect($servername,$username,$password,$db);
	if ($conn) {
		// echo "connected";
	}else{
		echo "Connection failed".mysqli_connect_error();
	}
?>