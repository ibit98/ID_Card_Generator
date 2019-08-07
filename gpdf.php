<?php
require('fpdf181/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    //$this->Cell(9,14,1,1,'C',true);
}
}


$pdf = new FPDF('P','mm',array(100,150));
$pdf->AddPage();
$pdf->SetAutoPageBreak(false,0);
$pdf->Image('images/background1.jpg',0,0,100,150);
$pdf->Image('images/logo.png',12,10,14,16);

$pdf->SetFont('Times','B',28);
$pdf->SetXY(27,11);
$pdf->Cell(40,10,'COENSOBEC');
$pdf->SetFont('Times','',8);
$pdf->SetXY(28,18);
$pdf->Cell(40,10,'The Society of CST Department of IIEST Shibpur');

$info = pathinfo($_FILES['my_file']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = "avatar.".$ext; 
$target = 'uploads/'.$newname;
if(file_exists($target)) unlink("$target");
move_uploaded_file( $_FILES['my_file']['tmp_name'], $target);
$pdf->Image('uploads/'.$newname ,35,32,35,35,$ext);

$pdf->SetY(80);
$pdf->SetFont('Helvetica','B',28);
$pdf->SetTextColor(0,0,139);
//$pdf->AddFont('Roboto','B','RobotoMono-Regular.ttf');
$pdf->Cell(0,0,$_POST["firstname"],0,0,'C');

$pdf->SetY(94);
$pdf->SetFont('Helvetica','B',28);
$pdf->Cell(0,0,$_POST["lastname"],0,0,'C');

$pdf->SetXY(12,100);
$pdf->SetFont('Times','B',12);
$pdf->SetTextColor(30,144,255);
$pdf->Cell(10,10,'Course : ',0,0,'L');

$pdf->SetFont('Arial','B',12);
$pdf->SetXY(30,100);
$pdf->SetTextColor(0,0,139);
$pdf->Cell(0,10,$_POST["course"],0,0,'L');

$pdf->SetXY(12,108);
$pdf->SetFont('Times','B',12);
$pdf->SetTextColor(30,144,255);
$pdf->Cell(10,10,'Year of Joining : ',0,0,'L');

$pdf->SetFont('Arial','B',12);
$pdf->SetXY(45,108);
$pdf->SetTextColor(0,0,139);
$pdf->Cell(0,10,$_POST["yoj"],0,0,'L');

$pdf->SetXY(12,116);
$pdf->SetFont('Times','B',12);
$pdf->SetTextColor(30,144,255);
$pdf->Cell(10,10,'Date of Birth : ',0,0,'L');

$pdf->SetFont('Arial','B',12);
$pdf->SetXY(40,116);
$pdf->SetTextColor(0,0,139);
$pdf->Cell(0,10,$_POST["dob"].'/'.$_POST['mob'].'/'.$_POST['yob'],0,0,'L');

$pdf->SetXY(12,124);
$pdf->SetFont('Times','B',12);
$pdf->SetTextColor(30,144,255);
$pdf->Cell(10,10,'Address : ',0,0,'L');

$pdf->SetFont('Arial','B',12);
$pdf->SetXY(32,127);
$pdf->SetTextColor(0,0,139);
$pdf->Multicell(0,5,$_POST["address"]);

$pdf->SetXY(98,142);
$pdf->SetFont('Times','I',12);
$pdf->SetTextColor(234,255,230);
$pdf->Cell(0,10,'Indranil Bit',0,0,'R');

$pdf->Output();
?>