<?php
	// echo "123";
// $to = $_POST['txtTo'];
	$to = $_POST['receiver'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$headers  = "From :".$_POST['sender'];		//from

// $txtTo
// $subject = "My subject";
// $message = "Hello world!";
// $headers = "From: f_friday@hotmail.com" . "\r\n" ."CC: somebodyelse@example.com";


mail($to,$subject,$message,$headers);
// header('Location: index.php');
?>

