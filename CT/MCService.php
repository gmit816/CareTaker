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
                    if(!isset($_GET['id'])) {
                        $RSelect = "SELECT * FROM `receipt_master` WHERE Emp_id={$_SESSION['User_id']} AND Status != 3";
                        //$RRes=mysql_query($RSelect,$con);
                        //$RRow=mysql_fetch_assoc($RRes);
                        //echo $RRow['Receipt_id'];
                        if (!($RRes = mysql_query($RSelect))) {
                            echo 'Retrieval of data from Database Failed - #' . mysql_errno() . ': ' . mysql_error();
                        } else {
                            if (mysql_num_rows($RRes) == 0) {
                                echo "<div class='bs-example1' data-example-id='contextual-table' style='height: auto;margin: auto;font-weight: 500;' align='center'>You haven't got any new order yet!";
                                echo '</div>';
                            } else {
                                $RRow = mysql_fetch_assoc($RRes);

                                if ($RRow['Status'] == 0) {
                                    $Status = "Booked";
                                } elseif ($RRow['Status'] == 1) {
                                    $Status = "Booked and Confirmed";
                                } elseif ($RRow['Status'] == 2) {
                                    $Status = "In Process";
                                } else {
                                    $Status = "Completed";
                                }

                                $ASelect = "SELECT Area_name FROM `area_master` WHERE Area_id='{$RRow['Area_id']}'";
                                $AResult = mysql_query($ASelect);
                                $ARow = mysql_fetch_assoc($AResult);

                                $CSelect = "SELECT City_name FROM `city_master` WHERE City_id='{$RRow['City_id']}'";
                                $CResult = mysql_query($CSelect);
                                $CRow = mysql_fetch_assoc($CResult);

                                $USelect = "SELECT First_name, Last_name, Contact_no FROM `user_master` WHERE User_id='{$RRow['User_id']}'";
                                $UResult = mysql_query($USelect);
                                $URow = mysql_fetch_assoc($UResult);
                                $UName = $URow['First_name'] . " " . $URow['Last_name'];

                                echo "<div class='bs-example1' data-example-id='contextual-table' style='height: auto;margin: auto;'>";
                                    echo '<div class="col-sm-12" style="border-bottom: 1px solid;padding-bottom: 8px;">';
                                        echo '<div class="col-sm-3">Service Status :</div>';
                                        echo "<div class='col-sm-3' style='font-weight: 600;font-size: large'>{$Status}</div>";
                                        echo "<div class='col-sm-1'> </div>";
                                        echo "<div class='col-sm-2' align='right'>Booking Date :</div>";
                                        echo "<div class='col-sm-3' align='center' style='font-weight: 500'>{$RRow['Booking_date']}</div>";
                                    echo '</div>';
                                    echo '<div class="col-sm-12" style="padding-bottom: 8px;padding-top: 8px;">';
                                        echo '<div class="col-sm-3">Customer Id :</div>';
                                        echo "<div class='col-sm-3' style='font-size: large'>{$RRow['User_id']}</div>";
                                        echo "<div class='col-sm-1'> </div>";
                                        echo "<div class='col-sm-2' align='right'>Customer Name :</div>";
                                        echo "<div class='col-sm-3' align='center'>{$UName}</div>";
                                    echo '</div>';
                                        echo '<div class="col-sm-12" style="margin-top: 4px;">';
                                        echo "<div class='col-sm-3'>Customer's Address :</div>";
                                        echo "<div class='col-sm-5'>{$RRow['Address']}, {$ARow['Area_name']}, {$CRow['City_name']}</div>";
                                    echo '</div>';
                                    echo '<div class="col-sm-12" style="margin-top: 12px;">';
                                        echo "<div class='col-sm-3'>Customer's Contact Number :</div>";
                                        echo "<div class='col-sm-2'>{$URow['Contact_no']}</div>";
                                    echo '</div>';
                                    echo '<div class="col-sm-12" style="margin-top: 12px;padding-bottom: 12px;">';
                                        echo '<div class="col-sm-3">Problem Description :</div>';
                                        echo "<div class='col-sm-5'>{$RRow['Problem_desc']}</div>";
                                    echo '</div>';
                                    echo '<div class="col-sm-12" align="center" style="padding-top: 15px;border-top: 1px solid;">';
                                        echo '<div class="col-sm-3"> </div>';
                                        echo "<div class='col-sm-4' align='right'>Total : <b>{$RRow['Bill_amt']} Rs.</b> Till Now</div>";
                                        echo '<div class="col-sm-2"></div>';
                                    echo '</div>';
                                    echo '<div class="col-sm-12" align="center" style="padding-top: 15px;">';
                                        echo '<div class="col-sm-4"> </div>';
                                        echo "<div class='col-sm-4' align='center'><a href='MCService.php?id={$RRow['Receipt_id']}' class='btn btn-default'>Edit Order</a></div>";
                                        echo '<div class="col-sm-2"></div>';
                                    echo '</div>';
                                    echo '<div class="clearfix"></div>';
                                echo '</div>';
                            }
                        }
                    }
                    else
                    {
                        $Receipt="SELECT Status, Bill_amt FROM `receipt_master` WHERE Receipt_id='{$_GET['id']}'";
                        $Result=mysql_query($Receipt,$con);
                        $Row=mysql_fetch_assoc($Result);

                        echo "<div class='bs-example1' data-example-id='contextual-table' style='height: auto;margin: auto;'>";
                        //echo 'mit';
                        echo '<form class="form-horizontal" action="Utility_MCService.php" method="post">';
                            echo '<div class="form-group">';
                                echo "<div class='col-sm-12' style='margin-bottom: 8px;'>";
                                    echo '<div class="col-sm-1"></div>';
                                    echo '<label class="col-sm-2 control-label">Service Status :</label>';
                                    echo '<div class="col-sm-1">&nbsp;</div>';
                                    echo '<div class="col-sm-8">';
                                    if($Row['Status']==0)
                                    {
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="0" checked=""> Booked</label></div>';
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="1"> Confirmed</label></div>';
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="2"> In Process</label></div>';
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="3"> Completed</label></div>';
                                    }
                                    elseif($Row['Status']==1){
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="0"> Booked</label></div>';
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="1" checked=""> Confirmed</label></div>';
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="2"> In Process</label></div>';
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="3"> Completed</label></div>';
                                    }
                                    elseif($Row['Status']==2){
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="0"> Booked</label></div>';
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="1"> Confirmed</label></div>';
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="2" checked=""> In Process</label></div>';
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="3"> Completed</label></div>';
                                    }
                                    else{
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="0"> Booked</label></div>';
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="1"> Confirmed</label></div>';
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="2"> In Process</label></div>';
                                        echo '<div class="radio-inline col-sm-2"><label><input type="radio" name="Status" value="3" checked=""> Completed</label></div>';
                                    }
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-12" style="margin-bottom: 12px;">';
                                    echo '<div class="col-sm-1"></div>';
                                    echo '<label class="col-sm-2 control-label">Charges :</label>';
                                    echo '<div class="col-sm-1">&nbsp;</div>';
                                    echo '<div class="col-sm-8">';
                                        echo "<label class='col-sm-2 control-label' style='font-weight: 600' title='Already Applied Charges'>{$Row['Bill_amt']} Rs.</label>";
                                        echo '<label class="col-sm-1 control-label" style="font-weight: 400">+</label>';
                                        echo '<div class="col-sm-1">&nbsp;</div>';
                                        echo '<div class="col-cm-2" style="padding-top: 4px;">';
                                            echo '<input type="text" name="Charges" maxlength="3" class="col-sm-2" style="padding-left: 40px;">';
                                            echo '<div class="col-sm-1">Rs.</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-12" style="margin-bottom: 8px;">';
                                    echo '<div class="col-sm-1"></div>';
                                    echo '<label class="col-sm-2 control-label">Problem Solution :</label>';
                                    echo '<div class="col-sm-1">&nbsp;</div>';
                                    echo '<div class="col-sm-6">';
                                        echo '<textarea rows="5" name="Solution" class="form-control1" style="resize: none;height: auto;"></textarea>';
                                    echo '</div>';
                                echo '</div>';
                                echo "<input type='hidden' name='Bill' value='{$Row['Bill_amt']}'>";
                                echo "<input type='hidden' name='Receipt_id' value='{$_GET['id']}'>";
                                echo '<div class="col-sm-12" align="center" style="margin-top: 8px;">';
                                    echo '<input type="submit" class="btn btn-default" name="Update" value="Update">';
                                echo '</div>';
							echo '</div>';
                        echo '</form>';
                        echo '</div>';
                    }
                    ?>
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