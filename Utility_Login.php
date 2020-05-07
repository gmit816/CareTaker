<?php
require("connection.php");
$type=$_GET['type'];
$Email_ID=$_POST['Email_ID'];
$Password=$_POST['Password'];
if($type=="User"){
    $sql="select * from `user_master` where Email_ID='$Email_ID' and Password='$Password'";
    $r=mysql_query($sql,$con);
    if(mysql_num_rows($r)==1) {
        $row=mysql_fetch_array($r);
        session_start();
        $_SESSION["User_id"]= $row['User_id'];
        $_SESSION["First_name"] = $row['First_name'];
        $_SESSION['Last_name'] = $row['Last_name'];
        $_SESSION["Email_ID"] = $row['Email_ID'];
        $_SESSION["User_type"] = $row['User_type'];
        if($row['User_type']=="Admin") {
            header("location: Admin/index.php");
        }
        else {
            header("location: User/index.php");
        }
    }
    else {
        echo "<script>alert('Wrong Email_ID or Password. Please try again!');document.location='index.php';</script>";
    }
}
else {
    $sql="select * from `caretaker_master` where Email_ID='$Email_ID' and Password='$Password'";
    $r=mysql_query($sql,$con);
    if(mysql_num_rows($r)==1) {
        $row=mysql_fetch_array($r);
        session_start();
        $_SESSION["User_id"]= $row["Emp_id"];
        $_SESSION["First_name"] = $row["First_name"];
        $_SESSION['Last_name'] = $row["Last_name"];
        $_SESSION["Email_ID"] = $row["Email_ID"];
        if($row['User_type']=="Admin") {
            header("location: Admin/index.php");
        }
        else {
            header("location: CT/index.php");
        }
    }
    else {
        echo "<script>alert('Wrong Email_ID or Password. Please try again!');document.location='index.php';</script>";
    }
}