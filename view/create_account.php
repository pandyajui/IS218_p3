<html>
	<head>
		<title>IS218_p1</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body><div class="container"><div class= "main">
		<form action="../control/created_account.php">
			<label>First Name</label><input type="text"name="firstname"/><br/>
			<label>Last Name</label><input type="text"name="lastname" /><br/>
			<label>Birthday YYYY-MM-DD</label><input type="text" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" name="birthday" /><br/>
			<label>Email</label><input type="text"name="email" /><br/>
			<label>Password</label><input type="password" id="pwd" name="pwd" /><br>
			<input type="submit" value="Submit" />
		</form>	
		</div></div>
	</body>
</html>