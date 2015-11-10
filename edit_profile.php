<?php
	session_start();
	if(isset($_SESSION['UserID']) && $_SESSION['UserID'] != "")
    {
        if($_SESSION['Role'] == "brother"){
          include "brother_header.php";
        }
        else if($_SESSION['Role'] == "secretary"){
          include "secretary_header.php";
        }
        else{
          include "header.php";
        }

    }
    else
    {
      echo "Please login";
      header('refresh:3;url=about.php');
      exit();
    }
	
	include "config.php";

	$query = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
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

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>


  <script type="text/javascript">
    $(document).ready(function(){
      $("#form1").submit(function(){
      
        var password = $("#txtPassword").val();
        var conpassword = $("#txtConPassword").val();
      
        if(password != conpassword){
          alert("กรุณากรอกข้อมูลในช่องว่าง")
          return false;
      }   
        else{
          return confirm("ยืนยันการบันทึก?");
        }

      }); 
    });

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    } 
  </script>


	<title>Edit Profile</title>
</head>
<body>

  <div class="container">
  <div class="col-md-8 col-md-offset-2" >
    <form method="POST" class="form-horizontal" action="save_profile.php" role="form" style="margin-top:80;" enctype="multipart/form-data">
      <div class="panel panel-default" style="margin-top: 100px;">
        <div class="panel-heading">
          <h3 class="panel-title">แก้ไขประวัติส่วนตัว</h3>
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
              <input name="txtPassword" type="password" id="txtPassword" class="form-control" value="<?php echo $row["Password"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Confirm Password</label>
            <div class="col-md-10">
              <input name="txtConPassword" type="password" id="txtConPassword" class="form-control" value="<?php echo $row["Password"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Firstname</label>
            <div class="col-md-10">
              <input name="txtFirstname" type="text" id="txtFirstname" class="form-control" value="<?php echo $row["Firstname"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Lastname</label>
            <div class="col-md-10">
              <input name="txtLastname" type="text" id="txtLastname" class="form-control" value="<?php echo $row["Lastname"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">School</label>
            <div class="col-md-10">
              <input name="txtSchool" type="text" id="txtSchool" class="form-control" value="<?php echo $row["School"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Position</label>
            <div class="col-md-10">
              <input name="txtPosition" type="text" id="txtPosition" class="form-control" value="<?php echo $row["Position"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Mobilephone</label>
            <div class="col-md-10">
              <input name="txtMobilephone" type="text" id="txtMobilephone" class="form-control" value="<?php echo $row["Mobilephone"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Address</label>
            <div class="col-md-10">
              <textarea rows="4" name="txtAddress" id="txtAddress" class="form-control"><?php echo $row["Address"];?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Email</label>
            <div class="col-md-10">
              <input name="txtEmail" type="text" id="txtEmail" class="form-control" value="<?php echo $row["Email"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Line</label>
            <div class="col-md-10">
              <input name="txtLine" type="text" id="txtLine" class="form-control" value="<?php echo $row["Line"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Facebook</label>
            <div class="col-md-10">
              <input name="txtFacebook" type="text" id="txtFacebook" class="form-control" value="<?php echo $row["Facebook"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Status</label>
            <div class="col-md-10">
              <?php echo $row["Role"];?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">รูปประจำตัว</label>
            <div class="col-md-10">
              <!-- <input type="file" name="fileUpload"> -->

              <!-- <img id="uploadPreview" src="images/mystery.png" /><br />
              <input id="uploadImage" type="file" name="fileUpload" onchange="PreviewImage();" /> -->

              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                <div>
                  <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="fileUpload"></span>
                  <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
              </div>
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
</body>
</html>