<html>
	<head>
		<title>IS218_p1</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
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
    

		?>
		<form id="form3" name="form3" action="../control/added_question.php">

			<label>Question name</label><input type="text" name="q_title"><br/>
			<label>QB</label><textarea form="form3" name="q_body"></textarea><br/>
			<label>Question Skills</label><textarea form="form3" name="q_skills"></textarea><br/>
			<label>Question Score</label><input type="number" step="1" name="q_score"><br/>
			<input type="submit" value="Add" required/>
		</form>
		</div></div>
	</body>
</html>
