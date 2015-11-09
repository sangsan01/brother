<?php
	include 'config.php';
	session_start();

	$userid = $_SESSION["UserID"];

	$password = $_POST["txtPassword"];

	$queryUpdate = "UPDATE member A\n"
    . "INNER JOIN member B \n"
    . " ON A.UserID = B.UserID\n"
    . " AND B.SupervisorID=$userid\n"
    . "SET A.Password = '$password'";

	$result = $conn->query($queryUpdate);
	
	session_write_close();	
	echo "แก้ไขข้อมูลเลขานุการสำเร็จ";
	header('refresh: 3; url=about.php');
?>	