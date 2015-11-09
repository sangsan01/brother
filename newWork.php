<?php
session_start();
include "config.php";

$year = $_POST['year'];
$description = $_POST['description'];
$work_userid = $_SESSION["UserID"];

if($year != null && $description != null){
  $stmt = $conn->prepare("INSERT INTO work VALUES ('',?,?,?)");
  $stmt->bind_param('ssi', $year, $description, $work_userid);

  if($stmt->execute()){
?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>เพิ่มข้อมูลสำเร็จ!</strong>
    </div>
<?php
    } 
  else{
?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Error!</strong> Maaf terjadi kesalahan, data error.
    </div>
<?php
  }
}
 
else{
?>
  <div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>ข้อมูลขาดหาย!</strong>กรุณาเติมข้อมูลในช่องว่าง
  </div>
<?php
}
?>