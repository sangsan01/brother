<?php
	session_start();

	include 'config.php';
	$queryMember = "UPDATE member SET Password = '".trim($_POST['txtPassword'])."',Firstname = '".trim($_POST['txtFirstname'])."',Lastname = '".trim($_POST['txtLastname'])."',School = '".trim($_POST['txtSchool'])."',Position = '".trim($_POST['txtPosition'])."',Mobilephone = '".trim($_POST['txtMobilephone'])."',Address = '".trim($_POST['txtAddress'])."',Email = '".trim($_POST['txtEmail'])."',Line = '".trim($_POST['txtLine'])."',Facebook = '".trim($_POST['txtFacebook'])."' WHERE UserID = '".$_SESSION["UserID"]."' ";

	$queryFile = "UPDATE file SET FileName = '".$_FILES["fileUpload"]["name"]."' WHERE File_UserID = '".$_SESSION["UserID"]."' ";

    if(!$conn->query($queryMember)){
    	$conn->error();
    }
  	if(trim($_FILES["fileUpload"]["tmp_name"]) != "")
	{
		$filetype = $_FILES["fileUpload"]["type"];
		

		if(($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/png") and ($filetype!="image/gif"))
		{
			echo "รองรับไฟล์ภาพเฉพาะนามสกุล jpg,jpeg,png,gif เท่านั้น";
		}

		else
		{		
			if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"images/".$_FILES["fileUpload"]["name"]))
			{
				$filename = "images/".$_FILES["fileUpload"]["name"];
				list($width, $height) = getimagesize($filename);

				if($width>250 || $height>250){
					echo "รองรับไฟล์ภาพขนาดไม่เกิน 250*250 pixel";
				}

				else{
					$conn->query($queryFile);
					echo "อัพเดทประวัติส่วนตัวและรูปภาพประจำตัวเสร็จสมบูรณ์";
					header('refresh:3;url=about.php');
				}

			}
		}
			
	}

	else{
		echo "กรุณาอัพโหลดรูปภาพ";
	}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

    <script type="text/javascript">
    function countdown() {
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML)<=0) {
            location.href = 'edit_profile.php';
        }
        i.innerHTML = parseInt(i.innerHTML)-1;
    }
    setInterval(function(){ countdown(); },1000);
    </script>

</head>
<body>

	<p>You will be redirected in <span id="counter">3</span> second(s).</p>
	
</body>
</html>



