<?php
include "config.php";
if(isset($_GET['id'])){
  $stmt = $conn->prepare("UPDATE member SET Password=? where UserID=?");
  $stmt->bind_param('si', $password, $userid);

  $password = $_POST['password']; 
  $userid = $_GET['id'];

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