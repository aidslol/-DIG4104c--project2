<? /*
session_start();
if($_SESSION['myusername'] != "admin"){
header("location:main_login.php");
} */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Project 2 Admin Panel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="css/vote_theme.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile.structure-1.0.1.min.css" />
		<link rel="stylesheet" href="css/text.css" />
		<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
	</head>
</head>
<body>
<div data-role="page" data-theme="a">
	<div class="ui-header ui-bar-a" role="banner" data-role="header" data-form="ui-bar-a" data-theme="a" data-swatch="a">
		<h2 class="head" aria-level="1" role="heading" tabindex="0">Toontown 2012 Elections</h2>
	</div>
	<div class="center">
	<form data-ajax='false' method='post'>
<?php
$connection=mysql_connect("localhost","ph652925","carter")
or print "connect failed because ".mysql_error();  
					
mysql_select_db("ph652925",$connection)
or print "select failed because ".mysql_error();

$query="SELECT * FROM members";
$result=mysql_query($query);
echo "<table><tr><th>ID</th><th>Name</th><th>Voted?</th><th>Reset?</th></tr>";
while($row = mysql_fetch_array($result)){
	echo "<tr><td>".$row[id]."</td><td>".$row[username]."</td><td>";
	if ($row[voted]=="1")
		$voted="Yes";
	else 
		$voted="No";
	echo $voted."</td><td><input name='action' type='submit' value='".$row[id]."' /></td></tr>";
}
echo "</table></div>";

function resetvote($action)
{
	$query="UPDATE members SET voted='0' WHERE id = ".$action;
	$result=mysql_query($query);
	$query="UPDATE members SET candidate='' WHERE id = ".$action;
	$result=mysql_query($query);
}

function erasehistory($connection)
{
	$query="TRUNCATE TABLE results";
	$result=mysql_query($query,$connection) 
	   or print "Erasehistory query '$query' failed because ".mysql_error();
	$query1="UPDATE members SET voted='0' WHERE id BETWEEN 1001 AND 1049";
	$result1=mysql_query($query1);
	$query2="UPDATE members SET candidate='' WHERE id BETWEEN 1001 AND 1049";
	$result2=mysql_query($query2);
}
echo "<div class='center'>Pressing this button will dump the entire results table, and will reset each voter's 'voted' status and candidate chosen. This action cannot be undone, and will occur immediately. Use with care.</div>";
echo "<div class='center'><input name='action' type='submit' value='Clear Results' />";

$action=$_POST['action'];

if ($action=='Clear Results')
{
	erasehistory($connection);
	print "History cleared";
} else 
	resetvote($action);
?>
	</form>
	</div>
</div>
</body>
</html>