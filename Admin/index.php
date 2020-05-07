<!DOCTYPE HTML>
<html>
<?php
require_once("Navigation.php");
require("../connection.php");
?>
<head>
    <title>Admin Dashboard</title>
    <script src="../js/d3.v3.js"></script>
    <script src="../js/rickshaw.js"></script>
    <link rel="stylesheet" href="../css/clndr.css" type="text/css" />
    <script src="../js/underscore-min.js" type="text/javascript"></script>
    <script src= "../js/moment-2.2.1.js" type="text/javascript"></script>
    <script src="../js/clndr.js" type="text/javascript"></script>
    <script src="../js/site.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-top: 98px;">
        <div class="graphs">
            <div class="col_3">
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-thumbs-up icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>45</strong></h5>
                            <span>New Orders</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-users user1 icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>109</strong></h5>
                            <span>Login Attempts</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>1012</strong></h5>
                            <span>New Users</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>Rs. 4500</strong></h5>
                            <span>Earning Today</span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="content_bottom">
                <div class="col-md-12">
                    <div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
                </div>

                <div class="clearfix"> </div>
            </div>
            <div class="copy">
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
</body>
</html>