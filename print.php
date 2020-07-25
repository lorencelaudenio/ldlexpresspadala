<?php
include("conn.php");
require("fpdf182_2/fpdf.php");
session_start();
$d_txn_no = $_SESSION['s_txn_no'];
$d_sender = $_SESSION['s_sender'];
$d_sender_cp_no = $_SESSION['s_sender_cp_no'];
$d_dest = $_SESSION['s_dest'];
$d_amt = $_SESSION['s_amt'];
$d_receiver = $_SESSION['s_receiver'];
$d_receiver_cp_no = $_SESSION['s_receiver_cp_no'];
$d_relship = $_SESSION['s_relship'];
$d_purp = $_SESSION['s_purp'];
$d_title = $_SESSION['s_title'];
$d_tagline = $_SESSION['s_tagline'];
$d_address = $_SESSION['s_address'];
$d_date_time = $_SESSION['s_date_time'];
$d_logged_info = $_SESSION['s_logged_info'];
$d_contactinfo = $_SESSION['s_contactinfo'];
$d_logo = $_SESSION['s_logo'];





    $pdf = new FPDF('P','mm',array(100,150));
    $pdf->SetTopMargin(17);
    $pdf->AddPage();
    $pdf->SetFont('Arial','',7);
    $pdf->SetX(50);    
    $pdf->Image($d_logo,40,6,20);
    $pdf->Cell(40,5,'',0,1);
    $pdf->SetX(38);
    $pdf->Cell(40,0,$d_title,0,1);
    $pdf->SetX(39);
    $pdf->Cell(40,5,$d_tagline,0,1);
    $pdf->SetX(20);
    $pdf->Cell(40,0,$d_address,0,1);
    $pdf->SetX(24);
    $pdf->Cell(40,5,$d_contactinfo,0,1);
    $pdf->Cell(40,3,'',0,1);
    $pdf->SetX(37);
    $pdf->Cell(40,5,'SEND MONEY FORM',0,1);
    $pdf->Cell(19,10,'Transaction No.:',0);
    $pdf->Cell(30,10,$d_txn_no,0);
    $pdf->Cell(13,10,'Date/Time:',0);
    $pdf->Cell(10,10,$d_date_time,0,1);
    $pdf->Cell(40,5,'Sender:',0);
    $pdf->Cell(40,5,$d_sender,0,1);
    $pdf->Cell(40,0,'Cellphone No.:',0);
    $pdf->Cell(40,0,$d_sender_cp_no,0,1);
    $pdf->Cell(40,5,'Destination:',0);
    $pdf->Cell(40,5,$d_dest,0,1);
    
    $pdf->Cell(40,0,'',0,1);
    $pdf->Cell(40,5,'Receiver:',0);
    $pdf->Cell(40,5,$d_receiver,0,1);
    $pdf->Cell(40,0,'Cellphone No.:',0);
    $pdf->Cell(40,0,$d_receiver_cp_no,0,1);
    $pdf->Cell(40,2,'',0,1);
    $pdf->Cell(40,5,'Amount:',0);
    $pdf->Cell(40,5,$d_amt,0,1);
    $pdf->Cell(40,0,'Purpose:',0);
    $pdf->Cell(40,0,$d_purp,0,1);
    $pdf->Cell(40,5,'Relationship:',0);
    $pdf->Cell(40,5,$d_relship,0,1);
    
    $pdf->Cell(40,10,'',0,1);
    $pdf->Cell(40,0,strtoupper($d_sender),0);
    $pdf->Cell(40,0,strtoupper($d_logged_info),0,1);  
    $pdf->SetX(15);   
    $pdf->Cell(40,5,'Sender                                     Authorized Personnel',0,1);

    $pdf->Cell(40,6,'',0,1);
    $pdf->SetX(21);
    $pdf->Cell(40,0,'Paalala: Huwag makipag-transact sa hindi kakilala.',0,1);
    $pdf->SetX(38);
    $pdf->Cell(40,5,'Maraming Salamat!',0);
    $pdf->Output();

$filename="receipt/S".$d_txn_no.".pdf"; //path must not started to / and use single apostrophe

$pdf->Output($filename,'F');
//header('location:'.$filename); pwedeng wala

$sql = mysqli_query($conn, "UPDATE tbl_ldlpadalaexpress SET send_receipt='$filename' where txn_no='$d_txn_no'");

?>
