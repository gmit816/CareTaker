<!DOCTYPE HTML>
<html style="background: #FFF;">
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>Current Service</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-left: 0px; min-height: 399px;">
        <div class="graphs">
            <div class="xs" style="margin-top: 80px;">
                <h3>Caretaker's Profile</h3>
                <?php
                $SPSelect="SELECT * FROM `caretaker_master` WHERE Emp_id='{$_GET['id']}'";
                $SPResult=mysql_query($SPSelect,$con);
                $SPRow=mysql_fetch_assoc($SPResult);

                $Name=$SPRow['First_name']." ".$SPRow['Last_name'];

                $SSelect="SELECT Service_type FROM `service_master` WHERE Service_id='{$SPRow['Service_id']}'";
                $SResult=mysql_query($SSelect,$con);
                $SRow=mysql_fetch_assoc($SResult);

                $ASelect="SELECT Area_name FROM `area_master` WHERE Area_id='{$SPRow['Area_id']}'";
                $AResult=mysql_query($ASelect,$con);
                $ARow=mysql_fetch_assoc($AResult);

                $CSelect="SELECT City_name FROM `city_master` WHERE City_id='{$SPRow['City_id']}'";
                $CResult=mysql_query($CSelect,$con);
                $CRow=mysql_fetch_assoc($CResult);
                ?>
                <div class="col_1" style="margin-top: 48px;">
                    <div class="col-md-8 span_3" style='margin: auto;float: none;'>
                        <div class='bs-example1' data-example-id='contextual-table' style='height: auto;margin: auto;'>
                            <div class="col-sm-12" style="margin-bottom: 20px;">
                                <div class="col-sm-3">Service Provider's Id :</div>
                                <div class="col-sm-1" style="font-weight: 600"><?php echo $SPRow['Emp_id'];?></div>
                                <div class="col-sm-5"> </div>
                                <div class="col-sm-2">
                                    <img src="../images/<?php echo $SPRow['Profile_image']?>" style="width: 100px;">
                                </div>
                            </div>
                            <div class="col-sm-12" style="margin-bottom: 20px;">
                                <div class="col-sm-3">Caretaker Name :</div>
                                <div class="col-sm-4" style="font-weight: 600"><?php echo $Name;?></div>
                                <div class="col-sm-3">CareTaker Score :</div>
                                <div class="col-sm-1" style="font-weight: 600"><?php echo $SPRow['Points'];?></div>
                            </div>
                            <div class="col-sm-12" style="margin-bottom: 12px;">
                                <div class="col-sm-3">Expertise Service :</div>
                                <div class="col-sm-4"><?php echo $SRow['Service_type']?></div>
                                <div class="col-sm-2">Belongs to :</div>
                                <div class="col-sm-3"><?php echo $ARow['Area_name']?>, <?php echo $CRow['City_name']?></div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-3">Email Address :</div>
                                <div class="col-sm-5" style="font-weight: 600"><?php echo $SPRow['Email_ID'];?></div>
                            </div>
                            <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="copy_layout" style="margin-top: 32px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>