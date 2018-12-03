<html>
<head>
<title>Error Redirect</title>
</head>


<body>
<?php
require("error_reporting.php");

$a=$_GET['abc'];
echo $a;

header("refresh:5; url=../control/logout.php");
?>
</body>



</html>