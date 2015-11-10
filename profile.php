<!DOCTYPE html>

<?php
    session_start();
    
    include 'config.php';
    if(isset($_SESSION['UserID'])){
        if($_SESSION['Role'] == "brother"){
            include "brother_header.php";
        }
        else{
            include "secretary_header.php";
        }
    }
    else{
       include "header.php";
    }
    
    $queryProfile = "SELECT * FROM member m,file f WHERE m.UserID = f.File_UserID and m.UserID = '".$_GET['UserID']."'";
    $resultProfile = $conn->query($queryProfile);

    $queryEducation = "SELECT * FROM member m,education ed WHERE m.UserID = ed.Edu_UserID and m.UserID = '".$_GET['UserID']."'";
    $resultEducation = $conn->query($queryEducation);
    
    $queryExperience = "SELECT * FROM member m,experience e WHERE m.UserID = e.Exp_UserID and m.UserID = '".$_GET['UserID']."'";
    $resultExperience = $conn->query($queryExperience);

    $queryWork = "SELECT * FROM member m,work w WHERE m.UserID = w.Work_UserID and m.UserID = '".$_GET['UserID']."'";
    $resultWork = $conn->query($queryWork);


?>

<html lang="en">
<head>    

	<meta charset="UTF-8">
	<title>Profile</title>
  
</head>
<body>
	
	<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled and minified JavaScript -->
	<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/navbar-custom.css">
<div style="text-align: center;">
<div class="container">
    <!-- <div class="row"> -->
        <h2 style="margin-top:100px;"></h2>
            <!-- <div class="row"> -->
                <div class="col-md-12">
                    <div class="col-md-4">
                    <!-- <div class="box">
                        <div class="box-content"> -->
                          <?php while($row = $resultProfile->fetch_array()){ ?>
                          <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h2 class="tag-title">ประวัติส่วนตัว</h2>
                            </div>
                            <div class="panel-body text-center">
                                <p><center><img src="images/<?php echo $row['FileName']; ?>" class="img-rounded img-responsive" align="middle"></center></p>
                                <p>ชื่อ :<?php echo $row['Firstname'].' '.$row['Lastname']; ?></p>
                                <p>ตำแหน่ง :<?php echo $row['Position']; ?></p>
                                <p>โรงเรียน :<?php echo $row['School']; ?></p>
                                <p>ที่อยู่ :<?php echo $row['Address']; ?></p>
                                <p>เบอร์โทรศัพท์ :<?php echo $row['Mobilephone']; ?></p>
                                <p>Email :<?php echo $row['Email']; ?></p>
                                <p>Line :<?php echo $row['Line']; ?></p>
                                <p>Facebook :<?php echo $row['Facebook']; ?></p>
                            </div>
                            <!-- <a href="ppc.html" class="btn btn-block btn-primary">Learn more</a> -->
                          <?php } ?>
                          </div>
                        <!-- </div>
                    </div> -->
                </div>
                <div class="col-md-8"> 
                <div class="col-md-12">
                    <!-- <div class="box">
                        <div class="box-content"> -->
                            <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="tag-title">ประวัติการศึกษา</h2>
                            </div>
                            
                            <div class="panel-body">
                          <?php while($row = $resultEducation->fetch_array()){ ?>
                            <p>พ.ศ.<?php echo $row['Start']; ?> - พ.ศ.<?php echo $row['End'];?> <?php echo $row['Degree']; ?> <?php echo $row['Detail']; ?></p>
                          <?php } ?>
                          </div>
                      </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 class="tag-title">ประวัติการทำงาน</h2>
                        </div>
                        <div class="panel-body">
                        
                          <?php while($row = $resultExperience->fetch_array()){ ?>
                            
                        
                            <p>พ.ศ. <?php echo $row['Start']; ?>-<?php echo $row['End']; ?> <?php echo $row['Detail']; ?></p>
                            <p></p>
                            <p></p>
                            
                            <!-- <a href="ppc.html" class="btn btn-block btn-primary">Learn more</a> -->
                          <?php } ?>
                        </div>
                    </div>
                <!--         </div>
                    </div> -->
                </div>
                <div class="col-md-12">
                    <!-- <div class="box">
                        <div class="box-content"> -->
                            <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="tag-title">ผลงานแห่งความภาคภูมิใจ</h2>
                            </div>
                            
                            <div class="panel-body">
                          <?php while($row = $resultWork->fetch_array()){ ?>
                            <p>พ.ศ.<?php echo $row['Year']; ?> <?php echo $row['Description']; ?></p>
                            <!-- <a href="ppc.html" class="btn btn-block btn-primary">Learn more</a> -->
                          <?php } ?>
                          </div>
                      </div>
                </div>  
                </div>
                
                
                         
    <!-- </div> -->
</div>
</div>
</div>

</body>
</html>



