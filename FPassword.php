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
    <title>Forget Password</title>
    <link rel="shortcut icon" href="">
    <!--Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/normalize_login_signup.css">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style_login_signup.css">
    <link rel="stylesheet" href="css/bootstrap.min_visitor.css">
    <link rel="stylesheet" href="css/main_visitor.css">
</head>
<body>
<header id="navigation" class="navbar-fixed-top" style="background-color: rgba(71, 130, 139, 1);">
    <div class="container" style="width: auto; border-bottom-width: 0px;">
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
                <li><a href="SignUp.php">Sign Up</a></li>
                <li class="current"><a href="index.php">Log In</a></li>
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
                        <span class="logmod__heading-subtitle">Forget your Password?! <strong>Get it with this form!</strong></span>
                    </div>
                    <div class="logmod__form">
                        <form accept-charset="utf-8" action="Mail_Send.php" method="post" class="simform">
                            <div class="sminputs">
                                <div class="input full" style="padding-top: 5px;padding-bottom: 0px;">
                                    <label class="string optional" style="margin-bottom: 0px;">Email *</label>
                                    <input class="string optional" maxlength="32" placeholder="gmit816@gmail.com" name="Email_ID" type="text" value="<?php if(isset($Email_ID)){echo "$Email_ID";}?>" size="50" style="height: 24px;" required="required"/>
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
                                            <input class="string optional" maxlength="10" placeholder="9409056375" type="text" name="Contact" value="<?php if(isset($Contact)){echo "$Contact";}?>" size="35" style="height: 24px;width: 200px;" required="required"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="Type" value="<?php echo $_GET['type'];?>">
                            <div class="simform__actions" style="width: 380px;">
                                <input class="sumbit" name="FSubmit" type="submit"/>
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