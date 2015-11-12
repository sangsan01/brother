    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background-color: #0088cc;
            color: white;">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="about.php"><img src="images/LogoMontfort_small.png" style="margin-top : -17px;"></a>
                <a class="navbar-brand" href="about.php">The Montfort Brothers of St. Gabriel</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ข้อมูลส่วนตัว<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="education.php">ประวัติการศึกษา</a>
                            </li>
                            <li>
                                <a href="experience.php">ประวัติการทำงาน</a>
                            </li>
                            <li>
                                <a href="work.php">ผลงาน</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">เลขานุการ<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="newSecretary.php">ให้สิทธิเลขานุการ</a>
                            </li>
                            <!-- <li>
                                <a href="editSecretary.php">แก้ไขข้อมูลเลขานุการ</a>
                            </li> -->
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ยินดีต้อนรับ <?php echo $_SESSION["Username"]; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                                <li>
                                <a href="edit_profile.php">แก้ไขประวัติส่วนตัว</a>
                            </li>
                            <li>
                                <a href="logout.php">ออกจากระบบ</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

