<?php
require("../connection.php");
$id=$_GET['id'];
$name=$_GET["name"];
$query="UPDATE `area_master` SET Deleted=1 WHERE Area_id='$id'";
$res=mysql_query($query,$con);
if($res){
    echo "<script>alert('$name is successfully Deleted.');document.location='Area_View_Delete.php';</script>";
}
else{
    echo "<script>alert('Something went Wrong. Please try again.');document.location='Area_View_Delete.php';</script>";
}

