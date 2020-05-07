<!DOCTYPE html>
<!--[if lt IE 7]><html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Always force latest IE rendering engine -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Meta Keyword -->
    <meta name="keywords" content="one page, business template, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <title>Sign-Up</title>
    <link rel="shortcut icon" href="">
    <!--Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/normalize_login_signup.css">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style_login_signup.css">
    <link rel="stylesheet" href="css/bootstrap.min_visitor.css">
    <link rel="stylesheet" href="css/main_visitor.css">
    <?php
    require("connection.php");

    if(isset($_POST['submit'])){
        $First_Name=trim($_POST['First_Name']);
        $Last_Name=trim($_POST['Last_Name']);
        $Email_ID=trim($_POST['Email_ID']);
        $Contact=trim($_POST['Contact']);
        $Password=$_POST['Password'];
        $RPassword=$_POST['RPassword'];
        $mit=0;
        if($First_Name==""){
            $Message = "Please Enter First Name";
            $mit=1;
        }
        elseif($Email_ID==""){
            $Message = "Please Enter your Email Id";
            $mit=2;
        }
        elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $Email_ID)){
            $Message = "Please Enter Valid Email Address";
            $mit=3;
        }
        elseif($Contact == "") {
            $Message = "Please Enter Contact Number";
            $mit=4;
        }
        elseif(is_numeric(trim($Contact)) == false){
            $Message = "Please Enter Valid Contact Number";
            $mit=5;
        }
        elseif(strlen($Contact)<10){
            $Message = "Contact Number must be of 10 digits.";
            $mit=6;
        }
        elseif($Password == ""){
            $Message = "Please Enter Password";
            $mit=7;
        }
        elseif(strlen($Password)<6){
            $Message = "Password should be of at least 6 characters";
            $mit=8;
        }
        elseif($RPassword == "") {
            $Message = "Please Re-Enter Password";
            $mit=9;
        }
        elseif($Password != $RPassword){
            $Message = "Password doesn't match!";
            $mit=10;
        }
        else {
            $sql="INSERT INTO `user_master`(`First_name`, `Last_name`, `Email_ID`, `Contact_no`, `Password`, `Time_Stamp`) VALUES ('$First_Name','$Last_Name','$Email_ID','$Contact','$Password',NOW())";
            $r=mysql_query($sql,$con);
            if($r){
                echo "<script>alert('Welcome to CareTaker! Please proceed for Log In.');document.location='index.php';</script>";
            }
            else{
                echo"<script>alert('You are already registered! Please proceed for Log In.');document.location='index.php';</script>";
            }
        }
    }
    ?>
    <style>
        .message{
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<header id="navigation" class="navbar-fixed-top" style="background-color: rgba(71, 130, 139, 1);">
    <div class="container" style="border-bottom-width: 0px;width: auto;">
        <div class="navbar-header" style="margin-top: 4px;">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->
            <!-- logo -->
            <a href="index.php">
                <img src="images/CT%20LOGO.png" alt="CareTaker" height="90" width="240">
            </a>
            <!-- /logo -->
        </div>
        <!-- main nav -->
        <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
            <ul id="nav" class="nav navbar-nav">
                <li class="current"><a href="SignUp.php">Sign Up</a></li>
                <li><a href="index.php">Log In</a></li>
            </ul>
        </nav>
        <!-- /main nav -->
    </div>
</header>
<div class="logmod" style="margin-top: 88px;">
    <div class="logmod__wrapper">
        <div class="logmod__container">
            <ul class="logmod__tabs">
                <li data-tabtar="lgm-1"><!--a href="#" style="width: 550px;"><center>User</center></a--></li>
            </ul>
            <div class="logmod__tab-wrapper">
                <div class="logmod__tab lgm-1">
                    <div class="logmod__heading">
                        <span class="logmod__heading-subtitle">Enter your Personal Details <strong>to Create An Account!</strong></span>
                    </div>
                    <div class="logmod__form">
                        <form accept-charset="utf-8" action="" method="post" class="simform">
                            <div class="sminputs">
                                <div class="input string optional" style="padding-top: 5px;padding-bottom: 0px;">
                                    <label class="string optional" for="user-pw" style="margin-bottom: 0px;">First Name *</label>
                                    <input class="string optional" maxlength="16" placeholder="Mit" name="First_Name" type="text" size="50" value="<?php if(isset($First_Name)){echo "$First_Name";}?>" style="height: 24px;" required="required"/>
                                    <?php
                                    if(isset($Message) && $mit==1){
                                        echo "<p class='message'>".$Message."</p>";
                                    }
                                    ?>
                                </div>
                                <div class="input string optional" style="padding-top: 5px;padding-bottom: 0px;">
                                    <label class="string optional" for="user-pw-repeat" style="margin-bottom: 0px;">Last Name</label>
                                    <input class="string optional" maxlength="16" id="user-pw-repeat" placeholder="Gandhi" name="Last_Name" type="text" value="<?php if(isset($Last_Name)){echo "$Last_Name";}?>" size="50" style="height: 24px;"/>
                                </div>
                            </div>
                            <div class="sminputs">
                                <div class="input full" style="padding-top: 5px;padding-bottom: 0px;">
                                    <label class="string optional" style="margin-bottom: 0px;">Email Id *</label>
                                    <input class="string optional" maxlength="32" placeholder="gmit816@gmail.com" name="Email_ID" type="email" value="<?php if(isset($Email_ID)){echo "$Email_ID";}?>" size="50" title="Email Address must contain '@','.'!" style="height: 24px;" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" required="required"/>
                                    <?php
                                    if(isset($Message) && $mit==2) {
                                        echo "<p class='message'>".$Message."</p>";
                                    }
                                    elseif(isset($Message) && $mit==3){
                                        echo "<p class='message'>".$Message."</p>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="sminputs">
                                <div class="input full" style="padding-top: 5px;">
                                    <label class="string optional" style="margin-bottom: 0px;">Contact Number *</label>
                                    <div class="input full" style="width: 500px;padding-top: 0px;height: 24px;padding-bottom: 0px;padding-left: 0px;border-right: 0px;">
                                        <div class="input string optional" style="width: 50px;padding: 0px;height: 24px;border-right: 0px;">
                                            <label class="string optional" style="margin-top: 1px; width: 35px;">+91</label>
                                        </div>
                                        <div class="input string optional" style="padding: 0px;height: 24px;border-right: 0px;margin-top: 0px;width: 400px;">
                                            <input class="string optional" maxlength="10" placeholder="9409056375" type="text" name="Contact" value="<?php if(isset($Contact)){echo "$Contact";}?>" size="35" style="height: 24px;width: 200px;" pattern="\d*" title="Contact Number must be of 0-9" required="required"/>
                                        </div>
                                        <?php
                                        if(isset($Message) && $mit==4){
                                            echo "<p class='message'>".$Message."</p>";
                                        }
                                        elseif(isset($Message) && $mit==5){
                                            echo "<p class='message'>".$Message."</p>";
                                        }
                                        elseif(isset($Message) && $mit==6){
                                            echo "<p class='message'>".$Message."</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="sminputs">
                                <div class="input string optional" style="padding-top: 5px;padding-bottom: 0px;">
                                    <label class="string optional" style="margin-bottom: 0px;" for="user-pw">Password *</label>
                                    <input class="string optional" maxlength="32" name="Password" id="Password" placeholder="Password" type="password" value="<?php if(isset($Password)){echo "$Password";}?>" size="50" style="height: 24px;" pattern=".{6,}" title="Minimum 6 characters required!" autocomplete="off" required="required"/>
                                    <?php
                                    if(isset($Message) && $mit==7){
                                        echo "<p class='message'>".$Message."</p>";
                                    }
                                    elseif(isset($Message) && $mit==8){
                                        echo "<p class='message'>".$Message."</p>";
                                    }
                                    ?>
                                </div>
                                <div class="input string optional" style="padding-top: 5px;padding-bottom: 0px;">
                                    <label class="string optional" for="user-pw-repeat" style="margin-bottom: 0px;">Repeat Password *</label>
                                    <input class="string optional" maxlength="32" name="RPassword" id="RPassword" placeholder="Repeat password" type="password" size="50" style="height: 24px;" pattern=".{6,}" title="Minimum 6 characters required!" autocomplete="off" required="required"/>
                                    <?php
                                    if(isset($Message) && $mit==9) {
                                        echo "<p class='message'>".$Message."</p>";
                                    }
                                    elseif(isset($Message) && $mit==10){
                                        echo "<p class='message'>".$Message."</p>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="simform__actions">
                                <input class="sumbit" name="submit" value="Create Account !" type="submit" />
                                <span class="simform__actions-sidetext">By creating an Account you agree to our <a class="special" href="#" target="_blank" role="link">Terms & Conditions</a></span>
                            </div>
                            <div class="simform__actions" style="padding-top: 0px;">
                                <span class="simform__actions"><center>Already a registered User? <a class="special" href="index.php" role="link">Click HERE</a> to Log-In!</center></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script-->
<script src="js/login_jquery.min.js"></script>
<script src="js/index_login_signup.js"></script>
</body>
</html>