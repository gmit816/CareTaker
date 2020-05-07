<!DOCTYPE HTML>
<html style="background: #FFF;">
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>SProvider Dashboard</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-left: 0px; min-height: 399px;">
        <div class="graphs">
            <div class="xs" style="margin-top: 80px;">
                <div class="tab-content col_3">
                    <div class="tab-pane active" id="horizontal-form">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <a class="tiles_info" href="MCService.php">
                                <div class="tiles-body fb2" style="background-color: #3e6267;padding-top: 90px;padding-bottom: 90px;margin-top: 20px;margin-bottom: 20px;">
                                    <div class="text-center" style="font-size: 24px;">Manage Current Service</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <a class="tiles_info" href="VPServices.php">
                                <div class="tiles-body fb2" style="background-color: #3e6267;padding-top: 90px;padding-bottom: 90px;margin-top: 20px;margin-bottom: 20px;">
                                    <div class="text-center" style="font-size: 24px;">View Previous Services</div>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"> </div>

            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Bootstrap Core JavaScript -->
</body>
</html>
