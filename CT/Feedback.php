<!DOCTYPE HTML>
<html>
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>Send Feedback</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-left: 0px; min-height: 399px;">
        <div class="graphs">
            <div class="xs" style="margin-top: 88px;">
                <h3>Contact Us !</h3>
                <div class="tab-content col_3" style="margin-top: 24px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal" action="Utility_Feedback.php" method="post">
                            <div class="form-group">
                                <div class="col-sm-12" style="margin-bottom: 24px;">
                                    <div class="col-sm-3"> </div>
                                    <div class="col-sm-6" align="center" style="font-weight: 300">
                                        Do you have any Question?? Feel free to ask, Just send us an E-mail with the help of the Below Form.
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-2">&nbsp;</div>
                                    <div class="col-sm-1" align="center">
                                        <label for="focusedinput" class="control-label" style="margin-top: 10px;">Subject* :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control1" name="Subject" id="Subject" placeholder="Subject" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 8px;">
                                    <div class="col-sm-2">&nbsp;</div>
                                    <div class="col-sm-1" align="center">
                                        <label for="focusedinput" class="control-label" style="margin-top: 60px;">Questions / Remarks* :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea rows="8" class="form-control1" name="Message" id="Message" placeholder="Message" style="resize: none;height: auto;" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12" align="center" style="margin-top: 40px;">
                                    <input type="submit" class="btn btn-default" name="Submit" value="Send" style="width: 100px;">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="copy_layout">
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Bootstrap Core JavaScript -->
</body>
</html>