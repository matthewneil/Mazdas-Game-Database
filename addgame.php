<?php
//This php code is ran when the form in 'addGamePage.php' has been submitted
//It is meant to add the game into the database.
#DatabaseConnection
require 'databaseConnection.php';

//Set inital values
$disc = 0;
$scom = 0;
$fcom = 0;
$achievements = 0;
$enhanced = 0;

$title = $_GET['title'];

//change values to 1 if the radio boxes were selected.
if(isset($_GET['disc'])){
	$disc = 1;
}
if(isset($_GET['scom'])){
	$scom = 1;
}
if(isset($_GET['fcom'])){
	$fcom = 1;
}

//Ps4, Ps3, Xbox 360, Xbox One and PC Only -- achievements
if($_GET['platforms'] == 'ps4' || $_GET['platforms'] == 'ps3' || $_GET['platforms'] == 'xboxone' || $_GET['platforms'] == 'xbox360' || $_GET['platforms'] == 'pc'){
	if(isset($_GET['achievements'])){
		$achievements = 1;
	}
}

//Ps4 and Xbox one only -- enhanced (ps4 pro and xbox one x)
if($_GET['platforms'] == 'ps4' || $_GET['platforms'] == 'xboxone'){
	if(isset($_GET['enhanced'])){
		$enhanced = 1;
	}
}

//calculate the game ID so it is unique
$result = $con->query("SELECT MAX(gameID) FROM game");
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$size = (int) $row['MAX(gameID)'];
		$size = $size + 1;
		#echo $size;
	}
}


$platform = $_GET['platforms'];
$title = str_replace("'", "''", $title);

//Insert the game data into 'game'
$con->query("INSERT INTO game VALUES ($size, '$title', $disc, $scom, $fcom, '$platform')");

//Insert the game data into other tables if nessesary
if($_GET['platforms'] == 'ps4'){
	$con->query("INSERT INTO ps4 VALUES ($size, $achievements, $enhanced");
} else if ($_GET['platforms'] == 'ps3'){
	$con->query("INSERT INTO ps3 VALUES ($size, $achievements");
} else if ($_GET['platforms'] == 'xboxone'){
	$con->query("INSERT INTO xboxone VALUES ($size, $achievements, $enhanced");	
} else if ($_GET['platforms'] == 'xbox360'){
	$con->query("INSERT INTO xbox360 VALUES ($size, $achievements");
} else if ($_GET['platforms'] == 'pc'){
	$con->query("INSERT INTO pc VALUES ($size, $achievements");
}

#Back to main page
header("Location: index.php");
?>