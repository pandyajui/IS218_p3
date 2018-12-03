<?php
	require("../view/error_reporting.php");
	require("../model/database_functions.php");
  
  session_start();
  if(!$_SESSION['logged_on']){
    error_redirect("You must be logged on to view this page");
    exit;
  }
  
  $q_id=$_GET['qid'];
  deleteQuestion($q_id);
  
  header("Location: ../view/display_questions.php");
?>