<?php
require("../connection.php");
$Service=$_POST['Service'];
//$Desc=$_POST['Desc'];
//$path="../images/icons/". basename($_FILES['Icon']['name']);
//$gandhi=basename($path);
$Fees=$_POST['Fees'];
$mit="SELECT * FROM `service_master` WHERE Service_type='$Service'";
$res=mysql_query($mit,$con);
if(mysql_num_rows($res)==1){
    echo "<script>alert('$Service is already Existed. Try Again.');document.location='Service_Add.php';</script>";
}
else{
    //if(isset($_FILES)){
     //   if(empty($_FILES['Icon']['tmp_name'])){
            $sql="INSERT INTO `service_master`(`Service_type`,`Service_fees`) VALUES ('$Service','$Fees')";
            $result=mysql_query($sql,$con);
            if($result){
                echo "<script>alert('$Service is Successfully Added!');document.location='Service_Manage.php';</script>";
            }
            else{
                echo "<script>alert('Something went Wrong.');document.location='Service_Add.php';</script>";
            }
       // }
        /*else{
            if(move_uploaded_file($_FILES['Icon']['tmp_name'],$path)){
                $sql="INSERT INTO `service_master`(`Service_name`,`Service_description`,`Service_fees`,`Service_icon`) VALUES ('$Service','$Desc','$Fees','$gandhi')";
                $result=mysql_query($sql,$con);
                if($result){
                    echo "<script>alert('$Service is Successfully Added!');document.location='Service_Manage.php';</script>";
                }
                else{
                    echo "<script>alert('Something went Wrong.');document.location='Service_Add.php';</script>";
                }
            }
            else
            {
                echo "<script>alert('Something went Wrong in uploading the image');document.location='Service_Add.php';</script>";
            }*/
      //  }
 //   }
}