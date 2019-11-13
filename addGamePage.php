<!DOCTYPE HTML>
<html>
	<script>
	function validateForm() {
		var x = document.forms["ps"]["title1"].value;
		if (x == "") {
			alert("Name must be filled out");
			return false;
		}
	}
	</script>
	<?php
	#Connection to SQL Database
	require 'databaseConnection.php';
	?>
	<head>
		<title>Mazda's Game Database</title>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<header style="position:fixed">
		<h1>Mazda's Game Database</h1>
	</header>
	<nav style="position:fixed; top: 78px;">
			<ul>
				<li id='homeNav'><a href="index.php">Home</a></li>
				<li id='addGameNav'><a href="addGamePage.php">Add Game</a></li>
			</ul>
		</nav>
		<main>
			<form name="game" action="addGame.php" onsubmit="" method="get">
				<fieldset>
					<legend>All Platforms</legend>
					<select name="platforms" id ="platformList">
						<option value = "pc">PC</option>
						<option value = "ps4">PlayStation 4</option>
						<option value = "ps3">PlayStation 3</option>
						<option value = "ps2">PlayStation 2</option>
						<option value = "ps1">PlayStation 1</option>
						<option value = "xboxone">Xbox One</option>
						<option value = "xbox360">Xbox 360</option>
						<option value = "xbox">Xbox</option>
					</select><br>
					Game Title: <input class='fullWidth' type="text" name="title" maxlength="40" required><br>
					<input type="checkbox" name="disc">On Disc/Cartridge<br>
					<input type="checkbox" name="scom">Story Completed<br>
					<input type="checkbox" name="fcom">Fully Completed<br>
				</fieldset>
				<fieldset>
					<legend>PS3 / PS4 / Xbox 360 / Xbox One / PC</legend>
					<input type="checkbox" name="achievements">All Trophies/Achievements<br>
				</fieldset> 
				<fieldset>
					<legend>PS4 / Xbox One</legend>
					<input type="checkbox" name="enhanced">PS4 Pro / Xbox One X Enhanced<br>
				</fieldset> 
				<fieldset>
					<input class='fullWidth' type="submit">
				</fieldset> 
			</form>
			
		</main>
	</body>
</html>
