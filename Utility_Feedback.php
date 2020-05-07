<?php
require("connection.php");
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$type=$_POST['type'];
$query="INSERT INTO `feedback_master`(`Email_ID`,`User_type`,`Subject`,`Message`,`Time_Stamp`) VALUES ('$email','$type','$subject','$message',NOW())";
$result=mysql_query($query,$con);
if($result){
    echo "<script>alert('Thanks for contacting us. We will solve your problem / query soon and let you know by email.');document.location='index.php';</script>";
}
else{
    echo "<script>alert('Something went Wrong. Please try again!');document.location='index.php';</script>";
}