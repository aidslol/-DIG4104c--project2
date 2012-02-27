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
$sql="INSERT INTO members VALUES ('$number','$name')";
mysql_query($sql); 

// go back to login page
header("location:project2.php");

ob_end_flush();
?>