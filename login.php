<?php 
    require_once("function.php");
    require_once("validation_functions.php");
    require_once("config.php");
    session_start();
    session_unset();
    session_destroy();
    session_start();
    $errors=[];
?>
<?php
        if(!isset($_GET['success']))
            header("Location: logout.php");
         if(!isset($_GET['err']))
            header("Location: logout.php");
         if(!isset($_GET['regerr']))
            header("Location: logout.php");
    ?>
<?php
        $message="";
        if (isset($_POST["submit"])) {
        $user=trim($_POST["username"]);
        $pass=trim($_POST["password"]);
        $user=mysqli_real_escape_string($connection,$user);
        $pass=mysqli_real_escape_string($connection,$pass);
        
        $fields_required=["username","password"];
        foreach ($fields_required as $field) {
            if(!has_presence(trim($_POST[$field]))){
                $errors[$field]= $field . " can't be empty";
            }
        }
        if(empty($errors)){
            $query="SELECT UID FROM login WHERE UID='$user' AND PASS='$pass'";
            $result=mysqli_query($connection,$query);
            $row=mysqli_fetch_assoc($result);
            $query1="SELECT * FROM login WHERE UID='$user'";
            $r1=mysqli_query($connection,$query1);
            $row1=mysqli_fetch_assoc($r1);
            $count = mysqli_num_rows($result);
        if($count==1){
        $_SESSION['log']=911;
        $_SESSION['userid']=$user;
        redirect_to("question.php?ans=1");
        }
        elseif ($row1['UID']==$user) {
            $message="Wrong Password";
        }
        else{
            $message="Wrong Username and Password";
            $user="";
        }
    }
        else{
            $message="There are some errors";
        }
    }
        else{
            $user="";
            $message="Log in";
        }    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<title>LOGIN</title>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" type="text/css" rel="stylesheet" />
        <script>
            var TxtType = function(el, toRotate, period) {
                this.toRotate = toRotate;
                this.el = el;
                this.loopNum = 0;
                this.period = parseInt(period, 10) || 1000;
                this.txt = '';
                this.tick();
                this.isDeleting = false;
            };

            TxtType.prototype.tick = function() {
                var i = this.loopNum % this.toRotate.length;
                var fullTxt = this.toRotate[i];

                if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
                } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
                }

                this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

                var that = this;
                var delta = 200 - Math.random() * 100;

                if (this.isDeleting) { delta /= 2; }

                if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
                } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
                }

                setTimeout(function() {
                that.tick();
                }, delta);
            };

            window.onload = function() {
                var elements = document.getElementsByClassName('typewrite');
                for (var i=0; i<elements.length; i++) {
                    var toRotate = elements[i].getAttribute('data-type');
                    var period = elements[i].getAttribute('data-period');
                    if (toRotate) {
                      new TxtType(elements[i], JSON.parse(toRotate), period);
                    }
                }
                // INJECT CSS
                var css = document.createElement("style");
                css.type = "text/css";
                css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
                document.body.appendChild(css);
            };
        </script>
        <style>
            html
            {
                height: 100%;
            }
            body{
                background-image: url("https://t4.ftcdn.net/jpg/01/12/88/43/240_F_112884300_0SFOzIrZEK0LDeKXw02u50lH4gM4QToG.jpg");
                background-repeat: no-repeat;
                padding-top: 2%;
                background-size: 100% 100%;
                background-attachment: fixed;   
            }
            .data_entered{
                color: #000000;
                font-weight: bold;
                font-size: 1.125em;
                height: 1.4em;
                width: 60%;
                
            }
            .label{
                color: white;
                font-size: 17px;
                line-height: 2em;
            }
            .message{
                color: white;
                font-weight: bold;
                font-size: 25px;
                text-transform: uppercase;
                text-align: center;
                height: 10%;
                padding-bottom: 2%;
                padding-top: 2%;
                }
            .error{
                color: white;
                font-weight: bold;
                font-style: italic;
                font-size: 17px;
            }
            .submit{
                color: black;
                font-weight: bold;
                font-size: 1.5em;
                text-transform: uppercase;
                text-align: center;
                width: 50%;
                word-spacing: 0.2em;
            }   
            .border{
                background: #030321;
                width: 80%;
                min-width: 25%;
                margin: auto;
                height: 23;
                overflow: auto;
                border-radius: 4px;
            }
            .borderreg{
                background: #030321;
                width: 80%;
                min-width: 25%;
                margin: auto;
                height: 23;
                overflow: auto;
                border-radius: 4px; 
            }
            .heading{
                font-style: Playfair Display;
                font-size: 50px;
                padding-bottom: 2%;
                color: black;
            }
            .nav-pills > li.active > a, .nav-pills > li.active > a:focus {
        color: black;
        background-color: #030321;
    }

        .nav-pills > li.active > a:hover {
            background-color: #030321;
            color:black;
        }
    }

        </style>
        <script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>
    <div class="container-fluid">
        <h2 align="center">
          <label style="color: white; font-size: 35px" class="typewrite" data-period="1000" data-type='[ "WELCOME", "YOU ARE IN THE" , "SPOTLIGHT", "LOGIN TO PLAY" ]'>
            <span class="wrap"></span>
          </label>
        </h2>
        <div class="col-lg-4 col-xs-0">
        </div>
        <div class="col-lg-4 col-xs-12">
   <h1 align="center" class="heading" style="color: white; font-size: 35px; font-weight: bold">SPOTLIGHT 2.0</h1>
   <ul class="nav nav-pills" style="width: 80%; margin: auto">
       <li <?php if($_GET['regerr']==0) echo"class=\"active\""; ?> style="width: 49.5%; text-align: center"><a data-toggle="pill" style="font-weight: bold; color: white" href="#login">LOGIN</a></li>
       <li <?php if($_GET['regerr']==1) echo"class=\"active\""; ?> style="width: 49.5%; text-align: center"><a data-toggle="pill" style="font-weight: bold; color: white" href="#register">REGISTER</a></li>
   </ul>
   <div class="tab-content">
   <div id="login" class="tab-pane fade <?php if($_GET['regerr']==0) echo"in active"; ?>" >
