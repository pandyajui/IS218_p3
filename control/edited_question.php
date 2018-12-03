<?php
	require("../view/error_reporting.php");
	require("../model/database_functions.php");

  session_start();
  if(!$_SESSION['logged_on']){
    error_redirect("You must be logged on to view this page");
    exit;
  }
  $email = $_SESSION['email'];
  
	$flag_empty=false;
	$flag_isset=true;
	$q_title= GET("q_title",$flag_empty,$flag_isset);
	if($flag_isset==false||$flag_empty==true){
		echo("Question title was not entered<br/>");
		exit;
	}
	$q_body=GET("q_body",$flag_empty,$flag_isset);
	if($flag_isset==false||$flag_empty==true){
		echo("Question was not entered<br/>");
		exit;
	}
	$q_skills=GET("q_skills",$flag_empty,$flag_isset);
	if($flag_isset==false||$flag_empty==true){
		//do smth
		echo("Question skills not entered<br/>");
		exit;
	}
	$q_score=GET("q_score",$flag_empty,$flag_isset);
	if($flag_isset==false||$flag_empty==true){
		//do smth
		echo("Question score was not entered<br/>");
		exit;
	}

	insertIntoQuestions($email,$q_title, $q_body, $q_skills, $q_score);
  header("Location: ../view/display_questions.php");
?>