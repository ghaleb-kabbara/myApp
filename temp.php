<?php 

require 'fpdf.php';

$name='name';
$position='position';
$department='department';
$employee_nos='employee-nos';
$joining_date='joining-date';
$leave_type='Sick Leave';
$address='address address address address address address address address';
$contact_number='+974 4444 4444';
$start_date='start-date';
$end_date='end-date';
$no_days='no-days';
$explanation='explanation explanation explanation explanation explanation explanation explanation explanation explanation explanation';
$guarantee='Name & Signature';

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		// Logo
		$this->Image('logo.jpg',25,13,49);
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Line break
		$this->Ln(18);
	}
}

$leave1 = '';
$leave2 = '';
$leave3 = '';
$leave4 = '';
$leave5 = '';

switch ($leave_type) {
  case 'Annual Leave':
    $leave1 = 'X';
    break;
  case 'Sick Leave':
    $leave2 = 'X';
    break;
  case 'Bereavement Leave':
    $leave3 = 'X';
    break;
  case 'Unpaid Leave':
    $leave4 = 'X';
    break;
  case 'Others':
    $leave5 = 'X';
    break;
  default:
    
}

$pdf = new PDF();
$pdf->SetLeftMargin(24);
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50,10,'LEAVE APPLICATION FORM');

$pdf->Ln(14);

$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(183,183,183);
$pdf->SetLineWidth(.01);

$pdf->Cell(15,9,'Name:',1,0,'L',true);
$pdf->Cell(95,9,$name,1,0,'L',false);

$pdf->Cell(30,9,'Employee nos.:',1,0,'L',true);
$pdf->Cell(25,9,$employee_nos,1,0,'L',false);

$pdf->Ln();

$pdf->Cell(15,9,'Position:',1,0,'L',true);
$pdf->Cell(50,9,$position,1,0,'L',false);

$pdf->Cell(20,9,'Department:',1,0,'L',true);
$pdf->Cell(25,9,$department,1,0,'L',false);

$pdf->Cell(23,9,'Joining date:',1,0,'L',true);
$pdf->Cell(32,9,$joining_date,1,0,'L',false);

$pdf->Ln(14);

$pdf->MultiCell(170,5,'Employees who would travel overseas should forward their passports to Human Resources at least 3 days for exit permit processing.',0,'L',false);



$pdf->Cell(15,20,$leave1,1,0,'C',true);

$pdf->Cell(150,20,'',1,0,'L',false);

$pdf->SetFont('Arial','B',9);
$pdf->SetXY(40,76);
$pdf->Cell(150,5,'Annual Leave',0,0,'L',false);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(62,76);
$pdf->Cell(150,5,'(after completing one year of service)',0,0,'L',false);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(40,80);
$pdf->Cell(150,5,'Address (while on leave):',0,0,'L',false);

$pdf->SetFont('Arial','I',9);
$pdf->SetXY(40,84);
$pdf->MultiCell(74,5,$address,0,'L',false);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(115,80);
$pdf->Cell(150,5,'Contact number (while on leave):',0,0,'L',false);

$pdf->SetFont('Arial','I',9);
$pdf->SetXY(115,84);
$pdf->MultiCell(74,5,$contact_number,0,'L',false);

$pdf->Ln(6);

$pdf->SetFont('Arial','',9);
$pdf->Cell(15,6,$leave2,1,0,'C',true);
$pdf->Cell(67,6,'',1,0,'L',false);

$pdf->SetFont('Arial','',9);
$pdf->Cell(15,6,$leave4,1,0,'C',true);
$pdf->Cell(68,6,'',1,0,'L',false);

$pdf->Ln(6);

$pdf->SetFont('Arial','',9);
$pdf->Cell(15,6,$leave3,1,0,'C',true);
$pdf->Cell(67,6,'',1,0,'L',false);

$pdf->SetFont('Arial','',9);
$pdf->Cell(15,6,$leave5,1,0,'C',true);
$pdf->Cell(68,6,'',1,0,'L',false);


$pdf->SetFont('Arial','B',9);
$pdf->SetXY(40,95.5);
$pdf->Cell(150,5,'Sick Leave',0,0,'L',false);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(58,95.7);
$pdf->Cell(150,5,'(attach medical certificate)',0,0,'L',false);

$pdf->SetFont('Arial','B',9);
$pdf->SetXY(40,101.5);
$pdf->Cell(150,5,'Bereavement Leave',0,0,'L',false);

$pdf->SetFont('Arial','B',9);
$pdf->SetXY(122,95.5);
$pdf->Cell(150,5,'Unpaid Leave',0,0,'L',false);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(144,95.7);
$pdf->Cell(150,5,'(please provide reason/s below)',0,0,'L',false);

$pdf->SetFont('Arial','B',9);
$pdf->SetXY(122,101.5);
$pdf->Cell(150,5,'Others',0,0,'L',false);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(134,101.5);
$pdf->Cell(150,5,'(please provide reason/s below)',0,0,'L',false);

$pdf->Ln(5.5);

$pdf->SetFont('Arial','',9);
$pdf->Cell(20,6,'Start date:',1,0,'L',true);
$pdf->Cell(42,6,$start_date,1,0,'L',false);
$pdf->Cell(20,6,'End date:',1,0,'L',true);
$pdf->Cell(42,6,$end_date,1,0,'L',false);
$pdf->Cell(20,6,'No. of days:',1,0,'L',true);
$pdf->Cell(21,6,$no_days,1,0,'L',false);

$pdf->Ln(6);

$pdf->Cell(55,20,'',1,0,'L',false);
$pdf->SetXY(25,106);
$pdf->SetFont('Arial','',8);
$pdf->Cell(55,20,'Explanation/reason: ',0,0,'L',false);
$pdf->SetXY(25,119);
$pdf->SetFont('Arial','I',8);
$pdf->MultiCell(55,3,$explanation,0,'L',false);

$pdf->SetXY(79,113);
$pdf->Cell(40,20,'',1,0,'L',false);
$pdf->SetXY(80,106);
$pdf->SetFont('Arial','',8);
$pdf->Cell(40,20,'Guarantee:',0,0,'L',false);
$pdf->SetXY(80,119);
$pdf->SetFont('Arial','I',8);
$pdf->MultiCell(40,3,$guarantee,0,'L',false);

$pdf->SetXY(119,113);
$pdf->Cell(24,20,'',1,0,'L',false);
$pdf->SetXY(120,114);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(25,4,'Employee\'s Signature',0,'L',false);

$pdf->SetXY(143,113);
$pdf->Cell(23,20,'',1,0,'L',false);
$pdf->SetXY(144,114);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(25,4,'Dept. Head\'s Signature',0,'L',false);

$pdf->SetXY(166,113);
$pdf->Cell(23,20,'',1,0,'L',false);
$pdf->SetXY(167,114);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(25,4,'HR Signature',0,'L',false);

$pdf->Output();
?>