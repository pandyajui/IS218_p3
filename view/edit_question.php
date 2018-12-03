<html>
	<head>
		<title>IS218_p1</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
    <script src="scripts/javascript.js"></script> 
	</head>
	<body><div class="container"><div class= "main">
		<?php
    require("../model/database_functions.php");
    require("error_reporting.php");
    
    session_start();
    if(!$_SESSION['logged_on']){
      error_redirect("You must be logged on to view this page");
      exit;
    }
    
    $q_id=$_GET['qid'];
    $email=$_SESSION['email'];
    $title = getQuestion_Title($email, $q_id);
    $body = getQuestion_Body($email, $q_id);
    $skills = getQuestion_Skills($email, $q_id);
    $score = getQuestion_Score($email, $q_id);
    
    deleteQuestion($q_id);
		?>
		<form id="form3" name="form3" action="../control/added_question.php">

			<label>Question name</label><input type="text" name="q_title" value="<?php echo $title; ?>"><br/>
			<label>QB</label><textarea form="form3" name="q_body"><?php echo $body; ?></textarea><br/>
			<label>Question Skills</label><textarea form="form3" name="q_skills"><?php echo $skills; ?></textarea><br/>
			<label>Question Score</label><input type="number" step="1" name="q_score" value="<?php echo $score; ?>"><br/>
			<input type="submit" value="Update" required/>
		</form>
		</div></div>
	</body>
</html>