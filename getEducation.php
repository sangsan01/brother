<?php
  session_start();
  
  include "config.php";

  $edu_userid = $_SESSION["UserID"];

  $result = $conn->query("select * from education where Edu_UserID = $edu_userid");
  $i = 1;
  if (!$result) {
        die($mysqli->error);
    }
?>
<div class="table-responsive">
<table class="table table-bordered table-hover">
	<thead>
	  <tr>
	    <th>ลำดับที่</th>
	    <th>เริ่ม พ.ศ.</th>
	    <th>สิ้นสุด พ.ศ.</th>
      <th>ระดับการศึกษา</th>
	    <th>รายละเอียด</th>
      <th>action</th>
	  </tr>
	</thead>
	<tbody>

<?php 
while ($row = $result->fetch_assoc()) {
?>
    
	  <tr>
	    <td><?php echo $i; ?></td>
      <?php $i++; ?>
	    <td><?php echo $row['Start']; ?></td>
	    <td><?php echo $row['End']; ?></td>
      <td><?php echo $row['Degree']; ?></td>
	    <td><?php echo $row['Detail']; ?></td>
	    
	    <td>
      <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['EducationID']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true">แก้ไข</span></a>
      <a class="btn btn-danger btn-sm " onclick="deletedata('<?php echo $row['EducationID']; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true">ลบ</span></a>

<!-- Modal -->
<form>
<div class="modal fade" id="myModal<?php echo $row['EducationID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['EducationID']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['EducationID']; ?>">Edit Data</h4>
      </div>
      <div class="modal-body">

<!-- Edit form -->
<form>
  <div class="form-group">
    <label for="start">เริ่ม พ.ศ.</label>
    <input type="text" class="form-control" id="start<?php echo $row['EducationID']; ?>" value="<?php echo $row['Start']; ?>">
  </div>
  <div class="form-group">
    <label for="end">สิ้นสุด พ.ศ.</label>
    <input type="text" class="form-control" id="end<?php echo $row['EducationID']; ?>" value="<?php echo $row['End']; ?>">
  </div>
  <div class="form-group">
    <label for="education">ระดับการศึกษา</label>
    <input type="text" class="form-control" id="degree<?php echo $row['EducationID']; ?>" value="<?php echo $row['Degree']; ?>">
  </div>
  <div class="form-group">
    <label for="detail">รายละเอียด</label>
    <input type="text" class="form-control" id="detail<?php echo $row['EducationID']; ?>" value="<?php echo $row['Detail']; ?>">
  </div>
</form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="updatedata('<?php echo $row['EducationID']; ?>')" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk">บันทึก</span></button>
      </div>
    </div>
  </div>
</div>
</form>
	    
	    </td>
	  </tr>
<?php
}
?>
	</tbody>
      </table>
</div>