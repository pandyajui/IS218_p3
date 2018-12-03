<?php

	require("../view/error_reporting.php");
	require("../model/database_functions.php");
	require("../model/account.php");
 
	$db=mysqli_connect($hostname,$username,$password,$project);
	if(mysqli_connect_errno()){
		echo("Failed to connect" . mysqli_connect_errno());
		exit;
	}
	mysqli_select_db($db,$project);
	$flag_empty=false;
	$flag_isset=true;
	$email= GET("email",$flag_empty,$flag_isset);
	if($flag_isset==false||$flag_empty==true){
		echo("Email was not entered<br/>");
		exit;
	}
	$pwd=GET("pwd",$flag_empty,$flag_isset);
	if($flag_isset==false||$flag_empty==true){
		echo("Password was not entered<br/>");
		exit;
	}
	/*if (strlen($pwd)< 8)
	{
		echo ("The password must contain at least 8 characters!");
		echo (" <a href='form1.html'> return to previous page.</a>");
		exit;
	}*/
	if (!authenticate($email,$pwd)/*||!filter_var($email,FILTER_VALIDATE_EMAIL)*/){
    error_redirect("Authentication failure or email does not contain @");
		exit();
	}
  session_start();
	$_SESSION['email'] =  $email;
  $_SESSION['logged_on'] = true;
	//now we will display the questions for the corresponding ucid
	echo(displayQ($email));
	echo(displayUser($email));
  header("Location: ../view/display_questions.php");
?>