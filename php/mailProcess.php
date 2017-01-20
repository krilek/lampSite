<?php
	session_start();
	$path = $_SERVER['DOCUMENT_ROOT']."/php/";
	require  $path."inputManip.php";
	if(isset($_POST['personalDetails']) && isset($_POST['message']) && isset($_POST['email']) && (!isset($_SESSION['messageSent']) || $_SESSION['messageSent'] != true)){
		$personalDetails = clearSpecChars($_POST['personalDetails']);
		$message = clearSpecChars($_POST['message']);
		$email = clearSpecChars($_POST['email']);
		$to = "test@lajtowetesty.cba.pl";
		$subject = "Mail ze strony!";
		$txt = $personalDetails."\n\n".$email."\n\n".$message;
		$header = "From: test@lajtowetesty.cba.pl";
		mail($to, $subject, $txt, $header);
		echo $personalDetails."\n\n".$email."\n\n".$message;
		$_SESSION['data'] = $personalDetails;
		$_SESSION['messageInfo'] = true;
		$_SESSION['messageSent'] = false;
	}
	echo " KUPA".$personalDetails.$message.$email;
	header("Location: /index.php");
?>


<!-- 
ADD SESSION DESTROY
IF EMAIL DOESN't HAS DOT DONT SEND, SHOW INFO 

EASY  -  USE FILTER JEEZ-->