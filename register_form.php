<?php
	session_start();
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

 <script type="text/javascript">
$(document).ready(function(){
   $("#form1").submit(function(){
      var username = $("#txtUsername").val();
      var password = $("#txtPassword").val();
      var conpassword = $("#txtConPassword").val();
      var firstname = $("#txtFirstname").val();
      var lastname = $("#txtLastname").val();
      var school = $("#txtSchool").val();
      var position = $("#txtPosition").val();
      var mobilephone = $("#txtMobilephone").val();
      var address = $("#txtAddress").val();
      var email = $("#txtEmail").val();
      var line = $("#txtLine").val();
      var facebook = $("#txtFacebook").val();
      
     
      if(!username || !password || !conpassword || !firstname || !lastname || !school || !position || !mobilephone || !address || !email || !line || !facebook){
        return false;
         
      }
      if(password != conpassword){
        return false;
      }   
      else{
        return confirm("Are you sure you want to regis?");
      }
    }); 
}); 
</script>

	<title>Document</title>
</head>
<body>

  <div class="container">
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form method="POST" class="form-horizontal" action="save_register.php" role="form1" id="form1" style="margin-top:100;" enctype="multipart/form-data">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">เพิ่มข้อมูล</h3>
        </div>
        <div class="panel-body">  
          <div class="form-group">
            <label class="col-md-2 control-label">Username</label>
            <div class="col-md-10">
              <input name="txtUsername" type="text" id="txtUsername" size="20" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Password</label>
            <div class="col-md-10">
              <input name="txtPassword" type="password" id="txtPassword" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Confirm Password</label>
            <div class="col-md-10">
              <input name="txtConPassword" type="password" id="txtConPassword" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Firstname</label>
            <div class="col-md-10">
              <input name="txtFirstname" type="text" id="txtFirstname" size="35" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Lastname</label>
            <div class="col-md-10">
              <input name="txtLastname" type="text" id="txtLastname" size="35" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">School</label>
            <div class="col-md-10">
              <input name="txtSchool" type="text" id="txtSchool" size="35" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Position</label>
            <div class="col-md-10">
              <input name="txtPosition" type="text" id="txtPosition" size="35" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Mobilephone</label>
            <div class="col-md-10">
              <input name="txtMobilephone" type="text" id="txtMobilephone" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Address</label>
            <div class="col-md-10">
              <textarea rows="4" name="txtAddress" id="txtAddress" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Email</label>
            <div class="col-md-10">
              <input name="txtEmail" type="text" id="txtEmail" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Line</label>
            <div class="col-md-10">
              <input name="txtLine" type="text" id="txtLine" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Facebook</label>
            <div class="col-md-10">
              <input name="txtFacebook" type="text" id="txtFacebook" class="form-control">
            </div>
          </div>
          <!-- <div class="form-group">
            <label class="col-md-2 control-label">Status</label>
            <div class="col-md-10">
              <select name="ddlRole" id="ddlRole">
                <option value="secretary">secretary</option>
                <option value="brother">brother</option>
              </select>
            </div>
          </div> -->
          <div class="form-group">
            <label class="col-md-2 control-label">รูปประจำตัว</label>
            <div class="col-md-10">
              <input type="file" name="filUpload">
            </div>
          </div>
          <div class="form-inline" align="right">
          <button type="submit" class="btn btn-default" onclick = "return confirm('ยืนยันการสมัคร ?')">บันทึก</button>
          </div>
        </div>
      </div>
     
    </form>
    </div>
    </div> 
  </div>  

</body>
</html>