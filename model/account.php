<?php
	$hostname="sql.njit.edu";
	$username="jsp64";
	$project="jsp64";
	$password="TDXM0YdPW";
 
	$db=mysqli_connect($hostname,$username,$password,$project);
	if(mysqli_connect_errno()){
		echo("Failed to connect" . mysqli_connect_errno());
		exit;
	}
	mysqli_select_db($db,$project);
?>	
