<!DOCTYPE HTML>
<html>
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>User Feedback</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-top: 98px;">
        <div class="graphs">
            <div class="xs">
                <h3>Feedback Reply</h3>
                <div class="tab-content" style="margin-top: 80px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <?php
                        $id=$_GET['id'];
                        $selectSQL = mysql_query("SELECT * FROM `feedback_master` WHERE `Feedback_id`=$id");
                        # Execute the SELECT Query
                        if( !$selectSQL ){
                            echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                        }
                        else{
                            $row= mysql_fetch_row($selectSQL);
                        ?>
                        <form class="form-horizontal" action="Utility_Message_Send.php" method="post">
                            <div class="form-group">
                                <hr>
                                <input type="hidden" name="mit" value="<?php echo $id;?>">
                                <label class="col-sm-3" align="center">Recipient's Email Id : </label>
                                <div class="col-sm-7">
                                    <input type="text" name="REmail_ID" value="<?php echo $row[1];?>" class="form-control1 control3">
                                </div>
                                <div class="col-sm-1">&nbsp;</div>
                                <label class="col-sm-3" align="center">Subject : </label>
                                <div class="col-sm-7">
                                    <input type="text" name="Subject" value="<?php echo $row[3];?>" class="form-control1 control3">
                                </div>
                                <div class="col-sm-1">&nbsp;</div>
                                <label class="col-sm-3" align="center">Message : </label>
                                <div class="col-sm-7">
                                    <textarea rows="8" name="Message" class="form-control1 control3" style="resize: none; height: auto">Hello <?php echo $row[1];?>,&#13;&#10;</textarea>
                                </div>
                                <div class="col-sm-12" align="center" style="margin-top: 40px;">
                                    <input type="submit" class="btn btn-warning btn-warng1" name="submit" value="Send" style="width: 100px;">
                                </div>
                                <!--div id="editable-content" class="form-control1 control3 col-sm-7" style="height: auto;width: 610px;padding-left: 8px;margin-left: 16px;">
                                    <span id="block1" class="editable col-sm-12" contenteditable="true"><br><br></span>
                                    <br>
                                    <span id="block2" class="non-editable col-sm-12" style="color: #22BAA0">On <?php //echo $row[4];?> , <?php //echo $row[1];?> wrote : <br> "<?php //echo $row[3];?>"</span>
                                    <br>
                                </div-->
                                <div class="clearfix"></div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
                <div class="copy_layout">

                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
</body>
</html>