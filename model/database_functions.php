<?php
  require("account.php");
  
  function authenticate($ucid,$password)
	{
		global $db;
		$s = "select * from accounts where email='$ucid' and password='$password'";
		($t=mysqli_query($db, $s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) ==1){
			return (true);
		}
		return (false);
	}

	function displayUser($email)
	{
		global $db;
		$s = "select * from accounts where email='$email'";
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) ==  0){
			$output = "User not found! Hacker!<br/>";
			return ($output);
		}
		$user = mysqli_fetch_assoc($t);
		$first_name = $user['fname'];
		$last_name = $user['lname'];
		$output = "$first_name $last_name";
		return ($output);
	}

	function displayQ($ucid){
		global $db;
		$output = "";
		$s="select * from questions where owneremail='$ucid'";
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) ==  0){
			$output .= "Questions not found! <br/>";
			return ($output);
		}
		$output .= "<table class='DisplayQuestions'>";
		$output .= "<tr><th>Created Date</th><th>Question Title</th><th>Question Body</th><th>Question Skills</th><th>Question Score</th><th></th><th></th></tr>";

		while($questions=mysqli_fetch_assoc($t)){
      $q_id=$questions['id'];
      $email=$questions['owneremail'];
			$date=$questions['createddate'];
			$question_title=$questions['title'];
			$question_body=$questions['body'];
			$question_skills=$questions['skills'];
			$question_score=$questions['score'];

			$output .= "<tr><td>$date</td><td>$question_title</td><td>$question_body</td><td>$question_skills</td><td>$question_score</td>";
      $output .= "<td><input type='button' value='Edit Question' onclick=edit_question($q_id)></td>";
      $output .= "<td><input type='button' value='Delete Question' onclick=delete_question($q_id)></td></tr>";
		}
		$output .= "</table>";
		return ($output);
	}
 
  function getQuestion_Title($ucid, $question_id){
		global $db;
		$s="select * from questions where owneremail='$ucid' and id='$question_id'";
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) ==  0){
			error_redirect("Questions not found!");
      exit;
		}
    
    $question = mysqli_fetch_assoc($t);
    
    $question_title = $question['title'];
    return($question_title);  
  }
  
  function getQuestion_Body($ucid, $question_id){
		global $db;
		$s="select * from questions where owneremail='$ucid' and id='$question_id'";
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) ==  0){
			error_redirect("Questions not found!");
      exit;
		}
    
    $question = mysqli_fetch_assoc($t);
    
    $question_body = $question['body'];
    return($question_body);  
  }
  
  function getQuestion_Skills($ucid, $question_id){
		global $db;
		$s="select * from questions where owneremail='$ucid' and id='$question_id'";
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) ==  0){
			error_redirect("Questions not found!");
      exit;
		}
    
    $question = mysqli_fetch_assoc($t);
    
    $question_skills = $question['skills'];
    return($question_skills);  
  }
  
  function getQuestion_Score($ucid, $question_id){
		global $db;
		$s="select * from questions where owneremail='$ucid' and id='$question_id'";
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) ==  0){
			error_redirect("Questions not found!");
      exit;
		}
    
    $question = mysqli_fetch_assoc($t);
    
    $question_score = $question['score'];
    return($question_score);  
  }

  function deleteQuestion($question_id){
		global $db;
		$s="delete from questions where id='$question_id'";
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
    return;
  }

	function ucidExists($a){
		global $db;
		$s = "select * from accounts where email='$a'";
		($t=mysqli_query($db, $s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) ==1){
			return (true);
		}
		return (false);
	}

  function error_redirect($a){
    header("Location: ../view/error_redirect.php?abc=$a");
  
  }
 
	function insertIntoAccounts($email,$fn,$ln,$bday,$pwd){
		global $db;
		$s="insert into accounts (email, fname, lname, birthday, password) values ('$email','$fn','$ln','$bday','$pwd')";
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
		return;
	}

	function insertIntoQuestions($ucid,$question_title, $question_body, $quesiton_skills, $question_score){
		global $db;
		$owner_id="select * from accounts where email='$ucid'";
		($p=mysqli_query($db,$owner_id)) or die(mysqli_error($db));
		if (mysqli_num_rows($p) !=  1){
			$output = FALSE;
			return ($output);
		}
		$user = mysqli_fetch_assoc($p);
		$ownerid=$user['id'];
		$s="insert into questions (owneremail, ownerid, createddate, title, body, skills, score) values ('$ucid', '$ownerid', NOW(), '$question_title', '$question_body', '$quesiton_skills', '$question_score')";
		//echo($s);
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
		return(TRUE);
	}
?>