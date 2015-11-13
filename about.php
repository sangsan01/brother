<?php
    session_start();
    include 'config.php';

    $query = "SELECT * FROM file f,member m WHERE f.File_UserID = m.UserID and m.role = 'brother'";
    $result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Montfort Brothers of St. Gabriel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/navbar-custom.css">

    <style type="text/css">
        .thumbnail a>img{
            width: 250px;
            height: 250px; 
        }   /*picture profile*/

        footer{
            background-color: #0088cc;
            color: white;
            height: 30px;
        }
    </style>

    

</head>

<body>

    <?php
        if(isset($_SESSION['UserID']) && $_SESSION['UserID'] != "")
        {
            if($_SESSION['Role'] == "brother"){
                include "brother_header.php";
            }
            else if ($_SESSION['Role'] == "secretary") {
                include "secretary_header.php";
            }  

        }
        else
        {
            include "header.php";
        }
    ?>

    <div class="container">
        <div class="row" style="margin-top:70px;">
            <div class="col-lg-12">
                <div>
                <h1 class="page-header">คณะภราดาเซนต์คาเบรียล
                    <!-- <small>Subheading</small> -->
                </h1>
                </div>
                    
                
<!--                 <ol class="breadcrumb">
                    <li><a href="about.php">Home</a>
                    </li>
                    <li class="active">About</li>
                </ol> -->
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="images/Montfort.Brothers.Of_.St_.Gabriels.jpg" alt="">
            </div>
            <div class="col-md-6">
                <h2>ประวัติ คณะภราดาเซนต์คาเบรียล</h2>
                <p>คณะภราดาเซนต์คาเบรียล เป็นคณะนักบวชคาทอลิกคณะหนึ่งซึ่งขึ้นตรงต่อพระสันตะปาปา นักบุญหลุยส์ มารี กรีญอง เดอ มงฟอร์ตเป็นผู้ก่อตั้งคณะ และบาทหลวงกาเบรียล เดแอ เป็นผู้ฟื้นฟูคณะ

นักบวชในคณะปฏิญาณตนต่อพระเจ้าเพื่อถือ ความยากจน ความบริสุทธิ์ และความนบนอบ ทำงานรับใช้พระเจ้าแต่เพียงผู้เดียว ด้วยการอุทิศตน เสียสละ รับใช้ผู้อื่นดังพี่น้อง โดยมุ่งที่จะให้บริการศึกษาอบรมที่เป็นความรู้ทางโลกและทางธรรมแก่สังคม

คณะภราดาเซนต์คาเบรียลมีศูนย์กลางอยู่ที่กรุงโรม ประเทศอิตาลี สมาชิกประกอบด้วยภราดาที่ทำงานรับใช้พระเป็นเจ้าผ่านทางการให้การศึกษาแก่เยาวชน และเอาใจใส่เป็นพิเศษต่อคนยากจน ตามจิตตารมณ์ของนักบุญมงฟอร์ต ปัจจุบัน ภราดา John Kallarackal เป็นอัคราธิการ และภราดาสุรสิทธิ์ สุขชัย เป็นอธิการเจ้าคณะแขวงประเทศไทย</p>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p> -->
            </div>
        </div>
        <!-- /.row -->

        <!-- Team Members -->

       
        
        <div class="row">
            <div class="col-lg-12">
                <div class="form-inline" align="right">
                    <div class="form-group" style="margin-bottom:15px;">
                        <input type="text" class="form-control" placeholder="ค้นหาภราดา" id="txtSearch" style="width:   200px;" align="right">
                        <button type="button" class="btn btn-default" id="btnSearch"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                    </div>
                </div>
            </div>
            
            <div id="brother">
            <?php while($row = $result->fetch_array()){ ?>
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <a href="profile.php?UserID=<?php echo $row["UserID"];?>"><img class="img-responsive" src="images/<?php echo $row['FileName'];?>" alt=""></a>
                    <div class="caption">
                        <h3><?php echo $row["Firstname"]." ".$row["Lastname"]; ?><br>
                            <h4><?php echo $row["Position"]; ?><h4></h4>
                        </h3>
                        <p>โรงเรียน : <?php echo $row["School"]; ?></p>
                        <p>เบอร์โทรศัพท์ : <?php echo $row["Mobilephone"]; ?></p>
                        <p>Line : <?php echo $row["Line"]; ?></p>
                        <p>Facebook : <?php echo $row["Facebook"]; ?></p>
                        <p>Email : <?php echo $row["Email"] ?></p>


                        <ul class="list-inline">
                            <!-- <a href="form_email.php?UserID=<?php echo $row["UserID"];?>">
                            <button type="button" class="btn btn-default btn-lg">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email
                            </button>
                            </a> -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEmail<?php echo $row['UserID']; ?>" data-whatever="@mdo">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Send Email
                            </button>
                            <div class="modal fade" id="ModalEmail<?php echo $row['UserID']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalEmailLabel<?php echo $row['UserID']; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="ModalEmailLabel<?php echo $row['UserID']; ?>">Email</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form>

                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">ถึง</label>
                                            <label for="message-text" class="control-label" id="lbReceiver<?php echo $row['UserID']; ?>"><?php echo $row['Email']; ?></label>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">ชื่อเรื่อง</label>
                                            <input class="form-control" type="input" id="txtSubject<?php echo $row['UserID']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">ข้อความ</label>
                                            <textarea class="form-control" rows="5" id="txtMessage<?php echo $row['UserID']; ?>"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">จาก</label>
                                            <input class="form-control" type="input" id="txtSender<?php echo $row['UserID']; ?>">
                                        </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="sendEmail(<?php echo $row['UserID']; ?>)">Send</button>
                                    </div>
                                    </div>
                                </div>
                                </div>  
                            <!-- <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <?php } ?>
            
            </div>
        </div>
        <!-- /.row -->

        <!-- Our Customers -->
        <!-- <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Our Customers</h2>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
            </div>
        </div> -->
        <!-- /.row -->


    </div>
    <!-- div container  -->
    <footer>
            <div class="container-fluid">
                <div class="cotainer">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Montfort College Primary Section</p>
                    </div>
                </div>
            </div>
    </footer>
    <!-- Footer -->
    

<script type="text/javascript">

$("#btnSearch").click(function (){
    var search = $("#txtSearch").val();

    $.ajax({
    type: "POST",
    url: "getBrother.php",
    data:"keyword="+search,
    success: function(data){
        $("#brother").html(data);
    },
    error: function(data){
        alert("ไม่พบข้อมูล");
    }

    });
});

$("#txtSearch").keyup(function(event){
    if(event.keyCode == 13){
        $("#btnSearch").click();
    }
});

function sendEmail(str){
  
      var id = str;
      var receiver = $('#lbReceiver'+str).text();
      var subject = $('#txtSubject'+str).val();
      var message = $('#txtMessage'+str).val();
      var sender = $('#txtSender'+str).val();
  
      var datas="receiver="+receiver+"&subject="+subject+"&message="+message+"&sender="+sender;
      
    $.ajax({
        type: "POST",
        url: "sendEmail.php?id="+id,
        data:datas,
        success: function(data){
            alert("Send email successfully");
            $('#ModalEmail'+id).modal('hide');
        },
        error: function(data){
            alert("Fail to sending");
        }
    });

}

</script>
</body>

</html>