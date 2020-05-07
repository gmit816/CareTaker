<?php
require("../connection.php");
session_start();
$Email_ID=$_SESSION['Email_ID'];
//$Email_ID="gmit816@gmail.com";
$Type="User";
$Subject=$_POST['Subject'];
$Message=$_POST['Message'];
$query="INSERT INTO `feedback_master`(`Email_ID`,`User_type`,`Subject`,`Message`) VALUES ('$Email_ID','$Type','$Subject','$Message')";
$result=mysql_query($query,$con);
if($result){
    echo "<script>alert('Thanks for Contacting Us! We will solve your problem / query soon and let you know by E-mail.');document.location='index.php';</script>";
}
else{
    echo "<script>alert('Something went Wrong. Please try again!');document.location='Feedback.php';</script>";
}