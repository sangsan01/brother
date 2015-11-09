<?php
	session_start();
	include 'config.php';
	if(isset($_SESSION['UserID']) && $_SESSION['UserID'] != "")
  {
    if($_SESSION['Role'] == "brother"){
      include "brother_header.php";
    }
    else if ($_SESSION['Role'] == "secretary") {
      include "secretary_header.php";
    }
  }
  else
  {
    include "header.php";
  }

  $query = "SELECT * FROM member WHERE UserID = '".$_SESSION["SecretaryID"]."' ";
  $result = $conn->query($query);
  $row = $result->fetch_array();

  $conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/navbar-custom.css"> 

	<title>Document</title>
</head>
<body>

  <div class="container">
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form method="POST" class="form-horizontal" action="save_edit_profile_secretary.php" role="form1" id="form1" style="margin-top:100;" enctype="multipart/form-data">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">แก้ไขข้อมูลส่วนตัว</h3>
        </div>
        <div class="panel-body">  
          <div class="form-group">
            <label class="col-md-2 control-label">Username</label>
            <div class="col-md-10">
              <?php echo $row["Username"];?>
            </div>
          </div>	
          <div class="form-group">
            <label class="col-md-2 control-label">Password</label>
            <div class="col-md-10">
              <input name="txtPassword" type="password" id="txtPassword" class="form-control">
            </div>
          </div>
          <div class="form-inline" align="right"> 
            <button type="submit" class="btn btn-default">บันทึก</button>
          </div>
        </div>
      </div>
     
    </form>
    </div>
    </div> 
  </div>  

</body>


</html>