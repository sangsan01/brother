<?php
	session_start();
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
     
      if(!username || !password){
        alert("กรุณากรอกข้อมูลในช่องว่าง")
        return false;  
      }   
      else{
        return confirm("ยืนยันการบันทึก");
      }
    }); 
}); 
</script>

	<title>Secretarty grant</title>
</head>
<body>
  <?php
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
  <div class="container" style="margin-top:120px;">
  <div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form method="POST" class="form-horizontal" action="saveSecretary.php" role="form1" id="form1" style="margin-top:100;" enctype="multipart/form-data">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">เพิ่มเลขานุการ</h3>
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