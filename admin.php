<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Experience</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/navbar-custom.css">
  </head>

  <body onload="viewdata()">
    <div class="container" style="margin-top : 50px";>
      

    <!-- add Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-top: 70px; margin-bottom:20px;">
      เพิ่มข้อมูล
    </button>
    <a class="btn btn-danger" href="logout.php" role="button" style="margin-top: 70px; margin-bottom:20px; margin-right:100px;">Logout</a>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูล</h4>
      </div>
      <div class="modal-body">

<!-- Added form -->       
<form>
  <div class="form-group">
    <label for="txtUsername">Username</label>
    <input type="text" class="form-control" id="txtUsername">
  </div>
  <div class="form-group">
    <label for="txtPassword">Password</label>
    <input type="text" class="form-control" id="txtPassword">
  </div>
</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" id="save" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk">บันทึก</span></button>
      </div>
    </div>
  </div>
</div>


</div>
<div class="container">    
  <div id="info"></div>
  <div id="viewdata"></div>
</div>
  </body>

  <script type="text/javascript">

    function viewdata(){
      $.ajax({
        type: "GET",
        url: "getMember.php"
      }).done(function( data ) {
        $('#viewdata').html(data);
      });
    }
    
    $('#save').click(function(){
  
      var username = $('#txtUsername').val();
      var password = $('#txtPassword').val();

      var datas="username="+username+"&password="+password;
      
      $.ajax({
        type: "POST",
        url: "newMember.php",
        data: datas
      }).done(function( data ) {
        $('#info').html(data);
        $('#myModal').modal('hide');
        viewdata();
      });
    });

    function updatedata(str){
  
      var id = str;
      var password = $('#txtPassword'+str).val();

  
      var datas="password="+password;
      
  $.ajax({
     type: "POST",
     url: "updateSecretary.php?id="+id,
     data: datas
  }).done(function( data ) {
    $('#info').html(data);
    $("html,body").css("overflow","auto");
    viewdata();
  });
    }
    function deletedata(str){
  
  var id = str;
      
  $.ajax({
     type: "GET",
     url: "deleteSecretary.php?id="+id
  }).done(function( data ) {
    $('#info').html(data);
    viewdata();
  });
    }
    </script>

</html> 