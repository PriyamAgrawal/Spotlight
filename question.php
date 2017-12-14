<?php
include("session.php");
?>
<?php 
	$uid=$_SESSION["userid"];
	$status_query="SELECT status FROM login WHERE UID=$uid";
	$status_result=mysqli_query($connection,$status_query);
	$status_row=mysqli_fetch_assoc($status_result);
	$that_query="SELECT UID,name FROM login WHERE UID=$uid";
	$that_result=mysqli_query($connection,$that_query);
	$that_row=mysqli_fetch_assoc($that_result);
	if($status_row['status']==27)
		header("Location: win.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SPOTLIGHT</title>
		<meta charset="utf-8"> 
    	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  	<style>
	  		html
			{
				height: 100%;
			}
			body{
				background: #1bbc9b;
			}
	  		div.imagetiles div.col-sm-2{
	  			padding: 0px;
	  			height: 100%;
	  		}
	  		.nopadding {
	  			padding-left: 0;
	  			padding-right: 0;
	  			margin: 0;
	  		}
	  		div.row div.col-sm-12 text-center{
	  			background-color: red;
	  		}
	  		.modal-body {
			    max-height: calc(100vh - 210px);
			    overflow-y: auto;
			}
			.border{
                
                background-color: #2d3e50;
                
                width: 85%;
                min-width: 25%;
                margin: auto;
                height: 23;
                overflow: auto;
            }
            .borderimage{
                background-color: #2d3e50;
                width: 100%;
                min-width: 25%;
                margin: auto;
                height: 100%;
                overflow: auto;
                padding-top: 2.5%;
                padding-bottom: 2.5%;
            }
	  	</style>
	</head>
	<body>

		<nav class="nav navbar-inverse">
	  		<div class="container-fluid">
	  			<div class="navbar-header">
	  				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span> 
				      </button>
	  				<label class="navbar-brand">SPOTLIGHT 2.0</label>
	  			</div>
	  			 <div class="collapse navbar-collapse" id="myNavbar">	
	  			<button class="btn btn-info navbar-btn" data-toggle="modal" data-target="#Modalleaderboard"> LeaderBoard</button>
	  			<button class="btn btn-info navbar-btn" data-toggle="modal" data-target="#Modalrules" onclick="typewriter()">Rules</button>
	  			<button class="btn btn-danger navbar-btn navbar-right" data-toggle="modal" data-target="#Modallogout"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</button>
	  			<p class="navbar-text navbar-right"><?php echo "LOGGED IN AS : {$that_row['name']}&nbsp&nbsp&nbsp"; ?></p>
	  			</div>
	  		</div>
	  	</nav>
	  	<div id="Modalrules" class="modal fade" role="dialog" data-keyboard="false">
  						<div class="modal-dialog">
  							<div class="modal-content">
  								<div class="modal-header text-center">
  									<button type="button" class="close" data-dismiss="modal">&times;</button>
  									<h3 class="modal-title">RULES</h3>

  								</div>
  								<div class="modal-body">
  									<body>
									  <div id="typedtext" style="font-size: 17px; font-weight: bold">
									  	
									  </div>
									  <script type="text/javascript">
									  		// set up text to print, each item in array is new line
											var aText = new Array(
											"<ul><li>COMPRISES OF A 5x5 MATRIX</li>", 
											"<li>CORRECT ANSWER LEADS TO THE OPENING OF ANOTHER TILE</li>",
											"<li>THERE ARE A TOTAL OF 26 QUESTIONS</li>",
											"<li>ONCE ALL THE QUESTIONS ARE CORRECTLY ANSWERED, A COMPLETE IMAGE IS VISIBLE TO THE PLAYER. THIS IMAGE IS THE MEGA QUESTION.</li>",
											"<li>UNLIMITED TRIES</li>",
											"<li>TOP 5 PARTICIPANTS DISPLAYED IN THE LEADERBOARD</li>",
											"<li>THE ORDER OF QUESTIONS APPEARING FOR EACH PLAYER IS SAME</li>",
											"<li>THE ORDER OF TILES OPENING IS RANDOM</li>",
											"<li>THE FINAL QUESTION CANNOT BE ANSWERED WITHOUT CORRECTLY ANSWERING ALL THE 25 QUESTIONS FIRST</li></ul>"
											);
											var iSpeed = 30; // time delay of print out
											var iIndex = 0; // start printing array at this posision
											var iArrLength = aText[0].length; // the length of the text array
											var iScrollAt = 20; // start scrolling up at this many lines
											 
											var iTextPos = 0; // initialise text position
											var sContents = ''; // initialise contents variable
											var iRow; // initialise current row
											 
											function typewriter()
											{
											 sContents =  ' ';
											 iRow = Math.max(0, iIndex-iScrollAt);
											 var destination = document.getElementById("typedtext");
											 
											 while ( iRow < iIndex ) {
											  sContents += aText[iRow++] + '<br />';
											 }
											 destination.innerHTML = sContents + aText[iIndex].substring(0, iTextPos) + "_";
											 if ( iTextPos++ == iArrLength ) {
											  iTextPos = 0;
											  iIndex++;
											  if ( iIndex != aText.length ) {
											   iArrLength = aText[iIndex].length;
											   setTimeout("typewriter()", 500);
											  }
											 } else {
											  setTimeout("typewriter()", iSpeed);
											 }
											}
									  	</script>
									</body>
  								</div>
  							</div>
  						</div>
  		</div>
	  	<div id="Modallogout" class="modal fade" role="dialog" data-keyboard="false">
  						<div class="modal-dialog">
  							<div class="modal-content">
  								<div class="modal-header text-center">
  									<button type="button" class="close" data-dismiss="modal">&times;</button>
  									<h3 class="modal-title">ATTENTION</h3>
  									<br />
  								</div>
  								<div class="modal-body">
  									<br />
  									<h4>Are you sure you want to Logout?</h4>
  									<br />
  									<br />
  									<p>Your progress will be saved</p>
  									<br />
  									<center>
  									<a href="logout.php"><button type="button" class="btn btn-danger">YES</button></a>  
  									<button type="button" class="btn btn-primary" data-dismiss="modal">Keep Playing</button>
  									</center>
  								</div>
  							</div>
  						</div>
  		</div>
  		<div id="Modalleaderboard" class="modal fade" role="dialog"	 data-keyboard="false">
  						<div class="modal-dialog">
  							<div class="modal-content">
  								<div class="modal-header text-center">
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
																echo "<td>COMPLETED</td>";
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
	  	<div class="container-fluid">
		  	<div class="row">
		  		<div class="col-md-5 col-lg-5">
		  			
		  			<?php 
						$state=$status_row["status"];
						$question_query="SELECT question,UID,hint,qid from questions,login WHERE qid='$state' AND UID='$uid'";
						$question_result=mysqli_query($connection,$question_query);
						$question_row=mysqli_fetch_assoc($question_result);
					?>
					<?php
						$img_query="SELECT img1,hintimg FROM questions WHERE qid='$state'";
						$img_result=mysqli_query($connection,$img_query);
						$img_row=mysqli_fetch_assoc($img_result);
					?>
						<br />
						<center>;
						<div class="border">
						<?php
						if($_GET['ans']==2)
						{
							echo "<div class=\"alert alert-success\">
							  <strong>Success!</strong> You have advanced one level
							</div>";
						}
							if($_GET['ans']==0)
							{
								echo "<div class=\"alert alert-danger\"
										<strong>Your answer is wrong</strong>
										</div>";
							}

							echo "<h3 style=\"color: white\">QUESTION {$question_row['qid']}</h3>";
							$question=$question_row['question'];
							if($question_row['qid']!=17 && $question_row['qid']!=25)
							{
								$question=str_replace("1", "\"", $question);
								$question=str_replace("2", "'", $question);
							}
							if($question_row['qid']==25)
							{
								$question=str_replace("9", "\"", $question);
							}
						echo "<h3 style=\"color: white\">{$question}</h3>";
					?>
					<br />
					<div class="row" style="width: 100%">
					<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2">
					</div>
					<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
					<img src="<?php echo $img_row['img1']; ?>";" class="img-responsive" style="width: 100%" />
					</div>
					<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2">
					</div>
					</div>
					<button class="btn btn-info <?php if($question_row['hint']=="" && $img_row['hintimg']=="") echo "hidden"; ?>" data-toggle="collapse" data-target="#hint">HINT</button>
					<div id="hint" class="collapse">
						<h4 style="color: white"><?php if($question_row['qid']==24) echo str_replace("2", "'", $question_row['hint']); else echo ucfirst($question_row['hint']);  ?></h4>
						<br />
						<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2"></div>
						<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
						<img src="<?php echo $img_row['hintimg']; ?>" class="img-responsive" style="width: 100%">
						</div>
						<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2"></div>
						<br />
						<br />	
					</div>
					<br />
					<br />
					<br />
					<form action="processing.php" method="post">
						<label style="color: white">ANSWER:</label><input type="text" class="form-control" style="width: 80%" name="ans" value="">
						<br />
						<br />
						<button class="btn btn-info" type="submit" name="submit" value="SUBMIT">SUBMIT</button>
					</form>
					<br />
					<br />
					</div>
					</center>
					<br />
					<br />
		  		</div>
		  		
		  		<div class="col-md-6 col-lg-6 nopadding">
		  		<div class="borderimage">
		  			<div class="container-fluid">
			  			<div class="row imagetiles">

		  				<div class="col-sm-1 col-xs-1 col-lg-1 col-md-1">
		  				</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  				<?php if($state>=15){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-0-0.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
								<?php if($state>=9){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-0-1.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
			  				</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  				<?php if($state>=19){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-0-2.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/	bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
							<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
			  					<?php if($state>=13){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-0-3.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  				<?php if($state>=5){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-0-4.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-1 col-xs-1 col-lg-1 col-md-1">
		  					</div>			
			  			</div>
			  			<div class="row imagetiles">
			  			<div class="col-sm-1 col-xs-1 col-lg-1 col-md-1">
			  				</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  					<?php if($state>=3){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-1-0.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
								<?php if($state>=17){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-1-1.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
			  				</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  				<?php if($state>=11){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-1-2.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
							<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
			  					<?php if($state>=24){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-1-3.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  				<?php if($state>=7){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-1-4.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-1 col-xs-1 col-lg-1 col-md-1">
		  					</div>			
			  			</div>
			  			<div class="row imagetiles">
			  				<div class="col-sm-1 col-xs-1 col-lg-1 col-md-1">
			  				</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  					<?php if($state>=23){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-2-0.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
								<?php if($state>=14){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-2-1.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
			  				</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  				<?php if($state>=2){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-2-2.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
							<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
			  					<?php if($state>=21){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-2-3.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  				<?php if($state>=18){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-2-4.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-1 col-xs-1 col-lg-1 col-md-1">
		  					</div>			
			  			</div>
			  			<div class="row imagetiles">
			  				<div class="col-sm-1 col-xs-1 col-lg-1 col-md-1">
			  				</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  					<?php if($state>=6){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-3-0.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
								<?php if($state>=22){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-3-1.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
			  				</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  				<?php if($state>=20){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-3-2.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
							<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
			  					<?php if($state>=25){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-3-3.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  				<?php if($state>=10){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-3-4.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-1 col-xs-1 col-lg-1 col-md-1">
		  					</div>			
			  			</div>
			  			<div class="row imagetiles">
			  				<div class="col-sm-1 col-xs-1 col-lg-1 col-md-1">
			  				</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  					<?php if($state>=12){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-4-0.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
								<?php if($state>=4){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-4-1.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
			  				</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  				<?php if($state>=26){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-4-2.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
							<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
			  					<?php if($state>=8){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-4-3.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">
				  				<?php if($state>=16){
				  					echo "<img src=\"finalmat2 [www.imagesplitter.net]-4-4.jpeg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				else{
				  					echo "<img src=\"http://www.homedepot.com/catalog/productImages/1000/bb/bb5cd4b9-bfaa-4091-bd2c-d20dc1e2b0e0_1000.jpg\" class=\"img-responsive\" style=\"width: 100%\" />";
				  				}
				  				?>
				  			</div>
				  			<div class="col-sm-1 col-xs-1 col-lg-1 col-md-1">
		  					</div>
			  			</div>
		  			</div>
		  		</div>
		  		</div>
		  	</div>
	  	</div>
	 </div> 	
	</body>
</html>