<div class="border">
    <?php 
            if($_GET['success']==1)
                echo "
            <div class=\"alert alert-success\" >
                            <center>
                          <strong>Registration Successful</strong>
                          </center>   
                        </div>";
    ?>
    <div class="message">
        <?php echo $message; ?>
    </div>
    <form action="login.php?success=0&err=0&regerr=0" class="form" method="post">
        <div class="form-group" style="padding-left: 12%">
        <label class="label">User Id:</label><input type="text" name="username" class="form-control" style="width: 85%" placeholder="Enter Registration No." value="<?php echo $user; ?>">
        </div>
        <div class="form-group" style="padding-left: 12%">
        <label class="label">Password:</label><input type="password" name="password" class="form-control" style="width: 85%" placeholder="Enter Password" value="">
        </div>
        <br />
    	<center>
         <button class="btn btn-success" type="submit" name="submit" class="submit" value="Log in" style="width: 40%">LOGIN</button>   
        </center>
    </form>
    <br />
    <div class="error">
    <?php echo error_report($errors); ?>
    </div>
    </div>
    </div>
    <div id="register" class="tab-pane fade <?php if($_GET['regerr']==1) echo"in active"; ?>">
                <div class="borderreg">
                <?php
                    if($_GET['success']==-1)
                    echo "
                <div class=\"alert alert-danger\" >
                                <center>
                              <strong>Registration FAILURE</strong>
                              </center>   
                            </div>";
                ?> 
                    <form action="regcheck.php" method="post" style="padding-top: 3%; padding-bottom: 2%">
                        <div class="form-group" style="padding-left: 12%">
                        <label style="color: white; font-size: 17px" >Name :</label><input type="text" class="form-control" style="width: 85%" placeholder="Enter name" name="username">
                        
                        </div>
                        <div class="form-group" style="padding-left: 12%">
                        <label style="color: white; font-size: 17px">Registration Numner :</label><input type="number" style="width: 85%" class="form-control" placeholder="Enter Registration No." name="regno">
                        
                        </div>
                        <div class="form-group" style="padding-left: 12%">
                        <label style="color: white; font-size: 17px">Mobile Number :</label><input type="number" style="width: 85%" class="form-control" placeholder="Enter Number" name="num">
                        
                        </div>
                        <div class="form-group" style="padding-left: 12%">
                        <label style="color: white; font-size: 17px">Email Id :</label><input type="email" class="form-control" style="width: 85%" placeholder="Enter email" name="email">
                        
                        </div>
                        <div class="form-group" style="padding-left: 12%">
                        <label style="color: white; font-size: 17px">Password :</label><input type="password" class="form-control" style="width: 85%" placeholder="Enter password" name="password">
                        </div>
                        <div style="color: white; padding-left: 2%; padding-right: 1%">
                        <?php
                            if($_GET['err']==1)
                            {
                                echo "Registration number already taken";
                            }
                            if($_GET['err']==2)
                            {
                                echo "NAME FIELD CANNOT BE EMPTY";
                            }
                            if($_GET['err']==3)
                            {
                                echo "Registration number invalid";
                            }
                             if($_GET['err']==4)
                            {
                                echo "REGISTRATION NO. FIELD CANNOT BE EMPTY";
                            }
                             if($_GET['err']==5)
                            {
                                echo "EMAIL ID FIELD CANNOT BE EMPTY";
                            }
                             if($_GET['err']==6)
                            {
                                echo "PASSWORD FIELD CANNOT BE EMPTY";
                            }
                             if($_GET['err']==7)
                            {
                                echo "NUMBER FIELD CANNOT BE EMPTY";
                            }
                            if($_GET['err']==8)
                            {
                                echo "NUMBER MUST BE 10 DIGITS";
                            }
                            if($_GET['err']==9)
                            {
                                echo "PASSWORD MUST BE ATLEAST 6 CHARACTERS LONG";
                            }
                            if($_GET['err']==11)
                            {
                                echo "CAPTCHA IS WRONG";
                            }
                        ?>
                        <div class="g-recaptcha" data-sitekey="6LcAIjMUAAAAAKqwwfDQZemmD4P9dbDIj_dFvoLy"></div>
                        </div>
                        <center>
                        <button type="submit" class="btn btn-success" style="width: 40%">Submit</button>
                        </center>
                    </form>
                </div>
    </div>
    </div>
    </div>
    <div class="col-lg-4">
        </div>
    </div>
	</body>
</html>