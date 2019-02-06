<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="spotlight";
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno()){
	die("Database cant load"); 
}
?>
