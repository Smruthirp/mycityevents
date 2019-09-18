<?php 
require "fpdf.php";
ob_start();
include "pgResponse.php";
ob_end_clean();
$name = $user;

class myPDF extends FPDF{
	function header(){
		$this->Image('mylogo.png',5,2,30);
		$this->SetFont('Arial','',20);
		$this->Cell(276,5,'Event Ticket',10,0,'C');
		$this->Ln(40);
	}
	function headerTable(){
		$this->SetFont('Arial','B',12);
		$this->Cell(65,10,'User',1,0,'C');
		$this->Cell(40,10,'Booking id',1,0,'C');
		$this->Cell(40,10,'Event date',1,0,'C');
		$this->Cell(40,10,'Event time',1,0,'C');
		$this->Cell(90,10,'Total participants',1,0,'C');
		$this->Ln();
	}
	function viewTable(){

	ob_start();
	include "pgResponse.php";
	ob_end_clean();

	$this->SetFont('Arial','',12);
	$this->Cell(65,10,$user,1,0,'C');
	$this->Cell(40,10,$bookingId,1,0,'C');
	$this->Cell(40,10,$startDate,1,0,'C');
	$this->Cell(40,10,$startTime,1,0,'C');
	$this->Cell(90,10,$participant,1,0,'C');
	$this->Ln(20);
	}

	function headerTable2(){
		$this->SetFont('Arial','B',12);
		$this->Cell(100,10,'Event name',1,0,'C');
		$this->Cell(175,10,'Address',1,0,'C');
		$this->Ln();
	}

	function viewTable2(){
	ob_start();
	include "pgResponse.php";
	ob_end_clean();

	$this->SetFont('Arial','',12);
	$this->Cell(100,16,$event,1,0,'C');
	$this->SetFont('Arial','',12);
	$this->Cell(175,16,$location,1,0,'C');

	$this->Ln(20);
	$this->Write(5,'For more details, visit ');
	$this->SetFont('Arial','B',11);
	$this->SetTextColor(201, 87, 62);
	$this->Write(5,'Booking history','https://mycityevents.org/pages/booking-history.php');
	$this->Ln(10);
	$this->SetTextColor(0,0,0);
	$this->Write(5,'Do you organize events? Start selling in minutes with ');
	$this->SetFont('Arial','B',12);
	$this->SetTextColor(87, 74, 178);
	$this->Write(5,'https://mycityevents.org','https://mycityevents.org');
	$this->Ln(10);
	$this->SetTextColor(0,0,0);
	$this->SetFont('Arial','B',11);
	$this->Write(5,'Print this Ticket for your reference');

	$this->Ln(40);
	}


	function info(){
		$this->SetFont('Arial','',10);
		$this->SetTextColor(0,0,0);
		$this->Cell(276,5,'Thank you for booking with us',10,0,'R');
		$this->Ln();
	}
	function info2(){
		$this->SetFont('Arial','B',8);
		$this->SetTextColor(0,0,0);
		$this->Cell(276,5,'MY CITY EVENTS',10,0,'R');
		$this->Ln();
	}

}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->headerTable2();
$pdf->viewTable2();
$pdf->info();
$pdf->info2();
$pdf->Output();


 ?>