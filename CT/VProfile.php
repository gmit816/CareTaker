<!DOCTYPE HTML>
<html style="background-color: #FFF;">
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>View Profile</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-left: 0px; min-height: 399px;">
        <div class="graphs">
            <div class="xs" style="margin-top: 88px;">
                <h3>View Profile</h3>
                <?php
                    $SPSelect="SELECT * FROM `caretaker_master` WHERE Emp_id='{$_SESSION['User_id']}'";
                    $SPResult=mysql_query($SPSelect,$con);
                    $SPRow=mysql_fetch_assoc($SPResult);

                    $SSelect="SELECT Service_type FROM `service_master` WHERE Service_id='{$SPRow['Service_id']}'";
                    $SResult=mysql_query($SSelect,$con);
                    $SRow=mysql_fetch_assoc($SResult);

                    $CSelect="SELECT City_name FROM `city_master` WHERE City_id='{$SPRow['City_id']}'";
                    $CResult=mysql_query($CSelect,$con);
                    $CRow=mysql_fetch_assoc($CResult);

                    $ASelect="SELECT Area_name FROM `area_master` WHERE Area_id='{$SPRow['Area_id']}'";
                    $AResult=mysql_query($ASelect,$con);
                    $ARow=mysql_fetch_assoc($AResult);
                ?>
                <div class="tab-content col_3" style="margin-top: 24px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <div class="col-sm-10" style="margin-bottom: 12px;">
                            <div class="col-sm-2"> </div>
                            <div class="col-sm-10" style="padding-bottom: 8px;">
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-2">Employee Id :</div>
                                <div class="col-sm-2" style="font-weight: 600"><?php echo $SPRow['Emp_id'];?></div>
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-3">CareTaker Points :</div>
                                <div class="col-sm-2" style="padding-top: 10px;font-weight: 600;" align="center"><?php echo $SPRow['Points'];?></div>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="col-sm-2"> </div>
                            <div class="col-sm-10">
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-2"><img src="../images/<?php echo $SPRow['Profile_image']?>" width="75"></div>
                                <div class="col-sm-3" style="padding-top: 30px;"><?php echo $SPRow['First_name']." ".$SPRow['Last_name'];?></div>

                                <div class="col-sm-2">Email Id :</div>
                                <div class="col-sm-2"><?php echo $SPRow['Email_ID'];?></div>
                            </div>
                        </div>
                        <div class="col-sm-10" style="margin-top: 12px;">
                            <div class="col-sm-2"> </div>
                            <div class="col-sm-10">
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-2">Expertise In :</div>
                                <div class="col-sm-2"><?php echo $SRow['Service_type'];?></div>
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-2">Working Area :</div>
                                <div class="col-sm-4"><?php echo $ARow['Area_name'];?>, <?php echo $CRow['City_name'];?></div>
                            </div>
                        </div>
                        <div class="col-sm-10" style="margin-bottom: 12px;margin-top: 12px;">
                            <div class="col-sm-2"> </div>
                            <div class="col-sm-10"  style="border-bottom: 1px solid;padding-bottom: 24px;">
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-2">Contact Number :</div>
                                <div class="col-sm-2" style="padding-top: 12px;"><?php echo $SPRow['Contact_no'];?></div>
                            </div>
                        </div>
                        <div class="col-sm-10" align="center">
                            <div class="col-sm-2"> </div>
                            Want to change something? Ask Admin to do so!
                        </div>
                        <div class="col-sm-10" align="center" style="padding-top: 8px;">
                            <div class="col-sm-2"> </div>
                            <a href="Feedback.php" class="btn btn-default">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="copy_layout" style="margin-top: 32px;">

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