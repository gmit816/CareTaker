<?php
require("../connection.php");
$First_name=$_POST['First_name'];
$Last_name=$_POST['Last_name'];
$Email_ID=$_POST['Email_ID'];
$path="../images/". basename($_FILES['Image']['name']);
$gandhi=basename($path);
$City=$_POST['City_id'];
$Area=$_POST['City'];
$Service=$_POST['Service'];
$Contact=$_POST['Contact'];

if(move_uploaded_file($_FILES['Image']['tmp_name'],$path)){
    $sql="INSERT INTO `caretaker_master`(`First_name`,`Last_name`,`Email_ID`,`Profile_image`,`Service_id`,`City_id`,`Area_id`,`Contact_no`,`Time_Stamp`) VALUES ('$First_name','$Last_name','$Email_ID','$gandhi','$Service','$City','$Area','$Contact',NOW())";
    $result=mysql_query($sql,$con);
    if($result){
        echo "<script>alert('$Email_ID is Successfully Added!');document.location='CareTaker_Manage.php';</script>";
    }
    else{
        echo "<script>alert('Something went Wrong.');document.location='CareTaker_Add.php';</script>";
    }
}
else
{
    echo "<script>alert('Something went Wrong in uploading the image');document.location='CareTaker_Add.php';</script>";
}
