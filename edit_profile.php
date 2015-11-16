<?php
	session_start();
	include "config.php";

	$queryMember = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
  $result = $conn->query($queryMember);
  $rowMember = $result->fetch_array();

  $queryFile = "SELECT FileName FROM file WHERE File_UserID = '".$_SESSION['UserID']."' ";
  $result = $conn->query($queryFile);
  $rowFile = $result->fetch_array();
  $conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/basic-template.css" rel="stylesheet" />
  <!-- Bootstrap jasny CSS -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

  <!-- BootstrapValidator CSS -->
  <link href="css/bootstrapValidator.min.css" rel="stylesheet"/>

  <!-- Bootstrap Navbar-custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/navbar-custom.css">

  <!-- jQuery and Bootstrap JS -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!-- Jasny JS -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

  <!-- BootstrapValidator -->
  <script src="js/bootstrapValidator.min.js" type="text/javascript"></script>




	<title>Edit Profile</title>
</head>
<body>
  <?php
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
  ?>
  <div class="container">
  <div class="col-md-8 col-md-offset-2">
    
      <div class="panel panel-primary" style="margin-top: 120px;">
        <div class="panel-heading">
          <h3 class="panel-title">แก้ไขประวัติส่วนตัว</h3>
        </div>
        <div class="panel-body">
        <form id="registration-form" method="POST" class="form-horizontal" action="save_profile.php" enctype="multipart/form-data">  
          <div class="form-group">
            <div class="col-md-2">
              <label class="control-label">Username</label>
            </div>
            <div class="col-md-10">
              <label><?php echo $rowMember["Username"];?></label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2"> 
              <label class="control-label">Password</label>
            </div>
            <div class="col-md-10">
              <input name="txtPassword" type="password" id="txtPassword" class="form-control" value="<?php echo $rowMember["Password"];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label class="control-label">Confirm Password</label>
            </div>
            <div class="col-md-10">
              <input name="txtConPassword" type="password" id="txtConPassword" class="form-control" value="<?php echo $rowMember["Password"];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label class="control-label">Firstname</label>
            </div>
            <div class="col-md-10">
              <input name="txtFirstname" type="text" id="txtFirstname" class="form-control" value="<?php echo $rowMember["Firstname"];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label class="control-label">Lastname</label>
            </div>
            <div class="col-md-10">
              <input name="txtLastname" type="text" id="txtLastname" class="form-control" value="<?php echo $rowMember["Lastname"];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label class="control-label">School</label>
            </div>
            <div class="col-md-10">
              <input name="txtSchool" type="text" id="txtSchool" class="form-control" value="<?php echo $rowMember["School"];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label class="control-label">Position</label>
            </div>
            <div class="col-md-10">
              <input name="txtPosition" type="text" id="txtPosition" class="form-control" value="<?php echo $rowMember["Position"];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label class="control-label">Mobilephone</label>
            </div>
            <div class="col-md-10">
              <input name="txtMobilephone" type="text" id="txtMobilephone" class="form-control" value="<?php echo $rowMember["Mobilephone"];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label class="control-label">Address</label>
            </div>
            <div class="col-md-10">
              <textarea rows="4" name="txtAddress" id="txtAddress" class="form-control"><?php echo $rowMember["Address"];?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label class="control-label">Email</label>
            </div>
            <div class="col-md-10">
              <input name="txtEmail" type="text" id="txtEmail" name="txtEmail" class="form-control" value="<?php echo $rowMember["Email"];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label class="control-label">Line</label>
            </div>
            <div class="col-md-10">
              <input name="txtLine" type="text" id="txtLine" class="form-control" value="<?php echo $rowMember["Line"];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label class="control-label">Facebook</label>
            </div>
            <div class="col-md-10">
              <input name="txtFacebook" type="text" id="txtFacebook" class="form-control" value="<?php echo $rowMember["Facebook"];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label class="control-label">Status</label>
            </div>
            <div class="col-md-10">
              <label class="control-label"><?php echo $rowMember["Role"];?></label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">รูปประจำตัว</label>
            </div>
            <div class="col-md-9">
              <!-- <input type="file" name="fileUpload"> -->

              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                  <img src="images/<?php echo $rowFile["FileName"];?>" alt="">
                </div>
                <div>
                  <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="fileUpload"></span>
                  <!-- <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> -->
                </div>
              </div>
              <p>* รองรับไฟล์ภาพนามสกุล jpg,jpeg,png,gif เท่านั้น</p>
              <p>* รองรับไฟล์ภาพขนาดไม่เกิน 250*250 pixel</p>
            </div>  
          </div>
          <div class="form-inline" align="right"> 
            <button type="submit" class="btn btn-default">บันทึก</button>
          </div>
          </form>
        </div>
      </div>
     
    </form>
    </div> 
  </div>
</body>

<script type="text/javascript">
  $(document).ready(function () {
    var validator = $("#registration-form").bootstrapValidator({
      feedbackIcons: {
        valid: "glyphicon glyphicon-ok",
        invalid: "glyphicon glyphicon-remove", 
        validating: "glyphicon glyphicon-refresh"
      }, 
      fields : {
        txtPassword : {
          validators: {
            notEmpty : {
              message : "กรุณากรอก Password"
            },
            stringLength : {
              min: 8,
              max: 15,
              message: "Password ต้องมีความยาว 8 ถึง 15 ตัวอักษร"
            } 
          }
        }, 
        txtConPassword : {
          validators: {
            notEmpty : {
              message: "Confirm password"
            },
            identical : {
              field: "txtPassword", 
              message : "Password and Confirm Password ต้องเหมือนกัน"
            }
          }
        },
        txtFirstname : {
          validators: {
            notEmpty : {
              message : "กรุณากรอก ชื่อ"
            }
          }
        },
        txtLastname : {
          validators: {
            notEmpty : {  
              message : "กรุณากรอก นามสกุล"
            }
          }
        },
        txtSchool : {
          validators: {
            notEmpty : {  
              message : "กรุณากรอก โรงเรียน"
            }
          }
        },
        txtPosition : {
          validators: {
            notEmpty : {  
              message : "กรุณากรอก ตำแหน่ง"
            }
          }
        },
        txtMobilephone : {
          validators: {
            notEmpty : {  
              message : "กรุณากรอก เบอร์โทรศัพท์เคลื่อนที่"
            },
            digits: {
              message : "สามารถกรอกได้แค่ตัวเลขเท่านั้น"
            }
          }
        },
        txtAddress : {
          validators: {
            notEmpty : {  
              message : "กรุณากรอก ที่อยู่"
            }
          }
        },
        txtEmail :{
          validators: {
            notEmpty : {
              message : "กรุณากรอก Email"
            }, 
            emailAddress: {
              message: "กรุณากรอกรูปแบบ Email ให้ถูกต้อง someone@example.com"
            }
          }
        },
        txtLine : {
          validators: {
            notEmpty : {  
              message : "กรุณากรอก Line"
            }
          }
        },
        txtFacebook : {
          validators: {
            notEmpty : {  
              message : "กรุณากรอก Facebook"
            }
          }
        }, 
      }
    });
  

    
  });
</script>
</html>