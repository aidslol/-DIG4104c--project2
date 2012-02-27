<!DOCTYPE html>
<html>
	<head>
		<title>Project 2: Login</title>
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
			<h3>admin account is admin / 1234 </h3>
			<form name='register' method='post' action='register.php'>
				<label for='name' class='ui-hidden-accessible'>Username:</label>
				<input name='name' type='text' id='name' class="input ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-a" data-form="ui-body-a" value='' placeholder="Username" />
				<label for="number" class="ui-hidden-accessible">Voter Number:</label>
				<input name='number' type='text' id='number' class="input ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-a" data-form="ui-body-a" value="" placeholder="Voter Number" />
				<input type='submit' name='Submit' value='Register' rel="external" />
			</form>
		</div>
	</body>
</html>
			