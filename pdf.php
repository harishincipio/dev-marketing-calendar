
<?php
require('fpdf.php');

$pdf = new FPDF();
//var_dump(get_class_methoda($pdf));

$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();

echo $pdf->Output();
?>