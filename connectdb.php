<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "school";


	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	

	mysqli_set_charset($objCon, "utf8");
?>