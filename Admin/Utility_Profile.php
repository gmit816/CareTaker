<?php
require("../connection.php");
session_start();
$Last_Name=$_POST['Last_Name'];
$Address=$_POST['Address'];
$City_id=$_POST['City_id'];
$Area_id=$_POST['City'];
$Contact=$_POST['Contact'];
$User_id=$_SESSION['User_id'];
$update="UPDATE `user_master` SET Last_name='$Last_Name',Address='$Address',City_id='$City_id',Area_id='$Area_id',Contact_no='$Contact' WHERE User_id='$User_id'";
$res=mysql_query($update,$con);
if($res){
    echo "<script>alert('Data is successfully Saved.');document.location='index.php';</script>";
}
else{
    echo "<script>alert('Something went Wrong. Please try again.');document.location='MProfile.php';</script>";
}