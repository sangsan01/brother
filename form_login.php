<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <style type="text/css">
    .panel{
      background-image: url('images/clouds.jpg');
      background-size: 100% 100%;
  
    }
  </style>
</head>

<body>
    </br></br>
    
      <div class="col-md-4 col-md-offset-4">
      
		    <div class="panel panel-default">
          <center><label class="control-label" style="color: white;">Login</label></center>
          <div class="panel-body">

					   <form name="formLogin" class="form-horizontal" method="post" action="login_check.php">
                <div class="form-group">
                  <label class="col-sm-4 control-label" style="color: white";>Username:</label>
                  <div class="col-sm-8">
                    <input name="txtUsername" type="text" id="txtUsername" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label" style="color: white";>Password:</label>
                  <div class="col-sm-8">
                    <input name="txtPassword" type="password" id="txtPassword" class="form-control">
                  </div>
                </div>
                <div align="right">
                    <button type="submit" class="btn btn-default">Login</button>
                </div>
              </form>
          </div>
          </div>
		    </div>
      
      
    

</body>
</html>

<?php

?>

