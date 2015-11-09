<?php
	include 'connectdb.php';
	session_start();

	$userid = $_SESSION["UserID"];

	// $count = $_POST['loopCount'];
	
	$year = $_POST["txtYear"];
	$description = $_POST["txtDescription"];

	
	foreach( $year as $key => $y ) {

		$strSQL = "INSERT INTO works (Year,Description,Work_UserID) VALUES ('".$y."','".$_POST["txtDescription"][$key]."','".$userid."')";
		$objQuery = mysqli_query($objCon,$strSQL);

	}

	
	session_write_close();	

	
	header('Location: index.php');
	
?>	