<?php
	include 'connectdb.php';
	session_start();

	$userid = $_SESSION["UserID"];

	// $count = $_POST['loopCount'];
	$start = $_POST["txtStart"];
	$end = $_POST["txtEnd"];
	$detail = $_POST["txtDetail"];

	foreach( $start as $key => $s ) {
  		// echo "Start at $s to $end[$key] $detail[$key]";

  		$strSQL = "INSERT INTO experience (Start,End,Detail,Exp_UserID) VALUES ('".$s."','".$end[$key]."','".$detail[$key]."','".$userid."')";
		$objQuery = mysqli_query($objCon,$strSQL);
	}
	// for($i=0;$i<$count;$i++){

	

	// }
	session_write_close();	

	
	header('Location: index.php');
	
?>	