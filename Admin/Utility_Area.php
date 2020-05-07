<?php
require("../connection.php");
$area=$_POST['area'];
$city=$_POST['city'];
$mit="SELECT * FROM `area_master` WHERE Area_name='$area'";
$res=mysql_query($mit,$con);
if(mysql_num_rows($res)==1){
    echo "<script>alert('$area is already Existed. Try Again.');document.location='Area_Add.php';</script>";
}
else{
    $sql="INSERT INTO `area_master`(`Area_name`,`City_id`) VALUES ('$area','$city')";
    $result=mysql_query($sql,$con);
    if($result){
        echo "<script>alert('$area is Successfully Added!');document.location='Area_Manage.php';</script>";
    }
    else{
        echo "<script>alert('Something went Wrong.');document.location='Area_Add.php';</script>";
    }
}