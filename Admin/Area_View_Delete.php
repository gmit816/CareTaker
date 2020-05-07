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
        <div class="col-md-12 graphs">
            <div class="xs">
                <h3>View Area</h3>
                <div class="tab-content" style="margin-top: 80px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <div class="bs-example4" data-example-id="contextual-table">
                            <?php
                            if(isset($_GET['id']))
                            {
                                $selectSQL = "SELECT * FROM `area_master` where Deleted=0 AND City_id ={$_GET['id']} ORDER BY `Area_id`,`City_id`";
                            }
                            else
                            {
                            $selectSQL = "SELECT * FROM `area_master` where Deleted=0 ORDER BY `Area_id`,`City_id`";
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
                                    <th style="text-align: center">Area Name</th>
                                    <th style="text-align: center">City Name</th>
                                    <th style="text-align: center">DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (mysql_num_rows($selectRes) == 0) {
                                    echo '<tr><td colspan="3">No Rows Returned</td></tr>';
                                }
                                else {
                                    $mit = 1;
                                    while ($row = mysql_fetch_assoc($selectRes)) {
                                        $query = "SELECT `City_name` FROM `City_master` WHERE City_id = {$row['City_id']}";
                                        if (!($Res = mysql_query($query))) {
                                            echo 'Retrieval of City Name from Database Failed - #' . mysql_errno() . ':' . mysql_error();
                                        } else {
                                            while ($a = mysql_fetch_assoc($Res)){
                                            if ($mit % 2 == 1) {
                                                $gandhi = $row['Area_name'];
                                                $id = $row['Area_id'];
                                                echo "<tr class=\"active\"><th>{$row['Area_id']}</th><td align=\"center\">{$row['Area_name']}</td><td align=\"center\">{$a['City_name']}</td><td align=\"center\"><input type='button' value='DELETE' onclick='mfunction(this)' data-name='$gandhi' data-id='$id' class=\"btn btn-default\"></td></tr>\n";
                                            } else {
                                                $gandhi = $row['Area_name'];
                                                $id = $row['Area_id'];
                                                echo "<tr><th>{$row['Area_id']}</th><td align=\"center\">{$row['Area_name']}</td><td align=\"center\">{$a['City_name']}</td><td align=\"center\"><input type='button' value='DELETE' onclick='mfunction(this)' data-name='$gandhi' data-id='$id' class=\"btn btn-default\"></td></tr>\n";
                                            }
                                            $mit++;
                                        }
                                        }
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
                window.location="Utility_Area_Delete.php?id=" + id +"&name=" + name;
            }
            else
            {
                document.location="Area_View_Delete.php";
            }
        }
    </script>
</body>
</html>