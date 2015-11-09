<?php
    session_start();
    
    include 'config.php';

    $query = "SELECT * FROM member WHERE Username = '".mysqli_real_escape_string($conn,$_POST['txtUsername'])."' 
    and Password = '".mysqli_real_escape_string($conn,$_POST['txtPassword'])."'";
    $result = $conn->query($query);
    $row = $result->fetch_array();

    $conn->close();

    
    if(!$row)
    {
        echo "Username and password incorrect";
        header('refresh: 3; url=about.php');
             
    }
    else
    {           
        echo "Login successful";
        $_SESSION["Username"] = $row["Username"]; 
        $_SESSION["Role"] = $row["Role"];
        
        if($_SESSION["Role"]=='secretary'){
            $_SESSION["UserID"] = $row["SupervisorID"];         //เก็บ ID ของ brother
            $_SESSION["SecretaryID"] =$row["UserID"];           //เก็บ ID ของ secretary
            header('refresh: 3; url=about.php');
        }

        else if($_SESSION["Role"]=='brother'){
            $_SESSION["UserID"] = $row["UserID"];               //เก็บ ID ของ brother
            header('refresh: 3; url=about.php');
        }
        else if($_SESSION["Role"]=='admin'){
            header('refresh: 3; url=admin.php');
        }
        else{
            header('refresh: 3; url=about.php');
        }
            
        session_write_close();

        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <p>You will be redirected in <span id="counter">3</span> second(s).</p>
</body>

    <script type="text/javascript">
    function countdown() {
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML)<=0) {
            location.href = 'login.php';
        }
        i.innerHTML = parseInt(i.innerHTML)-1;
    }
    setInterval(function(){ countdown(); },1000);
    </script>
    
</html>

