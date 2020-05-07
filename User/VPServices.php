<!DOCTYPE HTML>
<html>
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>Previous Services</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-left: 0px; min-height: 399px;">
        <div class="graphs">
            <div class="xs" style="margin-top: 88px;">
                <h3>View Previous Services</h3>
                <?php
                $selectSQL = "SELECT * FROM `receipt_master` where User_id='{$_SESSION['User_id']}' AND Status=3 ORDER BY `Booking_date` DESC";
                # Execute the SELECT Query
                if( !( $selectRes = mysql_query( $selectSQL ) ) ){
                    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                }
                else{
                    if (mysql_num_rows($selectRes) == 0) {
                        echo '<div class="col_1" style="margin-top: 48px;">';
                        echo "<div class='col-md-10 span_3' style='margin: auto;float: none;'>";
                        echo "<div class='bs-example1' data-example-id='contextual-table' style='height: auto;margin: auto;font-weight: 500;' align='center'>You haven't book any Services yet!";
                        echo '</div></div></div>';
                    }
                    else {
                        while ($row = mysql_fetch_assoc($selectRes)) {

                            $sselect = "SELECT * FROM `service_master` WHERE Service_id='{$row['Service_id']}'";
                            if( !( $sRes = mysql_query( $sselect ) ) )
                            {
                                echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                            }
                            else
                            {
                                $srow=mysql_fetch_assoc($sRes);
                                $Service_name=$srow['Service_type'];
                                $Fees=$srow['Service_fees'];
                                $extra=$row['Bill_amt']-$Fees;
                            }

                            $pselect = "SELECT * FROM `caretaker_master` WHERE Emp_id='{$row['Emp_id']}'";
                            if( !( $pRes = mysql_query( $pselect ) ) )
                            {
                                echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                            }
                            else
                            {
                                $prow=mysql_fetch_assoc($pRes);
                                $SName=$prow['First_name']." ".$prow['Last_name'];
                                $Sid=$prow['Emp_id'];
                            }

                            $cselect = "SELECT * FROM `city_master` WHERE City_id='{$row['City_id']}'";
                            if( !( $cRes = mysql_query( $cselect ) ) )
                            {
                                echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                            }
                            else
                            {
                                $crow=mysql_fetch_assoc($cRes);
                                $CName=$crow['City_name'];
                            }

                            $aselect = "SELECT * FROM `area_master` WHERE Area_id='{$row['Area_id']}'";
                            if( !( $aRes = mysql_query( $aselect ) ) )
                            {
                                echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                            }
                            else
                            {
                                $arow=mysql_fetch_assoc($aRes);
                                $AName=$arow['Area_name'];
                            }

                            echo '<div class="col_1" style="margin-top: 48px;">';
                                echo '<div class="col-md-10 span_3" style="margin: auto;float: none;">';
                                    echo '<div class="bs-example1" data-example-id="contextual-table" style="height: auto;margin: auto;">';
                                        echo '<div class="col-sm-12">';
                                            echo '<div class="col-sm-2">Receipt Id :</div>';
                                            echo '<div class="col-sm-1" style="font-weight: 500">';
                                            echo $row["Receipt_id"];
                                            echo '</div>';
                                            echo '<div class="col-sm-4">&nbsp;</div>';
                                            echo '<div class="col-sm-2" align="right">Booking Date :</div>';
                                            echo "<div class='col-sm-3' align='center' style='font-weight: 500'>{$row['Booking_date']}</div>";
                                        echo '</div>';
                                        echo '<div class="col-sm-12" align="right">';
                                            echo '<div class="col-sm-6"> </div>';
                                            echo '<div class="col-sm-3">Service Completion Date :</div>';
                                            echo "<div class='col-sm-3' align='center' style='font-weight: 500;'>{$row['SServed_date']}</div>";
                                        echo '</div>';
                                        echo '<div class="col-sm-12" style="margin-bottom: 8px;margin-top: 20px;">';
                                            echo "<div class='col-sm-3'>Caretaker's Name (CT's Id) :</div>";
                                            echo "<div class='col-sm-4'>";
                                                if(isset($SName) && isset($Sid)){ echo "$SName ($Sid)"; }
                                            echo "</div>";
                                            echo '<div class="col-sm-1"> </div>';
                                            echo '<div class="col-sm-4" align="center">Grand Total</div>';
                                        echo '</div>';
                                        echo '<div class="col-sm-12">';
                                            echo "<div class='col-sm-3'>Customer's Address :</div>";
                                            echo "<div class='col-sm-4'>{$row['Address']}";
                                                if(isset($AName) && isset($CName)){echo ", $AName, $CName";};
                                            echo "</div>";
                                            echo '<div class="col-sm-1" align="right"> </div>';
                                            echo '<div class="col-sm-4" align="center">';
                                            echo "<h3 style='margin-bottom: 10px;font-weight: 500'>&nbsp;{$row['Bill_amt']} Rs.</h3>";
                                                if(isset($Fees) && isset($extra)){ echo "( Including {$Fees} Rs. Consultancy Charges + {$extra} Rs. Extra Charges & Taxes )";}
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="col-sm-12" style="margin-bottom: 10px;">';
                                            echo '<div class="col-sm-3">Service Requested :</div>';
                                            echo "<div class='col-sm-4'>";
                                                if(isset($Service_name)){ echo $Service_name;}
                                            echo "</div>";
                                        echo '</div>';
                                        echo '<div class="col-sm-12" style="margin-bottom: 16px;">';
                                            echo '<div class="col-sm-3">Problem Description :</div>';
                                            echo "<div class='col-sm-4'>{$row['Problem_desc']}</div>";
                                            echo '<div class="col-sm-1"> </div>';
                                            echo '<div class="col-sm-4" align="center">';
                                                echo "<a href='Bill_PDF.php?id={$row['Receipt_id']}' target='_blank' class='btn btn-default'>DOWNLOAD</a>";
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="col-sm-12" align="center" style="padding-top: 15px;border-top: 1px solid;">';
                                            echo '<div class="col-sm-3"> </div>';
                                            echo '<div class="col-sm-3" align="right">Rating of Service :</div>';
                                            echo "<div class='col-sm-2'>{$row['Rating']}/5</div>";
                                        echo '</div>';
                                        echo '<div class="clearfix"></div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                }
                ?>
                <!--div class="col_1" style="margin-top: 48px;">
                    <div class="col-md-10 span_3" style="margin: auto;float: none;">
                        <div class="bs-example1" data-example-id="contextual-table" style="height: auto;margin: auto;">
                            <div class="col-sm-12">
                                <div class="col-sm-2">Receipt Id :</div>
                                <div class="col-sm-1" style="font-weight: 500">62</div>
                                <div class="col-sm-5"> </div>
                                <div class="col-sm-2" align="right">Booking Date :</div>
                                <div class="col-sm-2" align="right" style="font-weight: 500">29/04/2016</div>
                            </div>
                            <div class="col-sm-12" align="right">
                                <div class="col-sm-8"> </div>
                                <div class="col-sm-3">Service Served Date :</div>
                                <div class="col-sm-1" style="font-weight: 500;">29/04/2016</div>
                            </div-->
                            <!--div class="col-sm-12" style="margin-bottom: 10px;">
                                <div class="col-sm-3">Customer's Name :</div>
                                <div class="col-sm-4">Mit Gandhi</div>
                            </div-->
                            <!--div class="col-sm-12" style="margin-bottom: 8px;margin-top: 20px;">
                                <div class="col-sm-3">SProvider's Name (SP's Id) :</div>
                                <div class="col-sm-4">Mit Gandhi (20)</div>
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-4" align="center">Grand Total</div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-3">Customer's Address :</div>
                                <div class="col-sm-4">203, Sahaj Residency, B/H Old Wadaj A.M.T.S. Bus Station, Ashram Road, Area Name, City Name</div>
                                <div class="col-sm-1" align="right"> </div>
                                <div class="col-sm-4" align="center">
                                    <h3 style="margin-bottom: 10px;font-weight: 500">&nbsp;103 Rs.</h3>( Including 50 Rs. Consultancy Fees + 50 Rs. Extra Charges + Taxes )
                                </div>
                            </div>
                            <div class="col-sm-12" style="margin-bottom: 10px;">
                                <div class="col-sm-3">Service Requested :</div>
                                <div class="col-sm-4">Plumbing</div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-3">Problem Description :</div>
                                <div class="col-sm-4">I have detected a plumbing issue in my house, leakage in pipes of AC ducts.</div>
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-4" align="center">
                                    <input type="submit" class="btn btn-default" name="Submit" value="Download Bill">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div-->
                <div class="clearfix"> </div>
                <div class="copy_layout">

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>