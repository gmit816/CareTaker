<?php
require("../connection.php");
require ("../PHPMailer/PHPMailerAutoload.php");
session_start();

$Service=$_POST['EService'];
//$SService=$_POST['ESubService'];
$City=$_POST['ECity'];
$Area=$_POST['EArea'];
$Problem=$_POST['EProblem'];
$Address=$_POST['Address1'];
$User_id=$_SESSION['User_id'];
$Amt=$_POST['CCharge'];
//echo $Service,$SService,$City,$Area,$Problem,$Address,$User_id;

$SSelect="SELECT Emp_id , Email_ID FROM `caretaker_master` WHERE Area_id='$Area' AND Service_id='$Service' AND Available=1 ORDER BY Points DESC LIMIT 1";
if( !( $Res = mysql_query( $SSelect ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
}
else{
    if (mysql_num_rows($Res) == 0) {
        $DSelect="SELECT Emp_id , Email_ID FROM `caretaker_master` WHERE City_id='$City' AND Service_id='$Service' AND Available=1 ORDER BY Points DESC LIMIT 1";
        if( !( $DRes = mysql_query( $DSelect ) ) ){
            echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
        }
        else{
            $row=mysql_fetch_assoc($DRes);
            $SProvider=$row['Emp_id'];
            //echo $Service,$SService,$City,$Area,$Problem,$Address,$User_id,$Amt;
            $sql="INSERT INTO `receipt_master`(`User_id`, `Emp_id`, `Service_id`, `Address`, `Area_id`, `City_id`, `Bill_amt`, `Booking_date`, `Problem_desc`) VALUES ('$User_id','$SProvider','$Service','$Address','$Area','$City','$Amt',NOW(),'$Problem')";
            $r=mysql_query($sql,$con);
            if($r){
                $SproUpdate="UPDATE `caretaker_master` SET Available=0 WHERE Emp_id='$SProvider'";
                $rupdate=mysql_query($SproUpdate,$con);
                if($rupdate){
                    $rmail=$_SESSION['Email_ID'];
                    $rmail2=$row["Email_ID"];
                    $subject="Booking Status - CareTaker";
                    $subject2="New Order Notification - CareTaker";
                    $message="Your requested Service is successfully Booked, our one of the best Caretaker will solve your problem as soon as possible! Please stay updated with your CareTaker's account for latest status of your requested Service.";
                    $message2="You have got new order. Please check your Caretaker account for more details.";
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

                    $mail->WordWrap = 250;
                    $mail->IsHTML(true);

                    $mail->Subject = $subject;
                    $mail->Body = $message;

                    if(!$mail->Send())
                    {
                        echo "<script>alert('Something Went Wrong during sending E-Mail to you. Please Try Again. $mail->ErrorInfo;');document.location='Book_Service.php';</script>";
                    }
                    else{
                        $mail->AddAddress($rmail2);

                        $mail->WordWrap = 250;
                        $mail->IsHTML(true);

                        $mail->Subject = $subject2;
                        $mail->Body = $message2;
                        if(!$mail->Send())
                        {
                            echo "<script>alert('Something Went Wrong during sending E-Mail to you. Please Try Again. $mail->ErrorInfo;');document.location='Book_Service.php';</script>";
                        }
                        else{

                        /*$User_select="SELECT Contact_no FROM `user_master` WHERE User_id='$User_id'";
                        $result=mysql_query($User_select,$con);
                        $row1=mysql_fetch_assoc($result);
                        require('../Textlocal.class.php');

                        $Textlocal = new Textlocal(false, false, '3T36Qb9k91c-otOweSIbKTUuvDhGvKlAFqZXBTlSgx');
                        $numbers = array($row["Contact_no"]);
                        $sender = 'TXTLCL';
                        $message = 'You have got a new order from '.$row1['Contact_no'].'. Please visit your CareTaker account for more information';

                        $response = $Textlocal->sendSms($numbers, $message, $sender);
                        print_r($response);
                        */

                            echo "<script>alert('Your order is successfully placed !');document.location='index.php';</script>";
                        }
                    }
                }
                else{
                    //echo 'Something went wrong during assigning Service Provider';
                    echo "<script>alert('Something went wrong during assigning Caretaker');document.location='Book_Service.php';</script>";
                }
            }
            else{
//            echo 'Insertion of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                echo "<script>alert('Insertion of data failed. Please book your service again.');document.location='Book_Service.php';</script>";
            }
            //echo 'mit';
      }
        //echo 'mit1';
    }
    else{
        $row=mysql_fetch_assoc($Res);
        $SProvider=$row['Emp_id'];

        //echo $Service,$SService,$City,$Area,$Problem,$Address,$User_id,$Amt;
        $sql="INSERT INTO `receipt_master`(`User_id`, `Emp_id`, `Service_id`, `Address`, `Area_id`, `City_id`, `Bill_amt`, `Booking_date`, `Problem_desc`) VALUES ('$User_id','$SProvider','$Service','$Address','$Area','$City','$Amt',NOW(),'$Problem')";
        $r=mysql_query($sql,$con);
        if($r){
            $SproUpdate="UPDATE `caretaker_master` SET Available=0 WHERE Emp_id='$SProvider'";
            $rupdate=mysql_query($SproUpdate,$con);
            if($rupdate){
                $rmail=$_SESSION['Email_ID'];
                $rmail2=$row['Email_ID'];
                $subject="Booking Status - CareTaker";
                $subject2="New Order Notification";
                $message="Your requested Service is successfully Booked, our one of the best Caretaker will solve your problem as soon as possible! Please stay updated with your CareTaker's account for latest status of your requested Service.";
                $message2="New order. Please check your CareTaker account for more details.";

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

                $mail->WordWrap = 250;
                $mail->IsHTML(true);

                $mail->Subject = $subject;
                $mail->Body = $message;

                if(!$mail->Send())
                {
                    echo "<script>alert('Something Went Wrong during sending Mail to you. Please Try Again. $mail->ErrorInfo;');document.location='Book_Service.php';</script>";
                }
                else{
                    $mail->AddAddress($rmail2);
                    $mail->WordWrap = 250;
                    $mail->IsHTML(true);

                    $mail->Subject = $subject2;
                    $mail->Body = $message2;

                    if(!$mail->Send())
                    {
                        echo "<script>alert('Something Went Wrong during sending Mail to you. Please Try Again. $mail->ErrorInfo;');document.location='Book_Service.php';</script>";
                    }
                    else{
/*                    $User_select="SELECT Contact_no FROM `user_master` WHERE User_id='$User_id'";
                    $result=mysql_query($User_select,$con);
                    $row1=mysql_fetch_assoc($result);
                    require('../Textlocal.class.php');

                    $Textlocal = new Textlocal(false, false, '3T36Qb9k91c-otOweSIbKTUuvDhGvKlAFqZXBTlSgx');
                    $numbers = array($row["Contact_no"]);
                    $sender = 'TXTLCL';
                    $message = 'You have got a new order from '.$row1['Contact_no'].'. Please visit your CareTaker account for more information';

                    $response = $Textlocal->sendSms($numbers, $message, $sender);
                    print_r($response);

*/
                    echo "<script>alert('Your order is successfully placed !');document.location='index.php';</script>";
                    }
                }
            }
            else{
                //echo 'Something went wrong during assigning Service Provider';
                echo "<script>alert('Something went wrong during assigning CareTaker');document.location='Book_Service.php';</script>";
            }
        }
        else{
//            echo 'Insertion of data from Database Failed - #'.mysql_errno().': '.mysql_error();
            echo "<script>alert('Insertion of data failed. Please book your service Again.');document.location='Book_Service.php';</script>";
        }
        //echo $row['Emp_id'];
        //echo 'mit2';
    }
}