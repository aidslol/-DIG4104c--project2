<? 
session_start();
if($_SESSION['username'] != "admin"){
header("location:main_login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Project 2 Admin Panel</title>
	<style type="text/css">
		@import url('css/reset.css');
		@import url('css/960.css');
		@import url('css/text.css');
	</style>
</head>
<body>

<?php
$connection=mysql_connect("localhost","ph652925","carter")
or print "connect failed because ".mysql_error();  
					
mysql_select_db("ph652925",$connection)
or print "select failed because ".mysql_error();

function erasehistory($connection)
{
	$query="TRUNCATE TABLE results";
	$result=mysql_query($query,$connection) 
	   or print "Erasehistory query '$query' failed because ".mysql_error();
	$query="UPDATE members SET voted='0' WHERE id BETWEEN 1001 AND 1049";
}

print "<div><input name='action' type='submit' value='Clear History' /></div>";

if ($action=='Clear History')
{
	erasehistory($connection);
	print "History cleared";
}
?>

</body>
</html>