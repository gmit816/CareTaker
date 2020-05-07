<!DOCTYPE HTML>
<html>
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>User Feedback</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-top: 98px;">
        <div class="col-md-12 graphs">
            <div class="xs">
                <h3>User Feedback</h3>
                <div class="tab-content" style="margin-top: 80px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <div class="bs-example4" data-example-id="contextual-table">
                            <?php
                            $selectSQL = "SELECT * FROM `feedback_master` WHERE Replied=0 ORDER BY `Time_Stamp`";
                            # Execute the SELECT Query
                            if( !( $selectRes = mysql_query( $selectSQL ) ) ){
                                echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                            }
                            else{
                            ?>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Email ID</th>
                                    <th style="text-align: center">User Type</th>
                                    <th style="text-align: center">Subject</th>
                                    <th style="text-align: center">Message / Feedback</th>
                                    <th style="text-align: center">REPLY</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (mysql_num_rows($selectRes) == 0) {
                                    echo '<tr><td colspan="3">No Rows Returned</td></tr>';
                                } else {
                                    $mit = 1;
                                    while ($row = mysql_fetch_assoc($selectRes)) {
                                        $id=$row['Feedback_id'];
                                        if ($mit % 2 == 1) {
                                            echo "<tr class=\"active\"><td align=\"center\">{$row['Email_ID']}</td><td align=\"center\">{$row['User_type']}</td><td align=\"center\">{$row['Subject']}</td><td align=\"center\">{$row['Message']}</td><td align=\"center\"><input type='button' value='REPLY' onclick='mfunction(this)' data-id='$id' class=\"btn btn-default\"></td></tr>\n";
                                        } else {

                                            echo "<tr><td align=\"center\">{$row['Email_ID']}</td><td align=\"center\">{$row['User_type']}</td><td align=\"center\">{$row['Subject']}</td><td align=\"center\">{$row['Message']}</td><td align=\"center\"><input type='button' value='REPLY' onclick='mfunction(this)' data-id='$id' class=\"btn btn-default\"></td></tr>\n";
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
    <script type="text/javascript">
        function mfunction(button){
            /*if(confirm("Are you sure about Deleting<!--?php json_encode($gandhi);?-->")== true){
             }
             else{
             }*/
            var id = button.getAttribute("data-id");
            window.location="Message_Send.php?id=" + id ;
        }
    </script>
</body>
</html>