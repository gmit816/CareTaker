<!DOCTYPE HTML>
<html>
<?php
require_once("Navigation.php");
?>
<head>
    <title>Service Manage</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-top: 98px;">
        <div class="graphs">
            <div class="xs">
                <h3>Create Service</h3>
                <div class="tab-content" style="margin-top: 80px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal" action="Utility_Service.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="col-sm-2">&nbsp;</div>
                                    <label for="focusedinput" class="col-sm-2 control-label">Service Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control1" name="Service" id="Service" placeholder="Half-day" required="required">
                                    </div>
                                </div>
                                <!--div class="col-sm-12" style="margin-top: 8px;">
                                    <div class="col-sm-2">&nbsp;</div>
                                    <label for="focusedinput" class="col-sm-2 control-label">Service Icon:</label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control1" name="Icon" id="Icon">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 8px;">
                                    <div class="col-sm-2">&nbsp;</div>
                                    <label for="focusedinput" class="col-sm-2 control-label">Description:</label>
                                    <div class="col-sm-4">
                                        <textarea rows="8" class="form-control1" name="Desc" id="Service" style="resize: none;height: auto;"></textarea>
                                    </div>
                                </div-->
                                <div class="col-sm-12" style="margin-top: 8px;">
                                    <div class="col-sm-2">&nbsp;</div>
                                    <label for="focusedinput" class="col-sm-2 control-label">Service Fees<br> per Hour:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control1" name="Fees" id="Fees" placeholder="30" required="required">
                                    </div>
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