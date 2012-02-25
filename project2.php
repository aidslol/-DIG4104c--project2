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
		<h2>Toontown 2012 Elections</h2>
			<h3>test account is john / 1234 </h3>
		<form name='form1' method='post' action='checklogin.php'>
			<label for='myusername' class='ui-hidden-accessible'>Username:</label>
			<input name='myusername' type='text' id='myusername' value='' placeholder="Username" />
			<label for="voterNum" class="ui-hidden-accessible">Voter Number:</label>
			<input name='voterNum' type='text' id='voterNum' value="" placeholder="Voter Number" />
			<input type='submit' name='Submit' value='Login' />
			
			<!-- register a new user -->
			<input type='submit' name='register' value='Register' />
		</form>
		
	</body>
</html>
			