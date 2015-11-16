<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<?php
	session_start();
	include 'config.php';

	//check duplicate user
    $queryDuplicate = "SELECT * FROM member WHERE Username = '".trim($_POST['txtUsername'])."' ";
    $result = $conn->query($queryDuplicate);

    if (!$result) {
  		die($mysqli->error);
	}
	
	if($result->num_rows > 0)	//check duplicate user
	{
		echo "Username นี้ถูกใช้งานแล้ว";
		header('refresh: 3; url=newSecretary.php');

	}
	else
	{	
		
		$queryInsert = "INSERT INTO member (Username,Password,Firstname,Lastname,School,Position,Mobilephone,Address,Email,Line,Facebook,Role,SupervisorID) VALUES ('".$_POST["txtUsername"]."','".$_POST["txtPassword"]."','".'-'."','".'-'."','".'-'."','".'-'."','".'-'."','".'-'."','".'-'."','".'-'."','".'-'."','".'secretary'."','".$_SESSION["UserID"]."')";
		$result = $conn->query($queryInsert);

		echo "เพิ่มข้อมูลเลขานุการสำเร็จ";
		header('refresh: 3; url=about.php');

	}


	
	$conn->close();

?>
