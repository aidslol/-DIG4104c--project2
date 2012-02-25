<!DOCTYPE html> 
<html>
	<head>
		<title>Project 2: Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
		<link rel="stylesheet" href="css/text.css" />
		<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
	</head>
	<body>
		<form method='post'>
			<?php
			// Checknames: Project 2 Starter Kit: DIG 4104c - Spring 12
			// Moshell
			// This version (project2.starter.php) demonstrates how to use a database
			// to maintain two tables: one for counting visits, and one for checking names.

			$Testnumber=4;
			$onmac=0; // set this to 0 if running on Sulley

			function logprint($what,$when)
			{global $Testnumber;
				if ($when==$Testnumber)
					print "LP:$what <br />";
			}

			#checkperson: return person's name if they are found; otherwise, empty string.
			function checkperson($connection, $number)
			{
			    	$myquery="SELECT name FROM people where idnumber=$number";
					$result=mysql_query($myquery,$connection) 
					   or print "Showhistory query '$myquery' failed because ".mysql_error();
					
					if ($row=mysql_fetch_array($result))	
						return $row[0];
					else
						print "Welcome to the 2012 Toontown elections $name";
						return '';
			} # checkperson

			#storeperson: Add this name and number to the 'people' table
			function storeperson($connection, $number, $name)
			{
					$query="INSERT INTO people VALUES ('$number','$name')";

					$result=mysql_query($query,$connection) 
					   or print "storeperson query '$query' failed because ".mysql_error();
			} /* storeperson */

			#erasehistory: remove all people, reset the visit counter
			function erasehistory($connection)
			{
					$query="TRUNCATE TABLE people";
					$result=mysql_query($query,$connection) 
					   or print "Erasehistory query '$query' failed because ".mysql_error();
					   
					$query="UPDATE visits SET count=0 WHERE item='hits'";
					$result=mysql_query($query,$connection) 
					   or print "Erasehistory query '$query' failed because ".mysql_error();
					
			} # erasehistory

			#checkcount: increase the visit count by one, and tell 'em about it
			function checkcount($connection)
			{
				$myquery="SELECT count FROM visits where item='hits'";
				$result=mysql_query($myquery,$connection) 
				   or print "Showhistory query '$myquery' failed because ".mysql_error();
				
				if ($row=mysql_fetch_array($result))	
					$hitcount=$row[0];
				else
					print "Visits table had no rows in it. query=$myquery";
				$hitcount++;
				
				$query="UPDATE visits SET count=$hitcount WHERE item='hits'";
				$result=mysql_query($query,$connection) 
				   or print "Checkcount query '$query' failed because ".mysql_error();
				return $hitcount;
			}

			#drawscreen1: Ask the first question
			function drawscreen1($connection)
			{
				$hitcount=checkcount($connection); // which increments it by one
				
				print "<p>You have visited this system $hitcount times</p>";
				
				print "<fieldset>";
				print "<label for='idnumber'>ID Number</label>";
				print "<input name='idnumber' type='number' placeholder='Number from 1001 to 1049' /><br />";
				print "<label for='name'>Name</label>";
				print "<input name='name' type='text' placeholder='Firstname Lastname' /><br />";
				print "<div class='ui-grid-a'>";
				print "<div class='ui-block-a'><input name='action' type='submit' value='Submit' /></div>";
				print "<div class='ui-block-b'><input name='action' type='submit' value='Clear History' /></div>";
				print "</div>";
				print "</fieldset>";
			}
			///////// MAIN //////////////

			print "<h2 class='head'>Toontown Election 2012</h2>";
			print "<a href='results.php'>See the current results.</a>";

			// First, open the Database

			if ($onmac)
			{
			    $connection=mysql_connect("localhost","student","student")
					or print "connect failed because ".mysql_error();  
					
			    mysql_select_db("project2",$connection)
					or print "select failed because ".mysql_error();
			}
			else // on sulley. Use your own dbname, dbuser and dbpassword
			{
			    $connection=mysql_connect("localhost","ph652925","carter")
					or print "connect failed because ".mysql_error();  
					
			    mysql_select_db("ph652925",$connection) // all projects are in ONE db
					or print "select failed because ".mysql_error();
			}

				//////// THE MAIN ACTION /////////////

				$action=$_POST['action'];
				$idnumber=$_POST['idnumber'];
				$name=$_POST['name'];
					
				if ($action=='Submit')
				{
					if (!$idnumber)
						print "<span class='error'>Please enter your ID number.</span>";
					else
					{
						$maybename=checkperson($connection, $idnumber);
						if ($maybename)
							print "<p>This number ($idnumber) is already in the database, ".
									"and belongs to $maybename.</p>";
						else if ($name)
							storeperson($connection, $idnumber, $name);
						else
							print "<p class='error'>This number ($idnumber) is not in the database.</p>";
					} # idnumber block
				}
				else if ($action=='Clear History') 
				{	
					erasehistory($connection);
					print "History was cleared";
				}
				else if ($action) // ignore null, as it's probably your first visit. 
					print "What shall I do with action=$action?";

				drawscreen1($connection);
			?>
		</form>
	</body>
</html>