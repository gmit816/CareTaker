<?php
session_start();
if(!isset($_SESSION["First_name"])){
echo "<script>alert('You are suppose to Log In first.');document.location='../index.php';</script>";
}
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link rel="shortcut icon" href="">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>
    <!----webfonts--->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!---//webfonts--->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Nav CSS -->
    <link href="../css/custom.css" rel="stylesheet">
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>
    <script src="../js/custom.js"></script>
    <!-- Graph JavaScript -->
</head>
<!-- Navigation -->
<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;border-bottom-width: 0px;height: 98px;position: fixed;right: 0;left: 0;z-index: 1030;top: 0;">
    <div class="navbar-header" style="margin-top: 4px;">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php" style="padding-top: 0px; padding-left: 0px;"><img src="../images/CT%20LOGO.png" height="90" width="240"></a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="index.php" aria-expanded="false" style="display: block;margin-top: 20px;margin-right: 20px;<?php if(basename($_SERVER['PHP_SELF'])=="index.php"){ echo "color: #CCCCCC";}?>">
                Home
            </a>
        </li>
        <li class="dropdown sidebar" style="margin-top: 20px;width: auto;">
            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown" style="width: auto; padding-left: auto;"><?php echo $_SESSION["First_name"];?><span class="fa arrow" style="margin-top: 20px;margin-left: 10px;"></span></a>
            <ul class="dropdown-menu">
                <li class="dropdown-menu-header text-center">
                    <strong>Settings</strong>
                </li>
                <li class="m_2"><a href="MProfile.php"><i class="fa fa-user"></i>Manage Profile</a></li>
                <li class="m_2"><a href="Password_Change.php"><i class="fa fa-wrench"></i>Change Password</a></li>
                <li class="m_2"><a href="../Logout.php"><i class="fa fa-lock"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
    <div class="navbar-default sidebar" role="navigation" style="margin-top: 98px;">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-flask nav_icon"></i>Manage City / Area<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="City_Manage.php">City</a>
                        </li>
                        <li>
                            <a href="Area_Manage.php">Area</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="Service_Manage.php"><i class="fa fa-flask nav_icon"></i>Manage Service</a>
                </li>
                <!--li>
                    <a href="Subservice_Manage.php"><i class="fa fa-flask nav_icon"></i>Manage Sub-Service</a>
                </li-->
                <li>
                    <a href="CareTaker_Manage.php"><i class="fa fa-flask nav_icon"></i>Manage Caretaker</a>
                </li>
                <li>
                    <a href="View_Order.php"><i class="fa fa-indent nav_icon"></i>View Orders</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-envelope nav_icon "></i>User Feedback<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="Feedback_View.php">Pending Feedbacks</a>
                        </li>
                        <li>
                            <a href="RFeedback_View.php">Replied Feedbacks</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!--li>
                    <a href="Content_Manage.php"><i class="fa fa-flask nav_icon"></i>Manage Content</a>
                </li-->
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>