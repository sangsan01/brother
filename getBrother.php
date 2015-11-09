<?php
    include 'config.php';

    $spacekeyword = $_POST['keyword'];
    $keyword = ereg_replace('[[:space:]]+', '', trim($spacekeyword));

    
    $query = "SELECT * FROM file f,member m WHERE f.File_UserID = m.UserID and m.role = 'brother' and 
    ((CONCAT(Firstname,Lastname) Like '%$keyword%') or m.Firstname Like'%$keyword%' or m.Lastname Like'%$keyword%' or m.School Like'%$keyword%' or m.Position Like'%$keyword%' or m.Mobilephone Like'%$keyword%' or 
     m.Address Like'%$keyword%' or m.Email Like '%$keyword%' or m.Line Like '%$keyword%' or m.Line Like '%$keyword%' or m.Facebook Like '%$keyword%')";
    
    $result = $conn->query($query);

    
?>        
    <!-- Team Members -->
<?php
    if(($result->num_rows)>0){ 
        while($row = $result->fetch_assoc()){     
?>
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <a href="profile.php?UserID=<?php echo $row["UserID"];?>"><img class="img-responsive" src="images/<?php echo $row['FileName'];?>" alt=""></a>
                    <div class="caption">
                        <h3><?php echo $row["Firstname"]." ".$row["Lastname"]; ?><br>
                            <h4><?php echo $row["Position"]; ?></h4>
                        </h3>
                        <p>โรงเรียน : <?php echo $row["School"]; ?></p>
                        <p>เบอร์โทรศัพท์ : <?php echo $row["Mobilephone"]; ?></p>
                        <p>Email : <?php echo $row["Email"]; ?></p>
                        <p>Line : <?php echo $row["Line"]; ?></p>
                        <p>Facebook : <?php echo $row["Facebook"]; ?></p>


                        <ul class="list-inline">
                            <!-- <a href="form_email.php?UserID=<?php echo $row["UserID"];?>">
                            <button type="button" class="btn btn-default btn-lg">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email
                            </button>
                            </a> -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEmail<?php echo $row['UserID']; ?>" data-whatever="@mdo">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email
                            </button>
                            <div class="modal fade" id="ModalEmail<?php echo $row['UserID']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalEmailLabel<?php echo $row['UserID']; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="ModalEmailLabel<?php echo $row['UserID']; ?>">Send email</h4>
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
                                        <button type="button" class="btn btn-primary" onclick="sendEmail(<?php echo $row['UserID']; ?>)">Send message</button>
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

<?php
        }
    } 

else{
    echo "ไม่พบผลลัพธ์ที่ค้นหา";
    }  
     
?>


        
        