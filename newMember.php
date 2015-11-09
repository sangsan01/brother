<?php
session_start();
include "config.php";

$username = $_POST['username'];
$password = $_POST['password'];
$role = "brother";
$supervisiorID = 0;

if($username != null && $password != null){
  $stmt = $conn->prepare("INSERT INTO member(Username,Password,Role,SupervisorID) VALUES (?,?,?,?)");
  $stmt->bind_param('sssi', $username, $password,$role, $supervisiorID);

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
      <strong>Error!</strong>Username นี้ถูกใช้งานแล้ว
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