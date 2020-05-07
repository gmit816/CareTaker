<!DOCTYPE HTML>
<html>
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>View Order</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-top: 98px;">
        <div class="col-md-12 graphs">
            <div class="xs">
                <h3>View Orders</h3>
                <form action="" method="post" class="form-horizontal">
                    <div class="col-sm-12" style="margin-top: 16px;">
                        <div class="col-sm-1"> </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control1" name="Search" placeholder="Enter Receipt_id / Email_Id / Emp_id / User_id / Service / City / Area">
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control1" name="Type">
                                <option value="">Select Search Type</option>
                                <option value="1">Search by Receipt Id</option>
                                <option value="2">Search by Caretaker Email Id</option>
                                <option value="3">Search by Emp Id</option>
                                <option value="4">Search by User Email Id</option>
                                <option value="5">Search by User Id</option>
                                <option value="6">Search by City</option>
                                <option value="7">Search by Area</option>
                                <option value="8">Search by Service</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" name="Submit" value="Search" class="btn btn-default">
                        </div>
                    </div>
                </form>
                <div class="tab-content" style="margin-top: 100px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <div class="bs-example4" data-example-id="contextual-table">
                            <?php
                            if(isset($_POST['Submit'])){
                                if($_POST['Type']=="1"){
                                    $selectSQL = "SELECT * FROM `receipt_master` where Receipt_id='{$_POST['Search']}' ORDER BY `Booking_date`";
                                }
                                elseif($_POST['Type']=="2")
                                {
                                    $EmpEmailSelect="SELECT Emp_id FROM `caretaker_master` WHERE Email_ID='{$_POST['Search']}'";
                                    $EmpEmailResult=mysql_query($EmpEmailSelect);
                                    $EmpEmailRow=mysql_fetch_assoc($EmpEmailResult);

                                    $selectSQL = "SELECT * FROM `receipt_master` where Emp_id='{$EmpEmailRow['Emp_id']}' ORDER BY `Booking_date`";
                                }
                                elseif($_POST['Type']=="3")
                                {
                                    $selectSQL = "SELECT * FROM `receipt_master` where Emp_id>1 AND Emp_id='{$_POST['Search']}' ORDER BY `Booking_date`";
                                }
                                elseif($_POST['Type']=="4")
                                {
                                    $UserEmailSelect="SELECT User_id FROM `user_master` WHERE Email_ID='{$_POST['Search']}'";
                                    $UserEmailResult=mysql_query($UserEmailSelect);
                                    $UserEmailRow=mysql_fetch_assoc($UserEmailResult);

                                    $selectSQL = "SELECT * FROM `receipt_master` where User_id='{$UserEmailRow['User_id']}' ORDER BY `Booking_date`";
                                }
                                elseif($_POST['Type']=="5")
                                {
                                    $selectSQL = "SELECT * FROM `receipt_master` where User_id='{$_POST['Search']}' ORDER BY `Booking_date`";
                                }
                                elseif($_POST['Type']=="6")
                                {
                                    $CitySelect="SELECT City_id FROM `city_master` WHERE City_name='{$_POST['Search']}'";
                                    $CityResult=mysql_query($CitySelect);
                                    $CityRow=mysql_fetch_assoc($CityResult);

                                    $selectSQL = "SELECT * FROM `receipt_master` where City_id='{$CityRow['City_id']}' ORDER BY `Booking_date`";
                                }
                                elseif($_POST['Type']=="7")
                                {
                                    $AreaSelect="SELECT Area_id FROM `area_master` WHERE Area_name='{$_POST['Search']}'";
                                    $AreaResult=mysql_query($AreaSelect);
                                    $AreaRow=mysql_fetch_assoc($AreaResult);

                                    $selectSQL = "SELECT * FROM `receipt_master` where Area_id='{$AreaRow['Area_id']}' ORDER BY `Booking_date`";
                                }
                                elseif($_POST['Type']=="8")
                                {
                                    $ServiceSelect="SELECT Service_id FROM `service_master` WHERE Service_type='{$_POST['Search']}'";
                                    $ServiceResult=mysql_query($ServiceSelect);
                                    $ServiceRow=mysql_fetch_assoc($ServiceResult);

                                    $selectSQL = "SELECT * FROM `receipt_master` where Service_id='{$ServiceRow['Service_id']}' ORDER BY `Booking_date`";
                                }
                            }
                            else{
                                $selectSQL = "SELECT * FROM `receipt_master` ORDER BY `Booking_date`";
                            }
                            # Execute the SELECT Query
                            if( !( $selectRes = mysql_query( $selectSQL ) ) ){
                                echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                            }
                            else{
                            ?>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: center">User EMail ID(User_id)</th>
                                    <th style="text-align: center">Employee EMail ID(User_id)</th>
                                    <th style="text-align: center">Service Name</th>
                                    <th style="text-align: center">Area Name, City Name</th>
                                    <th style="text-align: center">Bill Amount</th>
                                    <th style="text-align: center">Booking Date</th>
                                    <th style="text-align: center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (mysql_num_rows($selectRes) == 0) {
                                    echo '<tr><td colspan="3">No Rows Returned</td></tr>';
                                } else {
                                    $mit = 1;
                                    while ($row = mysql_fetch_assoc($selectRes)) {

                                        $CTSelect="SELECT Email_ID FROM `caretaker_master` WHERE Emp_id='{$row['Emp_id']}'";
                                        $CTResult=mysql_query($CTSelect,$con);
                                        $CTrow=mysql_fetch_assoc($CTResult);

                                        $USelect="SELECT Email_ID FROM `user_master` WHERE User_id='{$row['User_id']}'";
                                        $UResult=mysql_query($USelect,$con);
                                        $Urow=mysql_fetch_assoc($UResult);

                                        $SSelect="SELECT Service_type FROM `service_master` WHERE Service_id='{$row['Service_id']}'";
                                        $SResult=mysql_query($SSelect,$con);
                                        $Srow=mysql_fetch_assoc($SResult);

                                        $ASelect="SELECT Area_name FROM `area_master` WHERE Area_id='{$row['Area_id']}'";
                                        $AResult=mysql_query($ASelect,$con);
                                        $Arow=mysql_fetch_assoc($AResult);

                                        $CSelect="SELECT City_name FROM `city_master` WHERE City_id='{$row['City_id']}'";
                                        $CResult=mysql_query($CSelect,$con);
                                        $Crow=mysql_fetch_assoc($CResult);

                                        if($row['Status']==0){
                                            $Status="Booked";
                                        }
                                        elseif($row['Status']==1)
                                        {
                                            $Status="Booked and Confirmed";
                                        }
                                        elseif($row['Status']==2)
                                        {
                                            $Status="In Process";
                                        }
                                        else
                                        {
                                            $Status="Completed";
                                        }

                                        if ($mit % 2 == 1) {
                                            echo "<tr class=\"active\"><th>{$row['Receipt_id']}</th><td align=\"center\">{$Urow['Email_ID']}({$row['User_id']})</td><td align=\"center\">{$CTrow['Email_ID']}({$row['Emp_id']})</td><td align=\"center\">{$Srow['Service_type']}</td><td align=\"center\">{$Arow['Area_name']}, {$Crow['City_name']}</td><td align=\"center\">{$row['Bill_amt']}</td><td align=\"center\">{$row['Booking_date']}</td><td align=\"center\">$Status</td></tr>\n";
                                        } else {
                                            echo "<tr><th>{$row['Receipt_id']}</th><td align=\"center\">{$Urow['Email_ID']}({$row['User_id']})</td><td align=\"center\">{$CTrow['Email_ID']}({$row['Emp_id']})</td><td align=\"center\">{$Srow['Service_type']}</td><td align=\"center\">{$Arow['Area_name']}, {$Crow['City_name']}</td><td align=\"center\">{$row['Bill_amt']}</td><td align=\"center\">{$row['Booking_date']}</td><td align=\"center\">$Status</td></tr>\n";
                                        }
                                        $mit++;
                                    }
                                }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
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