<?php
    session_start();    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Work</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/navbar-custom.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="viewdata()">
    <?php
      if(isset($_SESSION['UserID']) && $_SESSION['UserID'] != "")
    {
        if($_SESSION['Role'] == "brother"){
          include "brother_header.php";
        }
        else if($_SESSION['Role'] == "secretary"){
          include "secretary_header.php";
        }
        else{
          include "header.php";
        }

    }
    else
    {
      echo "Please login";
      header('refresh:3;url=about.php');
      exit();
    }    
    ?>
    <div class="container" style="margin-top : 50px";>

<!-- add Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-top: 70px; margin-bottom:20px;">
  เพิ่มข้อมูล
</button>
<br/>
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
    <label for="year">ปี พ.ศ.</label>
    <input type="text" class="form-control" id="year">
  </div>
  <div class="form-group">
    <label for="description">รายละเอียด</label>
    <input type="text" class="form-control" id="description">
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
        url: "getWork.php"
      }).done(function( data ) {
        $('#viewdata').html(data);
      });
    }
    
    $('#save').click(function(){
  
      var year = $('#year').val();
      var description = $('#description').val();

      var datas="year="+year+"&description="+description;
      
      $.ajax({
        type: "POST",
        url: "newWork.php",
        data: datas
      }).done(function( data ) {
        $('#info').html(data);
        $('#myModal').modal('hide');
        viewdata();
      });
    });

    function updatedata(str){
  
      var id = str;
      var year = $('#year'+str).val();
      var description = $('#description'+str).val();
  
      var datas="year="+year+"&description="+description;
      
  $.ajax({
     type: "POST",
     url: "updateWork.php?id="+id,
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
     url: "deleteWork.php?id="+id
  }).done(function( data ) {
    $('#info').html(data);
    viewdata();
  });
    }
    </script>
</html> 
