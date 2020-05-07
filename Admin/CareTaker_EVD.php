<!DOCTYPE HTML>
<html>
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>Caretaker Manage</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-top: 98px;">
        <div class="col-md-12 graphs">
            <div class="xs">
                <h3>View Caretaker</h3>
                <form action="" method="post" class="form-horizontal">
                    <div class="col-sm-12" style="margin-top: 16px;">
                        <div class="col-sm-2"> </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control1" name="Search" placeholder="Enter Email_Id / Emp_id / Service / City / Area">
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control1" name="Type">
                                <option value="">Select Search Type</option>
                                <option value="1">Search by Emp Id</option>
                                <option value="2">Search by Email Id</option>
                                <option value="3">Search by City</option>
                                <option value="4">Search by Area</option>
                                <option value="5">Search by Service</option>
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
                                    $selectSQL = "SELECT * FROM `caretaker_master` where Deleted=0 AND Emp_id>1 AND Emp_id='{$_POST['Search']}' ORDER BY `Emp_id`";
                                }
                                elseif($_POST['Type']=="2")
                                {
                                    $selectSQL = "SELECT * FROM `caretaker_master` where Deleted=0 AND Emp_id>1 AND Email_ID='{$_POST['Search']}' ORDER BY `Emp_id`";
                                }
                                elseif($_POST['Type']=="3")
                                {
                                    $CitySelect="SELECT City_id FROM `city_master` WHERE City_name='{$_POST['Search']}'";
                                    $CityResult=mysql_query($CitySelect);
                                    $CityRow=mysql_fetch_assoc($CityResult);

                                    $selectSQL = "SELECT * FROM `caretaker_master` where Deleted=0 AND Emp_id>1 AND City_id='{$CityRow['City_id']}' ORDER BY `Emp_id`";
                                }
                                elseif($_POST['Type']=="4")
                                {
                                    $AreaSelect="SELECT Area_id FROM `area_master` WHERE Area_name='{$_POST['Search']}'";
                                    $AreaResult=mysql_query($AreaSelect);
                                    $AreaRow=mysql_fetch_assoc($AreaResult);

                                    $selectSQL = "SELECT * FROM `caretaker_master` where Deleted=0 AND Emp_id>1 AND Area_id='{$AreaRow['Area_id']}' ORDER BY `Emp_id`";
                                }
                                elseif($_POST['Type']=="5")
                                {
                                    $ServiceSelect="SELECT Service_id FROM `service_master` WHERE Service_type='{$_POST['Search']}'";
                                    $ServiceResult=mysql_query($ServiceSelect);
                                    $ServiceRow=mysql_fetch_assoc($ServiceResult);

                                    $selectSQL = "SELECT * FROM `caretaker_master` where Deleted=0 AND Emp_id>1 AND Service_id='{$ServiceRow['Service_id']}' ORDER BY `Emp_id`";
                                }
                            }
                            else{
                                $selectSQL = "SELECT * FROM `caretaker_master` where Deleted=0 AND Emp_id>1 ORDER BY `Emp_id`";
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
                                    <th style="text-align: center">Email_ID</th>
                                    <th style="text-align: center">Service Name</th>
                                    <th style="text-align: center">Area Name, City Name</th>
                                    <th style="text-align: center">Points</th>
                                    <th style="text-align: center">DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (mysql_num_rows($selectRes) == 0) {
                                    echo '<tr><td colspan="3">No Rows Returned</td></tr>';
                                } else {
                                    $mit = 1;
                                    while ($row = mysql_fetch_assoc($selectRes)) {
                                        $gandhi = $row['Email_ID'];
                                        $id = $row['Emp_id'];

                                        $SSelect="SELECT Service_type FROM `service_master` WHERE Service_id='{$row['Service_id']}'";
                                        $SResult=mysql_query($SSelect,$con);
                                        $Srow=mysql_fetch_assoc($SResult);

                                        $ASelect="SELECT Area_name FROM `area_master` WHERE Area_id='{$row['Area_id']}'";
                                        $AResult=mysql_query($ASelect,$con);
                                        $Arow=mysql_fetch_assoc($AResult);

                                        $CSelect="SELECT City_name FROM `city_master` WHERE City_id='{$row['City_id']}'";
                                        $CResult=mysql_query($CSelect,$con);
                                        $Crow=mysql_fetch_assoc($CResult);

                                        if ($mit % 2 == 1) {
                                            echo "<tr class=\"active\"><th>{$row['Emp_id']}</th><td align=\"center\">{$row['Email_ID']}</td><td align=\"center\">{$Srow['Service_type']}</td><td align=\"center\">{$Arow['Area_name']}, {$Crow['City_name']}</td><td align=\"center\">{$row['Points']}</td><td align=\"center\"><input type='button' value='DELETE' onclick='mfunction(this)' data-name='$gandhi' data-id='$id' class=\"btn btn-default\"></td></tr>\n";
                                        } else {
                                            echo "<tr><th>{$row['Emp_id']}</th><td align=\"center\">{$row['Email_ID']}</td><td align=\"center\">{$Srow['Service_type']}</td><td align=\"center\">{$Arow['Area_name']}, {$Crow['City_name']}</td><td align=\"center\">{$row['Points']}</td><td align=\"center\"><input type='button' value='DELETE' onclick='mfunction(this)' data-name='$gandhi' data-id='$id' class=\"btn btn-default\"></td></tr>\n";
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
<script type="text/javascript">
    function mfunction(button){
        /*if(confirm("Are you sure about Deleting<!--?php json_encode($gandhi);?-->")== true){
         }
         else{
         }*/
        var name = button.getAttribute("data-name");
        var id = button.getAttribute("data-id");
        var where_to = confirm("Are you sure about deleting " + name + "?");
        if (where_to == true)
        {
            window.location="Utility_CT_Delete.php?id=" + id +"&name=" + name;
        }
        else
        {
            document.location="CareTaker_EVD.php";
        }
    }
</script>
</html>