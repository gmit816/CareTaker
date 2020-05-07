<?php
require ("../PHPMailer/PHPMailerAutoload.php");
require("../connection.php");
require("../fpdf.php");
session_start();

$Receipt_id=$_GET['id'];
$rselect="SELECT * FROM `receipt_master` where Receipt_id='$Receipt_id'";
if(!($rresult=mysql_query($rselect))){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
}
else
{
    $rrow=mysql_fetch_array($rresult);

    $cselect = "SELECT * FROM `city_master` WHERE City_id='{$rrow['City_id']}'";
    $cRes = mysql_query( $cselect );
    $crow=mysql_fetch_array($cRes);

    $aselect = "SELECT * FROM `area_master` WHERE Area_id='{$rrow['Area_id']}'";
    $aRes = mysql_query( $aselect );
    $arow=mysql_fetch_assoc($aRes);

    $sselect = "SELECT * FROM `service_master` WHERE Service_id='{$rrow['Service_id']}'";
    $sRes = mysql_query( $sselect );
    $srow=mysql_fetch_assoc($sRes);
    $Service_name=$srow['Service_type'];
    $Fees=$srow['Service_fees'];
    $extra=$rrow['Bill_amt']-$Fees;

    $pselect = "SELECT * FROM `caretaker_master` WHERE Emp_id='{$rrow['Emp_id']}'";
    $pRes = mysql_query( $pselect );
    $prow=mysql_fetch_assoc($pRes);
    $SName=$prow['First_name']." ".$prow['Last_name'];
    $SImage="../images/".$prow['Profile_image'];
    //$Sid=$prow['Emp_id'];

    $Total="Rs. ".$rrow['Bill_amt'];
    $Thanks="Thanks for using CareTaker, ".$_SESSION['First_name']." !";
    $CName=$_SESSION['First_name']." ".$_SESSION['Last_name'];
    $Address=$rrow['Address'].", ".$arow['Area_name'].", ".$crow['City_name'];
    $Consultancy=$Fees." Rs.";
    $Extra_Charge=$extra." Rs.";
    $Total_Charge=$rrow['Bill_amt']." Rs.";

    $PDF_name=$Receipt_id.".pdf";

    $uselect="SELECT Email_ID FROM `user_master` WHERE User_id='{$rrow['User_id']}'";
    $uRes=mysql_query($uselect,$con);
    $urow=mysql_fetch_assoc($uRes);

    $Subject="Invoice of Your Previous Service";
    $Message="Dear ".$urow['Email_ID'].", Herewith, We are attaching the Invoice of Your Previous Service. Thanks for choosing us!";

    class PDF extends FPDF
    {
// Page header
        function Header()
        {
            //  Logo
            $this->Image('../images/CT LOGO.png',15,8,40);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            //Move to the right
            $this->Cell(30);
            //Title
            $this->Cell(130,15,'INVOICE','','','C');
            //$this->SetFont('Arial','B',10);
            //$this->Cell(20,15,'01/05/2016 00:00:00','','','C');
            // Line break
            $this->Ln(30);
        }

// Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(190 - $this->GetStringWidth('Page '.$this->PageNo().'/{nb}'));
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    $pdf = new PDF();
//page number mate
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(12);
    $pdf->Cell('116',10,$Total,'','');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(0,10,$Thanks,'','','');
// TB stands for Top Border
// C stands for center
    $pdf->Ln(20);

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(12);
    $pdf->Cell('25',10,'Receipt Id :','','');
    $pdf->Cell('',10,$Receipt_id,'','');
//$pdf->MultiCell(0,10, $row2['question_detail'],'TB','C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(12);
    $pdf->Cell('38',10,"Customer's Name :",'','');
    $pdf->Cell('',10,$CName,'','');
//$pdf->MultiCell(0,10, $row2['question_detail'],'TB','C');
    $pdf->Ln(15);

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(12);
    $pdf->Cell('43',10,"Customer's Address :",'','');
    $pdf->MultiCell('70',10,$Address,'','');
//$pdf->Cell('',10,'Address :','','C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(12);
    $pdf->Cell('40',10,"Service Requested :",'','');
    $pdf->Cell('40',10,$Service_name,'','');
//$pdf->MultiCell(0,10, $row2['question_detail'],'TB','C');
//$pdf->Cell('50',10,"Sub-Service Requested :",'','');
//$pdf->Cell('',10,$ssrow['Subservice_name'],'','');
    $pdf->Ln(10);

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(12);
    $pdf->Cell('30',10,"Booking Date :",'','');
    $pdf->Cell('50',10,$rrow['Booking_date'],'','');
    $pdf->Cell('50',10,"Service Completion Date :",'','');
    $pdf->Cell('',10,$rrow['SServed_date'],'','');
//$pdf->MultiCell(0,10, $row2['question_detail'],'TB','C');
    $pdf->Ln(15);

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(12);
    $pdf->Cell('43',10,"Problem Description :",'','');
    $pdf->MultiCell('70',5,$rrow['Problem_desc'],'','');
//$pdf->Cell('',10,'Address :','','C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(12);
    $pdf->Cell('40',25,"Problem Solved By :",'','');
    $pdf->Cell('50',25,$SName,'','');
//$pdf->MultiCell(0,10, $row2['question_detail'],'TB','C');
    $pdf->Ln(30);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(12);
    $pdf->MultiCell(0,10, 'Charges','TB','C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(60);
//$pdf->MultiCell(0,10, 'Consultancy Charges : 20','','C');
    $pdf->Cell('1',10,"Consultancy Charges :",'','');
    $pdf->MultiCell(0,10,$Consultancy,'','C');
//$pdf->Cell('',10,"20",'','C');
    $pdf->Ln(0);

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(60);
//$pdf->MultiCell(0,10, 'Consultancy Charges : 20','','C');
    $pdf->Cell('1',5,"Extra Charges & Taxes :",'','');
    $pdf->MultiCell(0,5,$Extra_Charge,'','C');
    $pdf->Cell(60);
    $pdf->MultiCell(70,5,' ','B','C');
//$pdf->Cell('',10,"20",'','C');
    $pdf->Ln(0);

    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(60);
//$pdf->MultiCell(0,10, 'Consultancy Charges : 20','','C');
    $pdf->Cell('1',10,"Total :",'','');
    $pdf->MultiCell(0,10,$Total_Charge,'','C');
//$pdf->Cell('',10,"20",'','C');
    $pdf->Ln(0);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(12);
    $pdf->MultiCell(0,10, ' ','B','C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',12);
    $pdf->MultiCell(300,10,'By Order,','','C');
    $pdf->SetFont('Arial','',12);
    $pdf->MultiCell(300,'5','CareTaker','','C');
//$pdf->MultiCell(300,'5','Founder of HomeHelpers','','C');
//$pdf->MultiCell(0,10,$row1['answer_detail'],'TB','C');

    $pdf->Output($PDF_name,'F');

    //Email Send Starts
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
    $mail->AddAddress($urow['Email_ID']);

    $mail->WordWrap = 128;
    $mail->IsHTML(true);

    $mail->Subject = $Subject;
    $mail->Body = $Message;
    $mail->AddAttachment($PDF_name);

    if(!$mail->Send())
    {
        echo "<script>alert('Something Went Wrong during sending E-Mail. Please Try Again. $mail->ErrorInfo;');document.location='PDF_Download';</script>";
    }
    else{
        echo "<script>alert('The Service is successfully Ended !');document.location='../CT/index.php';</script>";
    }
}