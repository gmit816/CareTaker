<!DOCTYPE HTML>
<html>
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>Area Manage</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-top: 98px;">
        <div class="graphs">
            <div class="xs">
                <h3>Add Area</h3>
                <div class="tab-content" style="margin-top: 80px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal" action="Utility_Area.php" method="post">
                            <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Area Name:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="area" class="form-control1" id="focusedinput" placeholder="Ahmedabad East" required="required">
                                </div>
                                <?php
                                $selectSQL = "SELECT * FROM `city_master` where Deleted=0 ORDER BY `City_id`";
                                # Execute the SELECT Query
                                if( !( $selectRes = mysql_query( $selectSQL ) ) ){
                                    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                                }
                                else{
                                ?>
                                <div class="col-sm-4">
                                    <select name="city" class="form-control1" id="selector1" required="required">
                                        <option value="">------------------------------&nbsp;&nbsp;Select City&nbsp;&nbsp;------------------------------</option>
                                        <?php
                                        if( mysql_num_rows( $selectRes )==0 ){
                                            echo '<option>No Rows Returned</option>';
                                        }
                                        else
                                        {
                                            while( $row = mysql_fetch_assoc( $selectRes ) )
                                            {
                                                echo "<option value={$row['City_id']}>{$row['City_name']}</option>";
                                            }
                                        }
                                        }
                                        //<option value="">1. Ahmedabad</option>
                                        //<option value="">Option Value</option>
                                        //<option value="">should be city id</option>
                                        ?>
                                    //</select>
                                </div>
                            </div>
                                <div class="col-sm-12" align="center" style="margin-top: 40px;">
                                    <input type="submit" class="btn btn-default" name="submit" value="Add" style="width: 100px;">
                                </div>
                                <div class="clearfix"></div>
                        </form>
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