<!DOCTYPE HTML>
<html>
<?php
#Connection to SQL Database
require 'databaseConnection.php';
?>


<head>
	<title>Mazda's Game Database</title>
	<link rel="stylesheet" href="../style.css">
</head>


<body>
	<header style="position:fixed">
		<h1>Mazda's Game Database</h1>
	</header>
	<nav style="position:fixed; top: 78px;">
		<ul>
			<li id='homeNav'><a href="../index.php">Home</a></li>
			<li id='addGameNav'><a href="../addGamePage.php">Add Game</a></li>			
		</ul>
	</nav>
	
	
	
	<main>
		<?php
			$gameid = (int) $_GET['id'];
			$result = $con->query("SELECT * FROM game WHERE gameID = $gameid");
			$platform='';		
			while($row = $result->fetch_assoc()) {
				$platform = $row['platform'];
				if($platform == 'ps4'){
					echo "<h2>PlayStation 4 title</h2>";
				} else if($platform == 'ps3'){
					echo "<h2>PlayStation 3 title</h2>";
				} else if($platform == 'ps2'){
					echo "<h2>PlayStation 2 title</h2>";
				} else if($platform == 'ps1'){
					echo "<h2>PlayStation title</h2>";
				} else if($platform == 'xboxone'){
					echo "<h2>Xbox One title</h2>";
				} else if($platform == 'xbox360'){
					echo "<h2>Xbox 360 title</h2>";
				} else if($platform == 'xbox'){
					echo "<h2>Xbox title</h2>";
				} else if($platform == 'pc'){
					echo "<h2>PC title</h2>";
				} 
				echo "<section class='psgame'>";				
					echo "<p id='title'>" .$row["title"]. "</a></p>";
					if($row["platform"] == 'ps4' || $row["platform"] == 'ps3' || $row["platform"] == 'ps2' || $row["platform"] == 'ps1'){
						echo "<img class='platform' src='../img/ps-logo.png' width=40px alt='100% icon'>";
					} if($row["platform"] == 'xboxone' || $row["platform"] == 'xbox360' || $row["platform"] == 'xbox'){
						echo "<img class='platform' src='../img/xbox-logo.png' width=40px alt='100% icon'>";
					} if($row["platform"] == 'pc'){
						echo "<img class='platform' src='../img/windows-logo.png' width=40px alt='100% icon'>";
					} if($row["platform"] == 'switch' || $row["platform"] == 'wiiu' || $row["platform"] == 'wii' || $row["platform"] == 'gamecube'){
						echo "<img class='platform' src='../img/nintendo-logo.png' width=40px alt='100% icon'>";
					}
					if($row["complete"] == 1){
						echo "<img class='fullcomplete' src='../img/full_complete.png' width=100px alt='100% icon'>";
					} else {
						echo "<img class='fullcomplete' style='opacity: 0.1;' src='../img/full_complete.png' width=100px alt='100% icon'>";
					}
					if($row["story"] == 1){
						echo "<img class='storycomplete' src='../img/story_complete.png' width=100px alt='Story icon'>";
					} else {
						echo "<img class='storycomplete' style='opacity: 0.1;' src='../img/story_complete.png' width=100px alt='Story icon'>";
					}
					if($row["physical"] == 1){
						echo "<img class='disc' src='../img/disc_icon.png' width=40px alt='Disc Icon'>";
					} else {
						echo "<img class='disc' style='opacity: 0.1;' src='../img/disc_icon.png' width=40px alt='Disc Icon'>";
					}
					echo "</section>";
			}
			if($platform == 'ps4'){
				$result = $con->query("SELECT * FROM ps4 WHERE gID = $gameid");
				while($row = $result->fetch_assoc()) {
					if ($row['platTrophy'] == 1){
						echo "<p>Platinum Trophy Earned!</p>";
					}
					if ($row['proEnhanced'] == 1){
						echo "<p>PS4 Pro Enhanced!</p>";
					}
				}
			}
			
			if($platform == 'ps3'){
				$result = $con->query("SELECT * FROM ps3 WHERE gID = $gameid");
				while($row = $result->fetch_assoc()) {
					if ($row['platTrophy'] == 1){
						echo "<p>Platinum Trophy Earned!</p>";
					}
				}
			}
			
			if($platform == 'xboxone'){
				$result = $con->query("SELECT * FROM xboxone WHERE gID = $gameid");
				while($row = $result->fetch_assoc()) {
					if ($row['achievements'] == 1){
						echo "<p>All Achievements Earned!</p>";
					}
					if ($row['xEnhanced'] == 1){
						echo "<p>Xbox One X Enhanced!</p>";
					}
				}
			}
			
			if($platform == 'xbox360'){
				$result = $con->query("SELECT * FROM xbox360 WHERE gID = $gameid");
				while($row = $result->fetch_assoc()) {
					if ($row['achievements'] == 1){
						echo "<p>All Achievements Earned!</p>";
					}
				}
			}
			
			if($platform == 'pc'){
				$result = $con->query("SELECT * FROM pc WHERE gID = $gameid");
				while($row = $result->fetch_assoc()) {
					if ($row['achievements'] == 1){
						echo "<p>All Achievements Earned!</p>";
					}
				}
			}
			
			$con->close();
		?>
		
			<a href=<?php echo '../deleteGame.php/?id=' . $gameid . '&platform=' . $platform?>><button type="submit" id='deleteButton'>Delete</button></a>

	</main>
</body>
</html>


