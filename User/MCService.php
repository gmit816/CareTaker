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
                <h3>Manage Current Service</h3>
                <div class="col_1" style="margin-top: 48px;">
                    <div class="col-md-10 span_3" style='margin: auto;float: none;'>
                        <!--div class="bs-example1" data-example-id="contextual-table" style="height: auto;margin: auto;"-->
                        <?php
                        $RSelect="SELECT * FROM `receipt_master` WHERE User_id={$_SESSION['User_id']} AND Status != 3";
                        //$RRes=mysql_query($RSelect,$con);
                        //$RRow=mysql_fetch_assoc($RRes);
                        //echo $RRow['Receipt_id'];
                        if( !( $RRes = mysql_query( $RSelect ) ) ){
                            echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                        }
                        else {
                            if (mysql_num_rows($RRes) == 0) {
                                echo "<div class='bs-example1' data-example-id='contextual-table' style='height: auto;margin: auto;font-weight: 500;' align='center'>You haven't book any new Services yet!";
                                echo '</div>';
                            }
                            else {
                                $RRow=mysql_fetch_assoc($RRes);

                                if($RRow['Status']==0){
                                    $Status="Booked";
                                }
                                elseif($RRow['Status']==1)
                                {
                                    $Status="Booked and Confirmed";
                                }
                                else
                                {
                                    $Status="In Process";
                                }

                                $SSelect="SELECT Service_type FROM `service_master` WHERE Service_id='{$RRow['Service_id']}'";
                                $SResult=mysql_query($SSelect);
                                $SRow=mysql_fetch_assoc($SResult);

                                $ASelect="SELECT Area_name FROM `area_master` WHERE Area_id='{$RRow['Area_id']}'";
                                $AResult=mysql_query($ASelect);
                                $ARow=mysql_fetch_assoc($AResult);

                                $CSelect="SELECT City_name FROM `city_master` WHERE City_id='{$RRow['City_id']}'";
                                $CResult=mysql_query($CSelect);
                                $CRow=mysql_fetch_assoc($CResult);

                                $SPSelect="SELECT First_name, Last_name FROM `caretaker_master` WHERE Emp_id='{$RRow['Emp_id']}'";
                                $SPResult=mysql_query($SPSelect);
                                $SPRow=mysql_fetch_assoc($SPResult);
                                $SPName=$SPRow['First_name']." ".$SPRow['Last_name'];

                                echo "<div class='bs-example1' data-example-id='contextual-table' style='height: auto;margin: auto;'>";
                                    echo '<div class="col-sm-12" style="border-bottom: 1px solid;padding-bottom: 8px;">';
                                        echo '<div class="col-sm-3">Service Status :</div>';
                                        echo "<div class='col-sm-3' style='font-weight: 600;font-size: large'>{$Status}</div>";
                                        echo "<div class='col-sm-1'> </div>";
                                        echo "<div class='col-sm-2' align='right'>Booking Date :</div>";
                                        echo "<div class='col-sm-3' align='center' style='font-weight: 500'>{$RRow['Booking_date']}</div>";
                                    echo '</div>';
                                    echo '<div class="col-sm-12" style="padding-top: 12px;">';
                                        echo '<div class="col-sm-3">Service Requested :</div>';
                                        echo "<div class='col-sm-4'>{$SRow['Service_type']}</div>";

                                        echo '<div class="col-sm-2" align="right">Allotted Caretaker :</div>';
                                        echo "<div class='col-sm-3' align='center'><a href='CTProfile.php?id={$RRow['Emp_id']}'>{$SPName}</a></div>";
                                    echo '</div>';
                                    echo '<div class="col-sm-12" style="margin-top: 12px;">';
                                        echo '<div class="col-sm-3">Problem Description :</div>';
                                        echo "<div class='col-sm-5'>{$RRow['Problem_desc']}</div>";
                                    echo '</div>';
                                    echo '<div class="col-sm-12" style="margin-top: 12px; padding-bottom: 12px;">';
                                        echo "<div class='col-sm-3'>Customer's Address :</div>";
                                        echo "<div class='col-sm-5'>{$RRow['Address']}, {$ARow['Area_name']}, {$CRow['City_name']}</div>";
                                    echo '</div>';
                                    echo '<div class="col-sm-12" align="center" style="padding-top: 15px;border-top: 1px solid;margin-bottom: 16px;">';
                                        echo '<div class="col-sm-2"> </div>';
                                        echo '<div class="col-sm-3" align="right" style="padding-top: 8px;">Rating of Service :</div>';
                                        echo '<form class="form-horizontal" action="" method="post">';
                                        echo '<div class="col-sm-7">';
                                            echo '<div class="col-sm-3">';
                                                echo '<select class="form-control1" name="Rating" required="required">';
                                                    if($RRow['Rating']==1){
                                                        echo '<option value="">RATE SERVICE</option>';
                                                        echo '<option value="1" selected="selected">1</option>';
                                                        echo '<option value="2">2</option>';
                                                        echo '<option value="3">3</option>';
                                                        echo '<option value="4">4</option>';
                                                        echo '<option value="5">5</option>';
                                                    }
                                                    elseif($RRow['Rating']==2){
                                                        echo '<option value="">RATE SERVICE</option>';
                                                        echo '<option value="1">1</option>';
                                                        echo '<option value="2" selected="selected">2</option>';
                                                        echo '<option value="3">3</option>';
                                                        echo '<option value="4">4</option>';
                                                        echo '<option value="5">5</option>';
                                                    }
                                                    elseif($RRow['Rating']==3){
                                                        echo '<option value="">RATE SERVICE</option>';
                                                        echo '<option value="1">1</option>';
                                                        echo '<option value="2">2</option>';
                                                        echo '<option value="3" selected="selected">3</option>';
                                                        echo '<option value="4">4</option>';
                                                        echo '<option value="5">5</option>';
                                                    }
                                                    elseif($RRow['Rating']==4){
                                                        echo '<option value="">RATE SERVICE</option>';
                                                        echo '<option value="1">1</option>';
                                                        echo '<option value="2">2</option>';
                                                        echo '<option value="3">3</option>';
                                                        echo '<option value="4" selected="selected">4</option>';
                                                        echo '<option value="5">5</option>';
                                                    }
                                                    elseif($RRow['Rating']==5){
                                                        echo '<option value="">RATE SERVICE</option>';
                                                        echo '<option value="1">1</option>';
                                                        echo '<option value="2">2</option>';
                                                        echo '<option value="3">3</option>';
                                                        echo '<option value="4">4</option>';
                                                        echo '<option value="5" selected="selected">5</option>';
                                                    }
                                                    else{
                                                        echo '<option value="">RATE SERVICE</option>';
                                                        echo '<option value="1">1</option>';
                                                        echo '<option value="2">2</option>';
                                                        echo '<option value="3">3</option>';
                                                        echo '<option value="4">4</option>';
                                                        echo '<option value="5">5</option>';
                                                    }
                                                echo '</select>';
                                            echo '</div>';
                                            echo '<div class="col-sm-3" align="right" style="padding-top: 4px;">';
                                                echo '<input name="Submit" type="submit" class="btn btn-default" value="Save">';
                                            echo '</div>';
                                        echo '</div>';
                                        echo '</form>';
                                    echo '</div>';
                                    echo '<div class="col-sm-12" align="center">';
                                        echo '<div class="col-sm-12" style="margin-bottom: 8px;">In case of any inappropriate behaviour of Caretaker or inappropriate Service, Please Contact Us.</div>';
                                        echo '<a href="Feedback.php" class="btn btn-default">Contact</a>';
                                    echo '</div>';
                                    echo '<div class="clearfix"></div>';
                                    echo '</div>';
                                echo "</div>";

                                if(isset($_POST['Submit'])){
                                    $Update="UPDATE `receipt_master` SET Rating='{$_POST['Rating']}' WHERE Receipt_id='{$RRow['Receipt_id']}'";
                                    $Result=mysql_query($Update,$con);
                                    if($Result){
                                        echo "<script>document.location='MCService.php';</script>";
                                    }
                                    else{
                                        echo "<script>alert('Something went wrong, Please Rate again.');document.location='MCService.php';</script>";
                                    }
                                }
                            }
                        }
                        ?>
                            <!--div class="col-sm-12" style="border-bottom: 1px solid;padding-bottom: 8px;">
                                <div class="col-sm-3">Service Status :</div>
                                <div class="col-sm-1" style="font-weight: 700;font-size: large">Booked</div>
                                <div class="col-sm-3">&nbsp;</div>
                                <div class="col-sm-2" align="right">Booking Date :</div>
                                <div class='col-sm-3' align='center' style='font-weight: 500'>09/05/2016 00:00:00</div>
                            </div>
                            <div class="col-sm-12" style="padding-top: 12px;">
                                <div class="col-sm-3">Service Requested :</div>
                                <div class="col-sm-1">Plumbing</div>
                                <div class="col-sm-1">&nbsp;</div>
                                <div class="col-sm-3" align="right">Sub-Service Requested :</div>
                                <div class="col-sm-4" align="center">Tube-light Repair /Replacement</div>
                            </div>
                            <div class="col-sm-12" style="margin-top: 12px;">
                                <div class="col-sm-3">Problem Description :</div>
                                <div class="col-sm-5">I have detected a plumbing issue in my house, leakage in pipes of AC ducts .</div>
                            </div>
                            <div class="col-sm-12" style="margin-top: 12px;">
                                <div class="col-sm-3">Customer's Address :</div>
                                <div class="col-sm-5">203, Sahaj Residency, B/H Old Wadaj A.M.T.S. Bus Station, Ashram Road, Area Name, City Name</div>
                            </div>
                            <div class="col-sm-12" style="margin-top: 20px;padding-bottom: 12px;">
                                <div class="col-sm-3">Allotted Service Provider :</div>
                                <div class="col-sm-4"><a href="">Mit Gandhi</a></div>
                            </div>
                            <div class="col-sm-12" align="center" style="padding-top: 15px;border-top: 1px solid;">
                                <div class="col-sm-2"> </div>
                                <div class="col-sm-3">Rating of Service :</div>
                            </div-->
                            <!--div class="col-sm-12" style="margin-bottom: 10px;">
                                <div class="col-sm-3">Customer's Name :</div>
                                <div class="col-sm-4">Mit Gandhi</div>
                            </div>
                            <div class="col-sm-12" style="margin-bottom: 8px;margin-top: 20px;">
                                <div class="col-sm-3">SProvider's Name (SP's Id) :</div>
                                <div class="col-sm-4">Mit Gandhi (20)</div>
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-4" align="center">Grand Total</div>
                            </div-->
                            <!--div class="col-sm-12" style="margin-bottom: 10px;">
                                <div class="col-sm-3">Service Requested :</div>
                                <div class="col-sm-4">Plumbing</div>
                            </div-->
                            <!--div class="col-sm-12">
                                <div class="col-sm-3">Problem Description :</div>
                                <div class="col-sm-4">I have detected a plumbing issue in my house, leakage in pipes of AC ducts.</div>
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-4" align="center">
                                    <input type="submit" class="btn btn-default" name="Submit" value="Download Bill">
                                </div>
                            </div-->
                            <!--div class="clearfix"></div>
                            </div-->
                        <!--/div-->
                    </div>
                    <div class="clearfix"> </div>
                    <div class="copy_layout" style="margin-top: 32px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>