<?php
	
	// Need to get from login page to this one, then from here to some page that says you voted/go to results.
	// Might start something like this, but need to save vote and add it to results.

	setcookie("idnumber",$_POST['idnumber']);
	setcookie("name",$_POST['name']);

	$idnumber = $_POST['idnumber'];
	$name = $_POST['name'];
	
	/*
	if(isset($_POST['submit']) && (!$logged_in)) {
		$selectuser_query = "SELECT p.idnumber, p.name FROM people p";
		$user_result = $mysqli->query($user_result);
		if($mysqli->error) {
			print "Query failed: ".$mysqli->error;
		}
		
		while($row = $user_result->fetch_object(MYSQLI_ASSOC)) {
			if ((($_POST['idnumber']) == ($row->idnumber)) && (($_POST['name']) == ($row->name))) {
                $logged_in = true;
                $logged_in_idnumber = $row->idnumber;
            }
        }
    }
    */
?>

<!DOCTYPE html> 
<html> 
	<head> 
		<title>Toontown General Election 2012</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
		<link rel="stylesheet" href="css/text.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
		<script type="text/javascript" src="js/swipe.js"></script>
	</head> 
	<body> 

		<div data-role="page" id="panel1">
			<h2 class="head">Toontown Election 2012</h2>
			<div class="subhead">
				<p>Welcome <? $name ?>. Please select a candidate.</p>
			</div><!-- /header -->

			<div data-role="content">	
				<h3>Mordecai</h3>
				<span>Source: <a href="http://images.wikia.com/theregularshow/images/0/0b/Mordecai_character.png">Wikia</a></span>
				<div class="imgcenter">
					<img src="img/mordecai.png" alt="Mordecai" />
				</div>
				<ul>
					<li>A guy you could have a drink with.</li>
					<li>Plays video games.</li>
					<li>Aallllll riiiiiight.</li>
				</ul>
				<form method='post' action=''>
					<input name='action' type='submit' value='Vote for Mordecai' />
				</form>	
			</div><!-- /content -->
			<a href="#panel2" data-role="button">Next</a></div>
		</div><!-- /page -->

		<div data-role="page" id="panel2">
			<h2 class="head">Toontown Election 2012</h2>
			<div class="subhead">
				<p>Welcome <? $name ?>. Please select a candidate.</p>
			</div><!-- /header -->

			<div data-role="content">	
				<h3>Phineas Flynn</h3>	
				<span>Source: <a href="http://images.wikia.com/phineasandferb/images/5/52/Phineas_Flynn.png
">Wikia</a></span>
				<div class="imgcenter">
					<img src="img/phineas.png" alt="Phineas" />
				</div>
				<ul>
					<li>Always optimistic and imaginative.</li>
					<li>An inventor who thinks big, along with his brother Ferb.</li>
					<li>Has a pet platypus named Perry. He doesn't do much.</li>
				</ul>
				<form method='post' action=''>
					<input name='action' type='submit' value='Vote for Phineas' />
				</form>		
			</div><!-- /content -->
			<div class="ui-grid-a">
				<div class="ui-block-a"><a href="#panel1" data-role="button">Previous</a></div>
				<div class="ui-block-b"><a href="#panel3" data-role="button">Next</a></div>
			</div>
		</div><!-- /page -->

		<div data-role="page" id="panel3">
			<h2 class="head">Toontown Election 2012</h2>
			<div class="subhead">
				<p>Welcome <? $name ?>. Please select a candidate.</p>
			</div><!-- /header -->

			<div data-role="content">	
				<h3>Sandy Cheeks</h3>
				<span>Source: <a href="http://images.wikia.com/spongebob/images/a/a0/Sandy_Cheeks.svg">Wikia</a></span>
				<div class="imgcenter">
					<img src="img/sandy.png" alt="Sandy" />
				</div>	
				<ul>
					<li>A scientist from Texas, currently living underwater in Bikini Bottom.</li>
					<li>She's also a karate master.</li>
					<li>Her inventions include a cloning device and a submarine that shrinks to microscopic size.</li>
				</ul>
				<form method='post' action=''>
					<input name='action' type='submit' value='Vote for Sandy' />
				</form>
			</div><!-- /content -->
			<a href="#panel2" data-role="button">Previous</a></div>
		</div><!-- /page -->

	</body>
</html>