<?php
include("conn.php");
require("fpdf182_2/fpdf.php");
session_start();
$new_x_txn_no = $_SESSION['r_txn_no'];
//$x_date_time = $_SESSION['r_date_time'];
$x_sender = $_SESSION['r_sender'];
$x_sender_cp_no = $_SESSION['r_sender_cp_no'];
$x_dest = $_SESSION['r_dest'];
$x_amt = $_SESSION['r_amt'];
$x_receiver = $_SESSION['r_receiver'];
$x_receiver_cp_no = $_SESSION['r_receiver_cp_no'];
$x_relship = $_SESSION['r_relship'];
$x_purp = $_SESSION['r_purp'];
$x_title = $_SESSION['r_title'];
$x_tagline = $_SESSION['r_tagline'];
$x_address = $_SESSION['r_address'];
$x_date_time = $_SESSION['r_date_time'];
$x_logged_info = $_SESSION['r_logged_info'];
$x_contactinfo = $_SESSION['r_contactinfo'];
$x_logo = $_SESSION['r_logo'];



    $pdf = new FPDF('P','mm',array(100,150));
    $pdf->SetTopMargin(17);
    $pdf->AddPage();
    $pdf->SetFont('Arial','',7);
    $pdf->SetX(50);    
    $pdf->Cell(40,5,'',0,1);
    $pdf->Image($x_logo,40,6,20);
    $pdf->SetX(38);
    $pdf->Cell(40,0,$x_title,0,1);
    $pdf->SetX(39);
    $pdf->Cell(40,5,$x_tagline,0,1);
    $pdf->SetX(20);
    $pdf->Cell(40,0,$x_address,0,1);
    $pdf->SetX(24);
    $pdf->Cell(40,5,$x_contactinfo,0,1);
    $pdf->Cell(40,3,'',0,1);
    $pdf->SetX(37);
    $pdf->Cell(40,5,'RECEIVE MONEY FORM',0,1);
    $pdf->Cell(19,10,'Transaction No.:',0);
    $pdf->Cell(30,10,$new_x_txn_no,0);
    $pdf->Cell(13,10,'Date/Time:',0);
    $pdf->Cell(10,10,$x_date_time,0,1);
    $pdf->Cell(40,5,'Sender:',0);
    $pdf->Cell(40,5,$x_sender,0,1);
    $pdf->Cell(40,0,'Cellphone No.:',0);
    $pdf->Cell(40,0,$x_sender_cp_no,0,1);
    $pdf->Cell(40,5,'Destination:',0);
    $pdf->Cell(40,5,$x_dest,0,1);
    
    $pdf->Cell(40,0,'',0,1);
    $pdf->Cell(40,5,'Receiver:',0);
    $pdf->Cell(40,5,$x_receiver,0,1);
    $pdf->Cell(40,0,'Cellphone No.:',0);
    $pdf->Cell(40,0,$x_receiver_cp_no,0,1);
    $pdf->Cell(40,2,'',0,1);
    $pdf->Cell(40,5,'Amount:',0);
    $pdf->Cell(40,5,$x_amt,0,1);
    $pdf->Cell(40,0,'Purpose:',0);
    $pdf->Cell(40,0,$x_purp,0,1);
    $pdf->Cell(40,5,'Relationship:',0);
    $pdf->Cell(40,5,$x_relship,0,1);
    
    $pdf->Cell(40,10,'',0,1);
    $pdf->Cell(40,0,strtoupper($x_receiver),0);
    $pdf->Cell(40,0,strtoupper($x_logged_info),0,1); 
    $pdf->SetX(15);   
    $pdf->Cell(40,5,'Receiver                                     Authorized Personnel',0,1);

    $pdf->Cell(40,6,'',0,1);
    $pdf->SetX(21);
    $pdf->Cell(40,0,'Paalala: Huwag makipag-transact sa hindi kakilala.',0,1);
    $pdf->SetX(38);
    $pdf->Cell(40,5,'Maraming Salamat!',0);
    $pdf->Output();

$filename="receipt/R".$new_x_txn_no.".pdf"; //path must not started to / and use single apostrophe
$pdf->Output($filename,'F');

$updatereceivereceipt = mysqli_query($conn, "UPDATE tbl_ldlpadalaexpress SET receive_receipt='$filename' where txn_no='$new_x_txn_no'");
//header('location:'.$filename); pwedeng wala


?>
