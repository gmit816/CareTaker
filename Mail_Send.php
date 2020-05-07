<?php
require ("PHPMailer/PHPMailerAutoload.php");
require("connection.php");

$Email_ID=$_POST['Email_ID'];
$Contact=$_POST['Contact'];
$Type=$_POST['Type'];

if($Type=="User") {
    $select = "SELECT * FROM `user_master` WHERE Email_id='$Email_ID' and Contact_no='$Contact'";
}
else
{
    $select = "SELECT * FROM `caretaker_master` WHERE Email_id='$Email_ID' and Contact_no='$Contact'";
}
$r=mysql_query($select,$con);
if(mysql_num_rows($r)==1){

    $row=mysql_fetch_array($r);
    $rmail=$row['Email_ID'];
    $subject="Forget Password!";
    $message="Your Current Password for CareTaker is "."'".$row['Password']."' !";

    $mail = new PHPMailer();

    $mail->IsSMTP();

    $mail->SMTPDebug= 0;

    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;

    $mail->Username = "gmit816@gmail.com";
    $mail->Password = "unique$940";
    $mail->From = "gmit816@gmail.com";
    $mail->FromName = "Mit Gandhi";
    $mail->AddAddress($rmail);

    $mail->WordWrap = 128;
    $mail->IsHTML(true);

    $mail->Subject = $subject;
    $mail->Body = $message;

    if(!$mail->Send())
    {
        echo "<script>alert('Something Went Wrong during sending Mail. Please Try Again. $mail->ErrorInfo;');document.location='FPassword.php';</script>";
    }
    else{
            echo "<script>alert('Password is successfully recovered. Please check Your registered Email Id.');document.location='index.php';</script>";
    }
}
else{
    echo "<script>alert('Wrong Email_Id or Contact Number. Please Try Again. $mail->ErrorInfo;');document.location='FPassword.php';</script>";
}