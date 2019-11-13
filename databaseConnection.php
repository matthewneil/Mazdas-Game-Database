<?php

#MySQL database connection
$host="localhost:3306";
$user="root";
$password="";
$con= new mysqli($host, $user, $password, "games");
if($con->connect_error) {
 echo 'Failed to connect to SQL server.';
} 

?>