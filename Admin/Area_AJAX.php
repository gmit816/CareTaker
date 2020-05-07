<?php
require("../connection.php");
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>
    <!----webfonts--->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!---//webfonts--->
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Nav CSS -->
    <link href="../css/custom.css" rel="stylesheet">
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>
    <script src="../js/custom.js"></script>
</head>
<body>
    <?php $City_id=$_GET['q'];
    //echo "SELECT * FROM `area_master` WHERE City_id='$City_id'"; die(); ?>
    <select name="Area" class="form-control1" required="required">
        <option value="">-------------------&nbsp;&nbsp;Select Area&nbsp;&nbsp;-------------------</option>
        <?php
        //$City_id=$_GET['q'];
        $query="SELECT * FROM `area_master` WHERE City_id='$City_id'";
        if( !( $Res = mysql_query( $query ) ) ){
            echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
        }
        else {
            if( mysql_num_rows( $Res )==0 ){
                echo '<option>No Rows Returned</option>';
            }
            else
            {
                while( $r = mysql_fetch_assoc( $Res ) )
                {
                    echo "<option value={$r['Area_id']}>{$r['Area_name']}</option>";
                }
            }
        }
        //if( mysql_num_rows( $selectRes )==0 ){
        //    echo '<option>No Rows Returned</option>';
        //}
        //else
        //{
        //    while( $row = mysql_fetch_assoc( $selectRes ) )
        //    {
        //        echo "<option value={$row['City_id']}>{$row['City_name']}</option>";
        //    }
        //}
        //}
        //<option value="">1. Ahmedabad</option>
        //<option value="">Option Value</option>
        //<option value="">should be city id</option>
        ?>
    </select>
</body>
</html>