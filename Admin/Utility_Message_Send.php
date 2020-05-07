<?php
require ("../PHPMailer/PHPMailerAutoload.php");
require("../connection.php");

$rmail=$_POST['REmail_ID'];
$subject=$_POST['Subject'];
$message=$_POST['Message'];
$id=$_POST['mit'];

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
    echo "<script>alert('Something Went Wrong during sending Mail. Please Try Again. $mail->ErrorInfo;');document.location='Message_Send.php';</script>";
}
else{
    $sql="UPDATE `feedback_master` SET `Replied`=1, Reply='$message' WHERE `Feedback_id`='$id'";
    //$query="UPDATE `feedback_master` SETWHERE `Feedback_id`='$id'";
    $result=mysql_query($sql,$con);
    //$r=mysql_query($query,$con);
    if($result){
        echo "<script>alert('E-Mail is successfully sent.');document.location='Feedback_View.php';</script>";
    }
}