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

// Define $myusername and $voterNum 
$myusername=$_POST['myusername']; 
$voterNum=$_POST['voterNum'];

// To protect MySQL injection
$myusername = stripslashes($myusername);
$voterNum = stripslashes($voterNum);
$myusername = mysql_real_escape_string($myusername);
$voterNum = mysql_real_escape_string($voterNum);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$voterNum'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $voterNum, table row must be 1 row

#storemember: Add this name and number to the 'members' table
function storemember($connection, $number, $name)
{
		$query="INSERT INTO members VALUES ('$number','$name')";

		$result=mysql_query($query,$connection) 
		   or print "storeperson query '$query' failed because ".mysql_error();
} /* storemember */

if($count==1){
// Register $myusername, $voterNum and redirect to file "candidates.php"
session_register("myusername");
session_register("voterNum"); 
header("location:candidates.php");
}
else {
header("location:project2.php");
}

ob_end_flush();
?>