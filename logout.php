<?php
	require_once("function.php"); 		
	session_start();
	session_unset();
	session_destroy();
	redirect_to("index.php");
?>