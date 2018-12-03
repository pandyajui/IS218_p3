<?php
		require("../view/error_reporting.php");
		require("../model/database_functions.php");

		$flag_empty=false;
		$flag_isset=true;


		$firstname= GET("firstname",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("First name was not entered<br/>");
			exit;
		}$lastname= GET("lastname",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("Last name was not entered<br/>");
			exit;
		}
		$birthday= GET("birthday",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("Birthday was not entered<br/>");
			exit;
		}

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

    if(ucidExists($email)){
      error_redirect("Email id already in use");
      exit;
    }
    
    insertIntoAccounts($email,$firstname,$lastname,$birthday,$pwd);
    
    session_start();
		$_SESSION['email'] =  $email;
    $_SESSION['logged_on'] = true;
    
    header("Location: ../view/display_questions.php");
?>