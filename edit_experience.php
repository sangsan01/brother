<?php
	session_start();
	include "connectdb.php";
  $query = "SELECT * FROM experience WHERE Exp_UserID = '".$_SESSION['UserID']."' ";
  $result = $conn->query($query);
  $row = $result->fetch_array();

	
	$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<script src="js/jquery.js"></script>

  <script src="js/bootstrap.min.js"></script>

  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  <div class="container"> 
    <form method="POST" class="form-horizontal" action="saveExperience.php" role="form">
      <div class="panel panel-default" style="margin-top: 80px;">
        <div class="panel-heading">
          <h1 class="panel-title">ประวัติการทำงาน</h1>
        </div>
        <div class="panel-body">  
          <div id='TextBoxesGroup'>
			<?php while($objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC)){ ?>
            	<div class="form-group">
                <label class="col-md-4 control-label">เพิ่มประวัติการทำงาน #1 : เริ่ม พ.ศ.</label>
                <div class="col-md-3">
                  <input type="text" name= "txtStart[]" class="form-control" value="<?php echo $objResult["Start"];?>">
                </div>
                <label class="col-md-2 control-label">สิ้นสุด พ.ศ.</label>
                <div class="col-md-3">
                  <input type="text" name= "txtEnd[]" class="form-control" value="<?php echo $objResult['End']; ?>">
                </div>
                </div>
                <div class="form-group">
    		        <label class="col-md-4 control-label">รายละเอียด</label>
                <div class="col-md-8">
                  <input type="text" name= "txtDetail[]" class="form-control" value="<?php echo $objResult['Detail']; ?>">
                </div>
              	
            </div>
            <?php } ?>
          </div>
          <div class="form-inline"> 
                <input type="submit" name="Submit" value="บันทึก" onclick = "return confirm('ยืนยันการเพิ่ม ?')" class="btn btn-success" style="float: right;">  
          </div> 
        </div>
      </div>
    </form>
  </div>
    
  

</body>
</html>