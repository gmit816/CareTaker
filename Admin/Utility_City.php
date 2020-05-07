<?php
require("../connection.php");
$City=$_POST['City'];
$mit="SELECT * FROM `city_master` WHERE City_name='$City'";
$res=mysql_query($mit,$con);
if(mysql_num_rows($res)==1){
    echo "<script>alert('$City is already Existed. Try Again.');document.location='City_Add.php';</script>";
}
else{
    $sql="INSERT INTO `city_master`(`City_name`) VALUES ('$City')";
    $result=mysql_query($sql,$con);
    if($result){
        echo "<script>alert('$City is Successfully Added!');document.location='City_Manage.php';</script>";
    }
    else{
        echo "<script>alert('Something went Wrong.');document.location='City_Add.php';</script>";
    }
}