<?php
  session_start();

  include "config.php";

  $work_userid = $_SESSION["UserID"];

  $result = $conn->query("select * from work where Work_UserID = $work_userid");
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
	    <th>ปี พ.ศ.</th>
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
	    <td><?php echo $row['Year']; ?></td>
	    <td><?php echo $row['Description']; ?></td>
	    
	    <td>
      <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['Work_ID']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true">แก้ไข</span></a>
      <a class="btn btn-danger btn-sm " onclick="deletedata('<?php echo $row['Work_ID']; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true">ลบ</span></a>

<!-- Modal -->
<form>
<div class="modal fade" id="myModal<?php echo $row['Work_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['Work_ID']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['Work_ID']; ?>">Edit Data</h4>
      </div>
      <div class="modal-body">

<!-- Edit form -->
<form>
  <div class="form-group">
    <label for="year">ปี พ.ศ.</label>
    <input type="text" class="form-control" id="year<?php echo $row['Work_ID']; ?>" value="<?php echo $row['Year']; ?>">
  </div>
  <div class="form-group">
    <label for="description">รายละเอียด</label>
    <input type="text" class="form-control" id="description<?php echo $row['Work_ID']; ?>" value="<?php echo $row['Description']; ?>">
  </div>
</form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="updatedata('<?php echo $row['Work_ID']; ?>')" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk">บันทึก</span></button>
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