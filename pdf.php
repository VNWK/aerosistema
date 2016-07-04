<?php
$table = $_POST['table'];

require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF('vertical','mm','Letter');
$pdf->SetFont('helvetica', '', 11);

// add a page
$pdf->AddPage();
$html ='<table><tr><td align="center"><img src="img/header.jpg"></td></tr></table>';
$pdf->writeHTML($html, true, false, true, false, '');
$html= $table;
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();
$pdf->Output('example_006.pdf', 'I');

?>