<!DOCTYPE HTML>
<html>
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<script type="text/javascript" language="JavaScript">
    function Area(str)
    {
        if (str=="")
        {
            document.getElementById("selector2").innerHTML="";
            return;
        }
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("selector2").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","Area_AJAX.php?q="+str,true);
        xmlhttp.send();
    }
</script>
<head>
    <title>Caretaker Manage</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-top: 98px;">
        <div class="graphs">
            <div class="xs">
                <h3>Add Caretaker</h3>
                <div class="tab-content" style="margin-top: 80px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal" action="Utility_CT.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-12" style="margin-bottom: 8px;">
                                    <div class="col-sm-2"> </div>
                                    <label for="focusedinput" class="col-sm-2 control-label">Caretaker's Name:</label>
                                    <div class="col-sm-3" style="padding-right: 0px;">
                                        <input type="text" class="form-control1" name="First_name" placeholder="First Name" required="required">
                                    </div>
                                    <div class="col-sm-2" style="padding-left: 0px;">
                                        <input type="text" class="form-control1" name="Last_name" placeholder="Last Name" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-2"> </div>
                                    <label for="focusedinput" class="col-sm-2 control-label">Email Address:</label>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control1" name="Email_ID" placeholder="gmit816@gmail.com" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Email Address must contain '@','.'!" maxlength="32" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 8px;margin-bottom: 8px;">
                                    <div class="col-sm-2"> </div>
                                    <label for="focusedinput" class="col-sm-2 control-label">Profile Image: </label>
                                    <div class="col-sm-5">
                                        <input type="file" class="form-control1" name="Image" id="Image" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-bottom: 8px;">
                                    <?php
                                    $selectSQL = "SELECT * FROM `city_master` where Deleted=0 ORDER BY `City_id`";
                                    # Execute the SELECT Query
                                    if( !( $selectRes = mysql_query( $selectSQL ) ) ){
                                        echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                                    }
                                    else{
                                    ?>
                                    <div class="col-sm-2"> </div>
                                    <label for="focusedinput" class="col-sm-2 control-label">Belongs To:</label>
                                    <div class="col-sm-2" style="padding-right: 0px;">
                                        <select name="City_id" class="form-control1" onchange="Area(this.value)" required="required">
                                            <option value="">---------&nbsp;&nbsp;Select City&nbsp;&nbsp;---------</option>
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
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3" style="padding-left: 0px;">
                                        <?php
                                        echo '<select id="selector2" class="form-control1" required="required" name="City">';
                                        if(!isset($rows['Area_id'])) {
                                            echo '<option value="">-------------------&nbsp;&nbsp;Select Area&nbsp;&nbsp;-------------------</option>';
                                        }
                                        else{
                                            $SArea = "SELECT * FROM `area_master` where Area_id={$rows['Area_id']}";
                                            # Execute the SELECT Query
                                            $RArea = mysql_query( $SArea );
                                            $mit2=mysql_fetch_array($RArea);

                                            echo "<option value={$rows['Area_id']}>{$mit2['Area_name']}</option>";
                                        }
                                        echo '</select>';
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-bottom: 8px;">
                                    <?php
                                    $Sselect = "SELECT * FROM `service_master` where Deleted=0 ORDER BY `Service_id`";
                                    # Execute the SELECT Query
                                    if( !( $SRes = mysql_query( $Sselect ) ) ){
                                        echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                                    }
                                    else{
                                    ?>
                                    <div class="col-sm-2"> </div>
                                    <label for="focusedinput" class="col-sm-2 control-label">Expertise In:</label>
                                    <div class="col-sm-5">
                                        <select name="Service" class="form-control1" required="required">
                                            <option value="">---------------------------------------&nbsp;&nbsp;Select Service&nbsp;&nbsp;---------------------------------------</option>
                                            <?php
                                            if( mysql_num_rows( $SRes )==0 ){
                                                echo '<option>No Rows Returned</option>';
                                            }
                                            else
                                            {
                                                while( $Srow = mysql_fetch_assoc( $SRes ) ){
                                                        echo "<option value={$Srow['Service_id']}>{$Srow['Service_type']}</option>";
                                                }
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-2"> </div>
                                    <label for="focusedinput" class="col-sm-2 control-label">Contact Number:</label>
                                    <div class="col-sm-1" align="center" style="padding-top: 8px;">+91</div>
                                    <div class="col-sm-4" style="padding-left: 0px;">
                                        <input type="text" class="form-control1" name="Contact" placeholder="9409056375" maxlength="10" pattern="\d*" title="Contact Number must be of 0-9" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-12" align="center" style="margin-top: 40px;">
                                    <input type="submit" class="btn btn-default" name="Submit" value="Add" style="width: 100px;">
                                </div>
                                <div class="clearfix"></div>
                            </div>
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