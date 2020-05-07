<?php
require("../connection.php");
$Id=$_POST['Receipt_id'];
$Status=$_POST['Status'];
$Charge=$_POST['Charges'];
$Solution=$_POST['Solution'];
$Old_Charge=$_POST['Bill'];
$Bill=$Old_Charge+$Charge;
//echo $Charge." ".$Old_Charge." ".$Bill;
//$Tax=$Bill*(0.7);
//echo " ".$Tax;
if($Status!=3){
    $Update="UPDATE `receipt_master` SET Status='{$Status}', Bill_amt='{$Bill}', Solution='{$Solution}' WHERE Receipt_id='{$Id}'";
    $UResult=mysql_query($Update,$con);
    if($UResult){
        echo "<script>alert('Current Service is successfully updated.');document.location='MCService.php';</script>";
    }
    else{
        echo "<script>alert('Something went wrong. Please Try again');document.location='MCService.php?id=$Id';</script>";
    }
}
else{
    $Tax=$Bill*0.07;
    $TBill=$Bill+$Tax;
    $Total=round($TBill);
    echo $Solution;
    if($Solution==" "){
        echo "1";
        $Update="UPDATE `receipt_master` SET Status='{$Status}', Bill_amt='{$Total}', SServed_date=NOW() WHERE Receipt_id='{$Id}'";
    }
    else{
        echo "2";
        $Update="UPDATE `receipt_master` SET Status='{$Status}', Bill_amt='{$Total}', Solution='{$Solution}', SServed_date=NOW() WHERE Receipt_id='{$Id}'";
    }
    $UResult=mysql_query($Update,$con);
    if($UResult){
        $RSelect= "SELECT Receipt_id, Rating, Emp_id, User_id FROM `receipt_master` WHERE Receipt_id='{$Id}'";
        $RResult=mysql_query($RSelect,$con);
        $RRow=mysql_fetch_assoc($RResult);

        $SPSelect = "SELECT Points FROM `caretaker_master` WHERE Emp_id='{$RRow['Emp_id']}'";
        $SPResult=mysql_query($SPSelect,$con);
        $SPRow=mysql_fetch_assoc($SPResult);

        if($RRow['Rating']==0){
            $Points=$SPRow['Points'];
        }
        elseif($RRow['Rating']==1){
            $Points=$SPRow['Points']-2;
        }
        elseif($RRow['Rating']==2){
            $Points=$SPRow['Points']-1;
        }
        elseif($RRow['Rating']==3){
            $Points=$SPRow['Points']+1;
        }
        elseif($RRow['Rating']==4){
            $Points=$SPRow['Points']+2;
        }
        else{
            $Points=$SPRow['Points']+3;
        }

        $SPUpdate="UPDATE `caretaker_master` SET Available=1, Points='{$Points}' WHERE Emp_id='{$RRow['Emp_id']}'";
        $SPUResult=mysql_query($SPUpdate,$con);
        if($SPUResult){
            echo "<script>document.location='../Invoice/PDF_Download.php?id={$RRow['Receipt_id']}';</script>";
        }
        else{
            echo "<script>alert('Something went wrong in updating CT. Please Try again');document.location='MCService.php?id=$Id';</script>";
        }

    }
    else{
        echo "<script>alert('Something went wrong in updating Receipt. Please Try again');document.location='MCService.php?id=$Id';</script>";
    }
}