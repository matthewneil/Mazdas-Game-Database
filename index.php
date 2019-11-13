<!DOCTYPE HTML>
<html>
<?php
#Connection to SQL Database
require 'databaseConnection.php';
?>


<head>
	<title>Mazda's Game Database</title>
	<link rel="stylesheet" href="style.css">
</head>


<body>
	<!-- The header and nav elements are fixed to the top of the page -->
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
		<h2>Mazda's Games</h2>
		<?php
			//The following php code gets all the data from the games in the database and display the data in HTML form -->
			$result = $con->query("SELECT * FROM game WHERE gameID > 0 ORDER BY title");
			if ($result->num_rows > 0) {
			// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<section class='psgame'>";				
					echo "<p id='title'><a href='displayGame.php/?id=" .$row['gameID']. "'>" .$row["title"]. "</a></p>";
					if($row["platform"] == 'ps4' || $row["platform"] == 'ps3' || $row["platform"] == 'ps2' || $row["platform"] == 'ps1'){
						echo "<img class='platform' src='img/ps-logo.png' width=40px alt='100% icon'>";
					} if($row["platform"] == 'xboxone' || $row["platform"] == 'xbox360' || $row["platform"] == 'xbox'){
						echo "<img class='platform' src='img/xbox-logo.png' width=40px alt='100% icon'>";
					} if($row["platform"] == 'pc'){
						echo "<img class='platform' src='img/windows-logo.png' width=40px alt='100% icon'>";
					} if($row["platform"] == 'switch' || $row["platform"] == 'wiiu' || $row["platform"] == 'wii' || $row["platform"] == 'gamecube'){
						echo "<img class='platform' src='img/nintendo-logo.png' width=40px alt='100% icon'>";
					}
					if($row["complete"] == 1){
						echo "<img class='fullcomplete' src='img/full_complete.png' width=100px alt='100% icon'>";
					} else {
						echo "<img class='fullcomplete' style='opacity: 0.1;' src='img/full_complete.png' width=100px alt='100% icon'>";
					}
					if($row["story"] == 1){
						echo "<img class='storycomplete' src='img/story_complete.png' width=100px alt='Story icon'>";
					} else {
						echo "<img class='storycomplete' style='opacity: 0.1;' src='img/story_complete.png' width=100px alt='Story icon'>";
					}
					if($row["physical"] == 1){
						echo "<img class='disc' src='img/disc_icon.png' width=40px alt='Disc Icon'>";
					} else {
						echo "<img class='disc' style='opacity: 0.1;' src='img/disc_icon.png' width=40px alt='Disc Icon'>";
					}
					echo "</section>";
				}
			} else {
				echo "No Games have been added yet!";
			}

			$con->close();
		?>
	</main>
</body>
</html>


