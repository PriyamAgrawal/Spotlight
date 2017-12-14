<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="qwerty123456";
$dbname="spotlight";
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno()){
	die("Database cant load"); 
}
?>