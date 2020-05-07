<!DOCTYPE HTML>
<html>
<?php
require_once("Navigation.php");
?>
<head>
    <title>City Manage</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-top: 98px;">
        <div class="graphs">
            <div class="xs">
                <h3>Add City</h3>
                <div class="tab-content" style="margin-top: 80px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal" action="Utility_City.php" method="post">
                            <div class="form-group">
                                <div class="col-sm-2">&nbsp;</div>
                                <label for="focusedinput" class="col-sm-2 control-label">City Name:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control1" name="City" id="City" placeholder="Ahmedabad" required="required">
                                </div>
                                <div class="col-sm-12" align="center" style="margin-top: 40px;">
                                    <input type="submit" class="btn btn-default" name="Submit" value="Add" style="width: 100px;">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="copy_layout">

                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Nav CSS -->
</body>
</html>