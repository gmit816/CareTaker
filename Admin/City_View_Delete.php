<!DOCTYPE HTML>
<html>
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>City Manage</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-top: 98px;">
        <div class="col-md-12 graphs">
            <div class="xs">
                <h3>View City</h3>
                <div class="tab-content" style="margin-top: 80px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <div class="bs-example4" data-example-id="contextual-table">
                            <?php
                            $selectSQL = "SELECT * FROM `city_master` where Deleted=0 ORDER BY `City_id`";
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
                                    <th style="text-align: center">City Name</th>
                                    <th style="text-align: center">DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if( mysql_num_rows( $selectRes )==0 ){
                                    echo '<tr><td colspan="3">No Rows Returned</td></tr>';
                                }
                                else{
                                    $mit=1;
                                    while( $row = mysql_fetch_assoc( $selectRes ) ){
                                        if($mit%2==1) {
                                            $gandhi=$row['City_name'];
                                            $id=$row['City_id'];
                                            echo "<tr class=\"active\"><th>{$row['City_id']}</th><td align=\"center\"><a href='Area_View_Delete.php?id={$row['City_id']}'>{$row['City_name']}</a></td><td align=\"center\"><input type='button' value='DELETE' onclick='mfunction(this)' data-name='$gandhi' data-id='$id' class=\"btn btn-default\"></td></tr>\n";
                                        }
                                        else {
                                            $gandhi=$row['City_name'];
                                            $id=$row['City_id'];
                                            echo "<tr><th>{$row['City_id']}</th><td align=\"center\"><a href='Area_View_Delete.php?id={$row['City_id']}'>{$row['City_name']}</a></td><td align=\"center\"><input type='button' value='DELETE' onclick='mfunction(this)' data-name='$gandhi'  data-id='$id' class=\"btn btn-default\"></td></tr>\n";
                                        }
                                        $mit++;
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php } ?>
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
            window.location="Utility_City_Delete.php?id=" + id +"&name=" + name;
        }
        else
        {
            document.location="City_View_Delete.php";
        }
}
</script>
</body>
</html>