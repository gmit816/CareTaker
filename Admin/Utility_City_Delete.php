<?php
require("../connection.php");
$id=$_GET['id'];
$name=$_GET["name"];
$sql="UPDATE `city_master` SET Deleted=1 WHERE City_id='$id'";
$query="UPDATE `area_master` SET Deleted=1 WHERE City_id='$id'";
$result=mysql_query($sql,$con);
$res=mysql_query($query,$con);
if($res && $result){
    echo "<script>alert('$name is successfully Deleted with its related areas.');document.location='City_View_Delete.php';</script>";
}
else{
    echo "<script>alert('Something went Wrong. Please try again.');document.location='City_View_Delete.php';</script>";
}

