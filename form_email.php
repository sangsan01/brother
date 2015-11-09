<?php
	session_start();
	include "connectdb.php";

	$strSQL = "SELECT * FROM member WHERE UserID = '".$_GET['UserID']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

	if(isset($_SESSION['UserID']))
    {
        if($_SESSION['Role'] == "brother"){
            include "brother_header.php";
        }
        else{
            include "secretary_header.php";
        }

    }
    else
    {
       include "header.php";
    }
?>


<html lang="en">
<head>
	<script src="js/bootstrap.min.js"></script>
 
	<script src="js/jquery.js"></script>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="container">
	<form method="POST" class="form-horizontal" action="sendEmail.php" role="form" style="margin-top: 80px;">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Email</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-3 control-label">ถึง</label>
					<div class="col-md-9">
						<label class="control-label"><?php echo $objResult['Email']?></label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">ชื่อเรื่อง</label>
					<div class="col-md-9">
						<input type="input" name= "txtSubject" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">ข้อความ</label>
					<div class="col-md-9">
						<textarea class="form-control" name="txtMessage" rows="8"></textarea>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-md-3 control-label">จาก</label>
					<div class="col-md-9">
						<input type="input" name= "txtHeader" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"></label>
					<div class="col-md-9">
						<input type="submit" name="Submit" value="ส่ง" onclick = "return confirm('ยืนยันการส่ง ?')">
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>
</body>
</html>