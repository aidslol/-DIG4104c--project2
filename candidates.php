<?php
	session_start();
	
	// Session variables
	//$name = $_SESSION['myusername'];
	//$voterNum = $_SESSION['voterNum'];
	
	
	//Let's vote!
	function checkvote($connection){
		
		$action = $_POST['action'];
		
		$myquery="SELECT numVotes FROM votes WHERE candidate='$action'";
		$result=mysql_query($myquery,$connection) 
		or print "Showhistory query '$myquery' failed because ".mysql_error();
		
		if ($row=mysql_fetch_array($result)) {
			$votecount=$row[0]++;
			$votecount++;
		}
	
		$query="UPDATE votes SET numVotes=$votecount WHERE candidate='$action'";
		$result=mysql_query($query,$connection) 
		or print "Checkcount query '$query' failed because ".mysql_error();
		return $votecount;
	}
	
	//$_SESSION['myusername']
	// User is a returning user
	// & has/hasn't voted
	if (isset($_SESSION['myusername'])) {
		
		//connect to database to get if user has voted
		$connection=mysql_connect("localhost","ph652925","carter")
        or print "connect failed because ".mysql_error();  
        
		mysql_select_db("ph652925",$connection)
        or print "select failed because ".mysql_error();
		
		$action = $_POST['action'];
		
	
	     // if 
		//Voting 
		if ($action == 'Mordecai'){
			$votecount = checkvote($connection);
		}
	
		if ($action == 'Phineas'){
			$votecount = checkvote($connection);
		}
	
		if ($action == 'Sandy'){
			$votecount = checkvote($connection);
		}
			
	}
	
?>

<!DOCTYPE html> 
<html> 
	<head> 
		<title>Toontown General Election 2012</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="css/vote_theme.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile.structure-1.0.1.min.css" />
		<link rel="stylesheet" href="css/text.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
		<script type="text/javascript" src="js/swipe.js"></script>
	</head> 
	<body> 

		<div data-role="page" id="panel1" data-theme="b">
			<div class="ui-header ui-bar-b" role="banner" data-role="header" data-form="ui-bar-b" data-theme="b" data-swatch="b">
				<h2 class="head" aria-level="1" role="heading" tabindex="0">Toontown Election 2012</h2>
			</div>
			<div class="subhead">
				<p>Welcome <?php echo $_SESSION['myusername']; ?>. Please select a candidate.</p>
			</div><!-- /header -->

			<div class="ui-content ui-body-b" role="main" data-role="content" data-form="ui-body-b" data-theme="b">	
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
				<form method='post' action='' data-form="ui-body-b">
					<p>Vote for</p>
					<input name='action' type='submit' value='Mordecai' />
				</form>	
			</div><!-- /content -->
			<a href="#panel2" data-role="button" data-form="ui-body-b">Next</a></div>
		</div><!-- /page -->

		<div data-role="page" id="panel2" data-theme="d">
			<div class="ui-header ui-bar-d" role="banner" data-role="header" data-form="ui-bar-d" data-theme="d" data-swatch="d">
				<h2 class="head" aria-level="1" role="heading" tabindex="0">Toontown Election 2012</h2>
			</div>
			<div class="subhead">
				<p>Welcome <?php echo $_SESSION['myusername']; ?>. Please select a candidate.</p>
			</div><!-- /header -->

			<div class="ui-content ui-body-d" role="main" data-role="content" data-form="ui-body-d" data-theme="d">		
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
				<form method='post' action='' data-form="ui-body-d">
					<input name='action' type='submit' value='Phineas' />
				</form>		
			</div><!-- /content -->
			<div class="ui-grid-a">
				<div class="ui-block-a"><a href="#panel1" data-role="button" data-form="ui-body-d">Previous</a></div>
				<div class="ui-block-b"><a href="#panel3" data-role="button" data-form="ui-body-d">Next</a></div>
			</div>
		</div><!-- /page -->

		<div data-role="page" id="panel3" data-theme="c">
			<div class="ui-header ui-bar-d" role="banner" data-role="header" data-form="ui-bar-d" data-theme="d" data-swatch="d">
				<h2 class="head" aria-level="1" role="heading" tabindex="0">Toontown Election 2012</h2>
			</div>
			<div class="subhead">
				<p>Welcome <?php echo $_SESSION['myusername']; ?>. Please select a candidate.</p>
			</div><!-- /header -->

			<div class="ui-content ui-body-c" role="main" data-role="content" data-form="ui-body-c" data-theme="c">		
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
				<form method='post' action='' data-form="ui-body-c">
					<input name='action' type='submit' value='Sandy' />
				</form>
			</div><!-- /content -->
			<a href="#panel2" data-role="button" data-form="ui-body-c">Previous</a></div>
		</div><!-- /page -->

	</body>
</html>