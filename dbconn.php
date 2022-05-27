<?php

$servername = "localhost"; 
$dBUsername = "root";
$dBPassword = "";
$dBName = "website";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName); #  variable opens a database connection

if (!$conn){
	die("Connection failed: ".mysqli_connect_error());
}
else {
	echo "";
}
?>