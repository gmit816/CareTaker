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
    <title>Manage Profile</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-left: 0px; min-height: 399px;">
        <div class="graphs">
            <div class="xs" style="margin-top: 88px;">
                <h3>Manage Profile</h3>
                <div class="tab-content col_3" style="margin-top: 24px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal" action="Utility_Profile.php" method="post">
                            <?php
                            $select_user = "SELECT * FROM `user_master` where User_id='{$_SESSION['User_id']}'";
                            # Execute the SELECT Query
                            if( !( $select_Res = mysql_query( $select_user ) ) ){
                                echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                            }
                            else{
                            while( $rows = mysql_fetch_assoc( $select_Res ) )
                            {
                            ?>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="col-sm-3">&nbsp;</div>
                                    <div class="col-sm-1" align="center">
                                        <label for="focusedinput" class="control-label" style="margin-top: 10px;">Email ID :</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input disabled type="text" class="form-control1" name="Email_ID" id="Email_ID" value="<?php echo $_SESSION['Email_ID'];?>" placeholder="gmit816@gmail.com" required="required" title="Non-Editable Field">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 8px;">
                                    <div class="col-sm-3">&nbsp;</div>
                                    <div class="col-sm-1" align="center">
                                        <label for="focusedinput" class="control-label" style="margin-top: 10px;">Name :</label>
                                    </div>
                                    <div class="col-sm-3" style="padding-right: 0px;">
                                        <input disabled type="text" class="form-control1" name="First_Name" id="FName" value="<?php echo $_SESSION['First_name']?>" placeholder="First Name" required="required" title="Non-Editable Field">
                                    </div>
                                    <div class="col-sm-2" style="padding-left: 0px;">
                                        <input type="text" class="form-control1" name="Last_Name" id="LName" placeholder="Last Name (Optional)" value="<?php echo $rows['Last_name'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 8px;">
                                    <div class="col-sm-3">&nbsp;</div>
                                    <div class="col-sm-1" align="center">
                                        <label for="focusedinput" class="control-label" style="margin-top: auto;">Address :</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <textarea rows="5" class="form-control1" name="Address" id="Address" placeholder="Flat no., Flat Name, Street Name, Landmark" style="resize: none;height: auto;" required="required"><?php echo $rows['Address'];?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 2px;">
                                    <div class="col-sm-4">&nbsp;</div>
                                    <?php
                                    $selectSQL = "SELECT * FROM `city_master` where Deleted=0 ORDER BY `City_id`";
                                    # Execute the SELECT Query
                                    if( !( $selectRes = mysql_query( $selectSQL ) ) ){
                                        echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                                    }
                                    else{
                                    ?>
                                    <div class="col-sm-2" style="padding-right: 0px;">
                                        <select name="City_id" class="form-control1" onchange="Area(this.value)" required="required">
                                            <option value="">---------------&nbsp;&nbsp;Select City&nbsp;&nbsp;---------------</option>
                                            <?php
                                            if( mysql_num_rows( $selectRes )==0 ){
                                                echo '<option>No Rows Returned</option>';
                                            }
                                            else
                                            {
                                                while( $row = mysql_fetch_assoc( $selectRes ) )
                                                {
                                                    if(isset($rows['City_id']) AND $rows['City_id']==$row['City_id']){
                                                        echo "<option value={$row['City_id']} selected='selected'>{$row['City_name']}</option>";
                                                    }
                                                    else{
                                                        echo "<option value={$row['City_id']}>{$row['City_name']}</option>";
                                                    }
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
                                            echo '<option value="">----------------------------&nbsp;&nbsp;Select Area&nbsp;&nbsp;----------------------------</option>';
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
                                <div class="col-sm-12" style="margin-top: 8px;">
                                    <div class="col-sm-3">&nbsp;</div>
                                    <div class="col-sm-1" align="center" style="padding-right: 20px;">
                                        <label for="focusedinput" class="control-label" style="padding-top: 0px;">Contact -Number :</label>
                                    </div>
                                    <div class="col-sm-1" align="center" style="padding-top: 5px;">
                                        <label class="control-label" style="font-weight: 500">+91</label>
                                    </div>
                                    <div class="col-sm-4" style="padding-left: 0px;">
                                        <input type="text" class="form-control1" name="Contact" id="Contact" placeholder="9409056375" maxlength="10" pattern="\d*" title="Contact Number must be of 0-9" required="required" value="<?php echo $rows['Contact_no'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-12" align="center" style="margin-top: 40px;">
                                    <input type="submit" class="btn btn-default" name="Submit" value="Save" style="width: 100px;margin-left: 100px;">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php }}?>
                        </form>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="copy_layout" style="margin-top: 32px;">
                    <!--p>Copyright © 2016. Still No Rights Reserved | Designed by <b style="font-weight: 500">M!t</b> </p-->
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Bootstrap Core JavaScript -->
</body>
</html>