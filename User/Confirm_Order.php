<!DOCTYPE HTML>
<html style="background: #FFF;">
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>Book Service</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-left: 0px; min-height: 399px;">
        <div class="graphs">
            <div class="xs" style="margin-top: 88px;">
                <h3>Order Summary</h3>
                <div class="col_1" style="margin-top: 48px;">
                    <div class="col-md-10 span_3" style="margin: auto;float: none;">
                        <div class="bs-example1" data-example-id="contextual-table" style="height: auto;margin: auto;">
                            <?php

                            #$ssselect = "SELECT * FROM `subservice_master` WHERE Subservice_id='{$_POST['SService']}'";
                            #$ssRes = mysql_query($ssselect);
                            #$ssrow=mysql_fetch_assoc($ssRes);

                            $sselect = "SELECT * FROM `service_master` WHERE Service_id='{$_POST['Service']}'";
                            $sRes = mysql_query( $sselect );
                            $srow=mysql_fetch_assoc($sRes);

                            $cselect = "SELECT * FROM `city_master` WHERE City_id='{$_POST['City']}'";
                            $cRes = mysql_query( $cselect );
                            $crow=mysql_fetch_array($cRes);

                            $aselect = "SELECT * FROM `area_master` WHERE Area_id='{$_POST['Area']}'";
                            $aRes = mysql_query( $aselect );
                            $arow=mysql_fetch_assoc($aRes);

                            ?>
                            <form id="form1" name="form1" method="post">
                            <div class="col-sm-12" align="center" style="margin-bottom: 20px;">
                                <div class="col-sm-12">
                                    You're about to book sub-service <b><?php #echo $ssrow['Subservice_name']?></b> of service <b><?php echo $srow['Service_type']?></b> !
                                </div>
                                <!--input type="hidden" name="ESubService" value="<?php #echo $_POST['SService']?>"-->
                                <input type="hidden" name="EService" value="<?php echo $_POST['Service']?>">
                                <!--id: gmit816@gmail.com
                                password: Mitgandhi816
                                hash: 88444a3aa7f259626a3f65776d88343bbf8c2f2d

                                id: jayantgandhi25@gmail.com
                                password: Jayant25
                                hash: e503831555102dece3c50f2f8b5fcd6aa18a6b9e

                                id: nair.rahul15@gmail.com
                                password: Rahul123
                                hash: 25ba8345b2e215c399b629160f0bf1f94080cbcc

                                id: spj291996@gmail.com
                                password: Sharvik123
                                hash: 77d33cea693eb19e463f8d4a5541b563ed30a109
                                <?php
                                // Authorisation details.
                                /*$username = "jayantgandhi25@gmail.com";
                                $hash = "e503831555102dece3c50f2f8b5fcd6aa18a6b9e";

                                // Config variables. Consult http://api.textlocal.in/docs for more info.
                                $test = "0";

                                // Data for text message. This is the text message data.
                                $sender = "TXTLCL"; // This is who the message appears to be from.
                                $numbers = "910000000000"; // A single number or a comma-seperated list of numbers
                                $message = "This is a test message from the PHP API script.";
                                // 612 chars or less
                                // A single number or a comma-seperated list of numbers
                                $message = urlencode($message);
                                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                                $ch = curl_init('http://api.textlocal.in/send/?');
                                curl_setopt($ch, CURLOPT_POST, true);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                $result = curl_exec($ch); // This is the result from the API
                                curl_close($ch);*/
                                ?>
                                -->
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-2">
                                    For Address :
                                </div>
                                <div class="col-sm-4"><b><?php echo $_POST['Address']?>, <?php echo $arow['Area_name']?>, <?php echo $crow['City_name']?></b></div>
                                <input type="hidden" name="ECity" value="<?php echo $_POST['City']?>">
                                <input type="hidden" name="EArea" value="<?php echo $_POST['Area']?>">
                                <input type="hidden" name="Address1" value="<?php echo $_POST['Address']?>">
                                <div class="col-sm-2"> </div>
                                <div class="col-sm-4" align="center">
                                    <div class="col-sm-12">Minimum Charges will be</div>
                                    <div class="col-sm-12" style="border: 1px solid;margin-top: 8px;padding-top: 4px;padding-bottom: 4px;"><b><?php echo $srow['Service_fees']?> Rs.</b>/ Hour<br> Consultancy Charges (Excluding Tax)</div>
                                </div>
                            </div>
                            <div class="col-sm-12" style="margin-top: 8px;">
                                <div class="col-sm-2">
                                    Problem Description :
                                </div>
                                <div class="col-sm-10">
                                    <?php echo $_POST['Problem']?>
                                    <input type="hidden" name="EProblem" value="<?php echo $_POST['Problem']?>">
                                </div>
                            </div>
                                <input type="hidden" name="CCharge" value="<?php echo $srow['Service_fees']?>">
                            <div class="col-sm-12" align="center" style="margin-top: 24px;margin-bottom: 16px;">
                                Are you sure about booking ?
                            </div>
                            <div class="col-sm-12" align="center">
                                <div class="col-sm-3"> </div>
                                <div class="col-sm-2" align="right">
                                    <button type="submit" name="Edit" formaction="Book_Service.php" class="btn btn-default">Edit !</button>
                                </div>
                                <div class="col-sm-2" align="center">
                                    <button type="submit" name="Book" formaction="Utility_Book.php" class="btn btn-default">Book it !</button>
                                </div>
                                <div class="col-sm-2" align="left">
                                    <!--input type="button" class="btn btn-default" value="Cancel"-->
                                    <a href="Book_Service.php" class="btn btn-default">Back</a>
                                </div>
                            </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"> </div>
                        <div class="copy_layout">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>