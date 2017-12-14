<?php
	include("session.php");
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
		<div class="col-lg-10 col-xs-12 text-center">
	<h1 style="color: #FDB731; font-size: 60px">SUCCESS!</h1>
	<h1 style="color: #FDB731; font-size: 40px">YOU HAVE COMPLETED</h1>
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
		<div class="row text-center">
			<button class="btn btn-info" data-toggle="modal" data-target="#Modalleaderboard"> LeaderBoard</button>
			<br />
			<br />
			<br />
  		<a href="logout.php"><button class="btn btn-danger">LOGOUT</button></a>
		</div>
		<div id="Modalleaderboard" class="modal fade" role="dialog"	 data-keyboard="false">
  						<div class="modal-dialog">
  							<div class="modal-content">
  								<div class="modal-header">
  									<button type="button" class="close" data-dismiss="modal">&times;</button>
  									<h3 class="modal-title">Leaderboard</h3>
  									<br />
  								</div>
  								<div class="modal-body">
  									<center>
										<br />
										<br />
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-condensed">
												<thead>
													<tr>
														<td>RANK</td>
														<td>USER ID</td>
														<td>LEVEL</td>
													</tr>
												</thead>
												<tbody>
													<?php
														$rank=1;
														$leader_query="SELECT name,UID,status FROM login ORDER BY SCORE DESC,timelast ASC";
														$leader_result=mysqli_query($connection,$leader_query);
														$leader_count=mysqli_num_rows($leader_result);
														while($leader_count>0)
														{
															$leader_row=mysqli_fetch_assoc($leader_result);
															echo "<tr>";
															echo "<td>{$rank}</td>";
															echo "<td>{$leader_row['UID']}</td>";
															if($leader_row['status']==27)
																echo "<td>SUCCESS</td>";
															else
																echo "<td>{$leader_row['status']}</td>";
															echo "</tr>";
															$rank++;
															if($rank==6)
																break;
															$leader_count-=1;
														}
														
													?>
												</tbody>
											</table>
										</div>	
									</center>

  								</div>
  							</div>
  						</div>
  		</div>

	</div>
</body>
</html>