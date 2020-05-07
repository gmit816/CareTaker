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
    <title>Log-In</title>
    <link rel="shortcut icon" href="images/icon.jpg">
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
    <div class="container" style="border-bottom-width: 0px;width: auto;">
        <div class="navbar-header">
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
                <img src="images/logo.jpeg" alt="HomeHelpers">
            </a>
            <!-- /logo -->
        </div>
        <!-- main nav -->
        <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
            <ul id="nav" class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#service">Services</a></li>
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php#pricing">Pricing</a></li>
                <li><a href="SignUp.php">Sign Up</a></li>
                <li class="current"><a href="LogIn.php">Log In</a></li>
                <li><a href="index.php#contact">Contact</a></li>
            </ul>
        </nav>
        <!-- /main nav -->
    </div>
</header>
    <div class="logmod" style="margin-top: 88px;">
        <div class="logmod__wrapper">
            <div class="logmod__container">
                <ul class="logmod__tabs">
                    <li data-tabtar="lgm-1"><a href="#">User</a></li>
                    <li data-tabtar="lgm-2"><a href="#">Service Provider</a></li>
                </ul>
                <div class="logmod__tab-wrapper">
                    <div class="logmod__tab lgm-1">
                        <div class="logmod__heading">
                            <span class="logmod__heading-subtitle">Enter your E-mail and Password <strong>to Log-In!</strong></span>
                        </div>
                        <div class="logmod__form">
                            <form accept-charset="utf-8" action="Utility_Login.php?type=User" method="post" class="simform">
                                <div class="sminputs">
                                    <div class="input full">
                                        <label class="string optional" style="margin-bottom: 0px;">Email Id*</label>
                                        <input class="string optional" maxlength="32" name="Email_ID" placeholder="Email" type="email" size="50" style="height: 32px;" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Email Address must contain '@','.'!"/>
                                    </div>
                                </div>
                                <div class="sminputs">
                                    <div class="input full">
                                        <label class="string optional" for="user-pw" style="margin-bottom: 0px;">Password *</label>
                                        <input class="string optional" maxlength="32" name="Password" placeholder="Password" type="password" size="50" style="height: 32px; width: 444px;" required="required" pattern=".{6,}" title="Minimum 6 characters required!" autocomplete="off"/>
                                        <span class="hide-password">Show</span>
                                    </div>
                                </div>
                                <div class="simform__actions">
                                    <input class="sumbit" name="submit_user" type="submit" value="Log In" />
                                    <span class="simform__actions-sidetext">
                                        <a class="special" role="link" href="FPassword.php?type=User">Forgot your password?</a>
                                    </span>
                                </div>
                                <div class="simform__actions">
                                    <span class="simform__actions"><center>New to HomeHelpers? <a class="special" href="SignUp.php" role="link">Click HERE</a> to Sign-Up!</center></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="logmod__tab lgm-2">
                        <div class="logmod__heading">
                            <span class="logmod__heading-subtitle">Enter your E-mail and Password <strong>to Log-In!</strong></span>
                        </div>
                        <div class="logmod__form">
                            <form accept-charset="utf-8" action="Utility_Login.php?type=SP" method="post" class="simform">
                                <div class="sminputs">
                                    <div class="input full">
                                        <label class="string optional" style="margin-bottom: 0px;">Email Id*</label>
                                        <input class="string optional" maxlength="32" name="Email_ID" placeholder="Email" type="email" size="50" style="height: 32px;" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Email Address must contain '@','.'!" />
                                    </div>
                                </div>
                                <div class="sminputs">
                                    <div class="input full">
                                        <label class="string optional" for="user-pw" style="margin-bottom: 0px;">Password *</label>
                                        <input class="string optional" maxlength="32" name="Password" placeholder="Password" type="password" size="50" style="height: 32px; width: 444px;"  required="required" pattern=".{6,}" title="Minimum 6 characters required!" autocomplete="off"/>
                                        <span class="hide-password">Show</span>
                                    </div>
                                </div>
                                <div class="simform__actions">
                                    <input class="sumbit" name="submit_sp" type="submit" value="Log In" />
                                    <span class="simform__actions-sidetext">
                                        <a class="special" role="link" href="FPassword.php?type=SP">Forgot your password?</a>
                                    </span>
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