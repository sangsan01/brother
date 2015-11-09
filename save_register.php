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
		echo "<script type='text/javascript'>alert('Username นี้ถูกใช้งานแล้ว')</script>";
		// header("location:register_form.php");
		header('refresh: 0; url=register_form.php');

	}
	else
	{	
		
		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"images/".$_FILES["filUpload"]["name"]))	//check image
		{
			$queryInsert = "INSERT INTO member (Username,Password,Firstname,Lastname,School,Position,Mobilephone,Address,Email,Line,Facebook,Role,SupervisorID) VALUES ('".$_POST["txtUsername"]."','".$_POST["txtPassword"]."','".$_POST["txtFirstname"]."','".$_POST["txtLastname"]."','".$_POST["txtSchool"]."','".$_POST["txtPosition"]."','".$_POST["txtMobilephone"]."','".$_POST["txtAddress"]."','".$_POST["txtEmail"]."','".$_POST["txtLine"]."','".$_POST["txtFacebook"]."','".'brother'."','".'0'."')";
			$result = $conn->query($queryInsert);
			
			//get auto id from member
    		$insert_id = $conn->insert_id; 
    		

			//insert image to database
    		$queryImage = "INSERT INTO file (FileName,File_UserID) VALUES ('".$_FILES["filUpload"]["name"]."','".$insert_id."')"; 
			$result = $conn->query($queryImage);
			


			echo "<script type='text/javascript'>alert('Registration complete')</script>";
		
			header('refresh: 0; url=about.php');

		}


	}
	$conn->close();

?>
