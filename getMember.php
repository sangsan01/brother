<?php
  session_start();
  
  include "config.php";


  $result = $conn->query("select * from member");
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
	    <th>ID</th>
	    <th>Username</th>
      <th>Password</th>
      <th>Role</th>
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
	    <td><?php echo $row['UserID']; ?></td>
	    <td><?php echo $row['Username']; ?></td>
      <td><?php echo $row['Password']; ?></td>
      <td><?php echo $row['Role']; ?></td>
	    
	    <td>
      <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['UserID']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true">แก้ไข</span></a>
      <a class="btn btn-danger btn-sm " onclick="deletedata('<?php echo $row['UserID']; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true">ลบ</span></a>

<!-- Modal -->
<form>
<div class="modal fade" id="myModal<?php echo $row['UserID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['UserID']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['UserID']; ?>">Edit Data</h4>
      </div>
      <div class="modal-body">

<!-- Edit form -->
<form>
  <div class="form-group">
    <label>Username</label><br>
    <label><?php echo $row['Username']; ?></label>
  </div>
  <div class="form-group">
    <label for="txtPassword">Password</label>
    <input type="text" class="form-control" id="txtPassword<?php echo $row['UserID']; ?>" value="<?php echo $row['Password']; ?>">
  </div>
</form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="updatedata('<?php echo $row['UserID']; ?>')" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk">บันทึก</span></button>
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