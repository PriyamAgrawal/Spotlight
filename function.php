<?php
function hello($name){
	return "hello {$name}";
}
function redirect_to($path){
	header("Location: {$path}");
}
?>