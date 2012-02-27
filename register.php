<?php
ob_start();
$host="localhost"; // Host name 
$username="ph652925"; // Mysql username 
$password="carter"; // Mysql password 
$db_name="ph652925"; // Database name 
$tbl_name="members"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// define number and name
$number=$_POST['number'];
$name=$_POST['name'];

// SQL injection protection
$number = stripslashes($number);
$name = stripslashes($name);
$number = mysql_real_escape_string($number);
$name = mysql_real_escape_string($name);

// inserts data provided in register form to database
$sql="INSERT INTO $tbl_name (username, password) VALUES ('$name','$number')";
$result = mysql_query($sql); 

// go back to login page
//header("location:project2.php");

ob_end_flush();

?>
<!-- mark-up provides a link back to the main page 
	after creating a user account.  -->
	
<!DOCTYPE html>
<html>
	<head>
		<title>Project 2: Register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="css/vote_theme.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile.structure-1.0.1.min.css" />
		<link rel="stylesheet" href="css/text.css" />
		<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div class="ui-header ui-bar-a" role="banner" data-role="header" data-form="ui-bar-a" data-theme="a" data-swatch="a">
				<h2 class="head" aria-level="1" role="heading" tabindex="0">Toontown 2012 Elections</h2>
			</div>
			<a href="project2.php">Click to Login</a>
		</div>
	</body>
</html>