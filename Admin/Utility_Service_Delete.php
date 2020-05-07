<?php
require("../connection.php");
$id=$_GET['id'];
$name=$_GET["name"];
$sql="UPDATE `service_master` SET Deleted=1 WHERE Service_id='$id'";
//$sq="UPDATE `subservice_master` SET Deleted=1 WHERE Service_id='$id'";
$query="UPDATE `caretaker_master` SET Deleted=1 WHERE Service_id='$id'";
$result=mysql_query($sql,$con);
$res=mysql_query($query,$con);
//$r=mysql_query($sq,$con);
if($res && $result){
    echo "<script>alert('$name is successfully Deleted.');document.location='Service_View_Delete.php';</script>";
}
else{
    echo "<script>alert('Something went Wrong. Please try again.');document.location='Service_View_Delete.php';</script>";
}

