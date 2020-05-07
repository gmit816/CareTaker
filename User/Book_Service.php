<!DOCTYPE HTML>
<html style="background: #FFF;">
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
        xmlhttp.open("GET","Book_Area_AJAX.php?q="+str,true);
        xmlhttp.send();
    }
    function SService(str)
    {
        if (str=="")
        {
            document.getElementById("selector3").innerHTML="";
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
                document.getElementById("selector3").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","Book_SService_AJAX.php?q="+str,true);
        xmlhttp.send();
    }
</script>
<head>
    <title>Book Service</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-left: 0px; min-height: 399px;">
        <div class="graphs">
            <div class="xs" style="margin-top: 80px;">
                <h3>Book Service</h3>
                <div class="col_1" style="margin-top: 48px;">
                    <div class="col-md-10 span_3" style="margin: auto;float: none;">
                        <div class="tab-pane active" data-example-id="contextual-table" style="height: auto;margin: auto;">
                            <form class="form-horizontal" action="" method="post">
                                <div class="form-group">
                                    <div class="col-sm-12" style="margin-bottom: 40px;">
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-6" align="center" style="font-weight: 300">
                                            Want help from Us ? Book our best service provider with following easy steps to satisfy your requirements !
                                            <?php //if(isset($_POST['Edit'])){
                                                //echo 'mit';
                                                //echo $_POST['ECity'];
                                            //}?>
                                        </div>
                                    </div>
                                    <?php
                                    $SService = "SELECT * FROM `service_master` where Deleted=0 ORDER BY `Service_id`";
                                    # Execute the SELECT Query
                                    if( !( $RService = mysql_query( $SService ) ) ){
                                        echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                                    }
                                    else{
                                    ?>
                                    <div class="col-md-4">
                                        <select name="Service_id" onchange="SService(this.value)"  class="form-control1" required="required">
                                            <option value="">-----------------------------&nbsp;&nbsp;SELECT SERVICE&nbsp;&nbsp;-----------------------------</option>
                                            <?php
                                            if( mysql_num_rows( $RService )==0 ){
                                                echo '<option>No Rows Returned</option>';
                                            }
                                            else
                                            {
                                                while( $Srow = mysql_fetch_assoc( $RService ) )
                                                {
                                                    if(isset($_POST['Submit1']) AND $_POST['Service_id']==$Srow['Service_id']){
                                                        echo "<option value={$Srow['Service_id']} selected='selected'>{$Srow['Service_type']}</option>";
                                                    }
                                                    elseif(isset($_POST['Edit']) AND $_POST['EService']==$Srow['Service_id']){
                                                        echo "<option value={$Srow['Service_id']} selected='selected'>{$Srow['Service_type']}</option>";
                                                    }
                                                    else{
                                                        echo "<option value={$Srow['Service_id']}>{$Srow['Service_type']}</option>";
                                                    }
                                                }
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php
                                    $selectSQL = "SELECT * FROM `city_master` where Deleted=0 ORDER BY `City_id`";
                                    # Execute the SELECT Query
                                    if( !( $selectRes = mysql_query( $selectSQL ) ) ){
                                        echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                                    }
                                    else{
                                    ?>
                                    <div class="col-md-4">
                                        <select name="City_id" class="form-control1" onchange="Area(this.value)" required="required">
                                            <option value="">-------------------------------&nbsp;&nbsp;SELECT CITY&nbsp;&nbsp;-------------------------------</option>
                                            <?php
                                            if( mysql_num_rows( $selectRes )==0 ){
                                                echo '<option>No Rows Returned</option>';
                                            }
                                            else
                                            {
                                                while( $row = mysql_fetch_assoc( $selectRes ) )
                                                {
                                                    if(isset($_POST['Submit1']) AND $_POST['City_id']==$row['City_id']){
                                                        echo "<option value={$row['City_id']} selected='selected'>{$row['City_name']}</option>";
                                                    }
                                                    elseif(isset($_POST['Edit']) AND $_POST['ECity']==$row['City_id']){
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
                                    <div class="col-md-4">
                                        <?php
                                        if(isset($_POST['Edit']))
                                        {
                                            $SArea = "SELECT * FROM `area_master` where Area_id={$_POST['ECity']}";
                                            # Execute the SELECT Query
                                            $RArea = mysql_query( $SArea );
                                            $mit2=mysql_fetch_array($RArea);

                                            echo '<select id="selector2" class="form-control1" required="required" name="City">';
                                            echo "<option value='{$_POST['ECity']}'>{$mit2['Area_name']}</option>";
                                            echo '</select>';
                                        }
                                        elseif(!isset($_POST['Submit1']))
                                        {
                                            echo '<select id="selector2" class="form-control1" required="required" name="City">';
                                            echo '<option value="">-------------------------------&nbsp;&nbsp;SELECT AREA&nbsp;&nbsp;-------------------------------</option>';
                                            echo '</select>';
                                        }
                                        else
                                        {
                                            $SArea = "SELECT * FROM `area_master` where Area_id={$_POST['City']}";
                                            # Execute the SELECT Query
                                            $RArea = mysql_query( $SArea );
                                            $mit2=mysql_fetch_array($RArea);

                                            echo '<select id="selector2" class="form-control1" required="required" name="City">';
                                            echo "<option value='{$_POST['City']}'>{$mit2['Area_name']}</option>";
                                            echo '</select>';
                                        }
                                        ?>
                                        <!--select id="selector2" class="form-control1" required="required" name="City">
                                            <option>-------------------------------&nbsp;&nbsp;SELECT AREA&nbsp;&nbsp;-------------------------------</option>
                                        </select-->
                                    </div>
                                    <!--div class="col-sm-12" align="center" style="margin-top: 30px;">
                                        <div class="col-md-4"> </div>
                                        <div class="col-md-4">
                                            <?php
                                         #   if(isset($_POST['Edit']))
                                          #  {
                                           #     $SSubService = "SELECT * FROM `subservice_master` where Subservice_id={$_POST['ESubService']}";
                                            #    # Execute the SELECT Query
                                             #   $RSubService = mysql_query( $SSubService );
                                              #  $mit1=mysql_fetch_array($RSubService);

#                                                echo '<select id="selector3" class="form-control1" required="required" name="Service">';
 #                                               echo "<option value='{$_POST['ESubService']}'>{$mit1['Subservice_name']}</option>";
  #                                              echo '</select>';
   #                                         }
    #                                        elseif(!isset($_POST['Submit1']))
     #                                       {
      #                                          echo '<select id="selector3" class="form-control1" required="required" name="Service">';
       #                                         echo '<option value="">-----------------------&nbsp;&nbsp;SELECT SUB-SERVICE&nbsp;&nbsp;------------------------</option>';
        #                                        echo '</select>';
         #                                   }
          #                                  else
           #                                 {
            #                                $SSubService = "SELECT * FROM `subservice_master` where Subservice_id={$_POST['Service']}";
             #                               # Execute the SELECT Query
              #                              $RSubService = mysql_query( $SSubService );
               #                             $mit1=mysql_fetch_array($RSubService);
#
 #                                               echo '<select id="selector3" class="form-control1" required="required" name="Service">';
  #                                                  echo "<option value='{$_POST['Service']}'>{$mit1['Subservice_name']}</option>";
   ##                                        }
     #                                       if(isset($_POST['Edit'])){
      #                                           echo "<input type='hidden' name='Problem2' value='{$_POST['EProblem']}'>";
       #                                          echo  "<input type='hidden' name='Address2' value='{$_POST['Address1']}'>";
        #                                    }
         #                                   ?>

                                            <!--select id="selector3" class="form-control1" required="required" name="Service">
                                                <option value="">-----------------------&nbsp;&nbsp;SELECT SUB-SERVICE&nbsp;&nbsp;------------------------</option>
                                            </select-->
                                        <!--/div>
                                    </div-->
                            </form>
                                    <?php
                                    if(!isset($_POST['Submit1']))
                                    {
                                        echo '<div class="col-sm-12" align="center" style="margin-top: 40px;">';
                                            echo '<input type="submit" class="btn btn-default" name="Submit1" value="Continue" style="width: 100px;">';
                                        echo '</div>';
                                    }
                                    else
                                    {
                                        $Service=$_POST['Service_id'];
                                        $City=$_POST['City_id'];
                                        $Area=$_POST['City'];
                                        //$SubService=$_POST['Service'];
                                        echo '<form class="form-horizontal" action="Confirm_Order.php" method="post">';
                                            echo '<div class="col-sm-12" align="center" style="margin-top: 25px;">';
                                                echo '<div class="col-sm-1">&nbsp;</div>';
                                                echo '<div class="col-sm-2" align="right">';
                                                    echo '<label for="focusedinput" class="control-label" style="margin-top: auto;">Problem Description (Optional) :</label>';
                                                echo '</div>';
                                                echo '<div class="col-sm-6">';
                                                    if(isset($_POST['Problem2'])){
                                                        echo "<textarea rows='5' class='form-control1' name='Problem' id='Problem' placeholder='What is bothering you? Elaborate your Problem !' style='resize: none;height: auto;'>{$_POST['Problem2']}</textarea>";
                                                    }
                                                    else{
                                                        echo '<textarea rows="5" class="form-control1" name="Problem" id="Problem" placeholder="What is bothering you? Elaborate your Problem !" style="resize: none;height: auto;"></textarea>';
                                                    }
                                                echo '</div>';
                                            echo '</div>';
                                            echo '<div class="col-sm-12" align="center" style="margin-top: 20px;">';
                                                echo '<div class="col-sm-1">&nbsp;</div>';
                                                echo '<div class="col-sm-2" align="right">';
                                                    echo '<label for="focusedinput" class="control-label" style="margin-top: auto;">Address* :</label>';
                                                echo '</div>';
                                                echo '<div class="col-sm-6">';
                                                if(isset($_POST['Address2'])){
                                                    echo "<textarea rows='5' class='form-control1' name='Address' id='Address' placeholder='Flat no., Flat Name, Street Name, Landmark' style='resize: none;height: auto;' required='required'>{$_POST['Address2']}</textarea>";
                                                }
                                                else{
                                                     echo '<textarea rows="5" class="form-control1" name="Address" id="Address" placeholder="Flat no., Flat Name, Street Name, Landmark" style="resize: none;height: auto;" required="required"></textarea>';
                                                }
                                                echo '</div>';
                                            echo '</div>';
                                            echo "<input type='hidden' name='City' value='$City'>";
                                            echo "<input type='hidden' name='Area' value='$Area'>";
                                            echo "<input type='hidden' name='Service' value='$Service'>";
                                          //  echo "<input type='hidden' name='SService' value='$SubService'>";
                                            echo '<div class="col-sm-12" align="center" style="margin-top: 30px;">';
                                                echo '<input type="submit" class="btn btn-default" name="Submit2" value="Proceed !" style="width: 100px;">';
                                            echo '</div>';
                                        echo '</form>';
                                    }
                                    ?>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="copy_layout" style="margin-top: 32px;">

                </div>
            </div>
        </div>
    </div>
</body>
</html>