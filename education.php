<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Education</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/navbar-custom.css">
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
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>เพิ่มข้อมูล
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูล</h4>
          </div>  
          <!-- Added form --> 
          <div class="modal-body">  
            <form>
              <div class="form-group">
                <label for="start">เริ่มต้น พ.ศ.</label>
                <input type="text" class="form-control" id="start">
              </div>
              <div class="form-group">
                <label for="end">สิ้นสุด พ.ศ.</label>
                <input type="text" class="form-control" id="end">
              </div>
              <div class="form-group">
                <label for="degree">ระดับการศึกษา</label>
                <input type="text" class="form-control" id="degree">
              </div>
              <div class="form-group">
                <label for="detail">รายละเอียด</label>
                <input type="text" class="form-control" id="detail">
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
        url: "getEducation.php"
      }).done(function( data ) {
        $('#viewdata').html(data);
      });
    }
    
    $('#save').click(function(){
  
      var start = $('#start').val();
      var end = $('#end').val();
      var degree = $('#degree').val();
      var detail = $('#detail').val();

      var datas="start="+start+"&end="+end+"&degree="+degree+"&detail="+detail;
      
      $.ajax({
        type: "POST",
        url: "newEducation.php",
        data: datas
      }).done(function( data ) {
        $('#info').html(data);
        $('#myModal').modal('hide');
        viewdata();
      });
    });

    function updatedata(str){
  
      var id = str;
      var start = $('#start'+str).val();
      var end = $('#end'+str).val();
      var degree = $('#degree'+str).val();
      var detail = $('#detail'+str).val();
  
      var datas="start="+start+"&end="+end+"&degree="+degree+"&detail="+detail;
      
  $.ajax({
     type: "POST",
     url: "updateEducation.php?id="+id,
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
     url: "deleteEducation.php?id="+id
  }).done(function( data ) {
    $('#info').html(data);
    viewdata();
  });
    }
    </script>
</html> 
