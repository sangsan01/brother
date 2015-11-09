<?php
include "config.php";
if(isset($_GET['id'])){
  $stmt = $conn->prepare("update education set Start=?, End=?, Degree=?, Detail=? where EducationID=?");
  $stmt->bind_param('ssssi', $start, $end, $degree, $detail, $edu_id);

  $start = $_POST['start'];
  $end = $_POST['end'];
  $degree = $_POST['degree'];
  $detail = $_POST['detail'];
  $edu_id = $_GET['id'];

  if($stmt->execute()){
?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>แก้ไขข้อมูลสำเร็จ</strong>
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
<div class="aler
t alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> Maaf anda salah alamat.
</div>
<?php
}
?>