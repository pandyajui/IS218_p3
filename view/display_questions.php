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
    
    $email = $_SESSION['email'];
    echo(displayQ($email));
    echo(displayUser($email));
    
    ?>  
	</div></div>
 
  <input type="button" onclick="location.href='add_question.php';" value="Add a Question" />
  <input type="button" onclick="location.href='../control/logout.php';" value="Logout" />
	</body>
</html>