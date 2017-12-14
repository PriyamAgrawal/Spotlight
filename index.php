<?php
	session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>START</title>
	<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style>
  		@import url(https://fonts.googleapis.com/css?family=Montserrat);
		html, body{
		  height: 100%;
		  font-weight: 800;
		}

		body{
		  background: #030321;
		  font-family: Arial;
		  background-repeat: no-repeat;
	      background-size: 100% 100%;
          background-attachment: fixed; 
		}

		svg {
		    display: block;
		    font: 10.5em 'Montserrat';
		    width: 100%;
		    height: 100%;
		    margin: 0 auto;
		}

		.text-copy {
		    fill: none;
		    stroke: white;
		    stroke-dasharray: 6% 29%;
		    stroke-width: 5px;
		    stroke-dashoffset: 0%;
		    animation: stroke-offset 5.5s infinite linear;
		}

		.text-copy:nth-child(1){
		    stroke: #4D163D;
		  animation-delay: -1;
		}

		.text-copy:nth-child(2){
		  stroke: #840037;
		  animation-delay: -2s;
		}

		.text-copy:nth-child(3){
		  stroke: #BD0034;
		  animation-delay: -3s;
		}

		.text-copy:nth-child(4){
		  stroke: #BD0034;
		  animation-delay: -4s;
		}

		.text-copy:nth-child(5){
		  stroke: #FDB731;
		  animation-delay: -5s;
		}

		@keyframes stroke-offset{
		  100% {stroke-dashoffset: -35%;}
		}
  	</style>	
</head>
<body>
	<div class="container-fluid" style="padding-top: 2%">
		<div class="row">
		<div class="col-lg-1">
		</div>
		<div class="col-lg-10 col-xs-12">
		<svg viewBox="0 0 1100 300">
	    <symbol id="s-text">
			<text text-anchor="middle" x="50%" y="80%">SPOTLIGHT 2.0</text>
		</symbol>
		<g class = "g-ants">
			<use xlink:href="#s-text" class="text-copy"></use>
			<use xlink:href="#s-text" class="text-copy"></use>
			<use xlink:href="#s-text" class="text-copy"></use>
			<use xlink:href="#s-text" class="text-copy"></use>
			<use xlink:href="#s-text" class="text-copy"></use>
		</g>
	</svg>
	</div>
		</div>
		<br />
		<br />
		<div class="row">
			<div class="col-lg-3 col-xs-0 col-sm-0 col-md-0">
			</div>
			<div class="col-lg-6 col-xs-12 col-sm-12 col-md-12 text-center">
				<a href="login.php?success=0&err=0&regerr=0"><button class="btn btn-info">Enter the spotlight</button></a>
			</div>
			<div class="col-lg-3 col-xs-0 col-sm-0 col-md-0">
			</div>
		</div>
	</div>
</body>
</html>
