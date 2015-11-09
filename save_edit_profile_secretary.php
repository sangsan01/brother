<?php
	include 'config.php';
	session_start();

	$userid = $_SESSION["SecretaryID"];

	$password = $_POST["txtPassword"];

	$queryUpdate = "UPDATE member SET password ='$password' where UserID = $userid";
	$result = $conn->query($queryUpdate);

	
	session_write_close();	
	echo "แก้ไขข้อมูลสำเร็จ";
	header('refresh: 3; url=about.php');
?>	