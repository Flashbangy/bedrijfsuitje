<?php
//PDF configuratie code
include_once('dbconfig.php');

define('FPDF_FONTPATH','font/');
include_once('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$sth = $conn->prepare('SELECT * FROM inschrijvingen'); 
$sth->execute();                    
$result = $sth->fetchAll();
foreach($result as $r){
$pdf->Cell(40,10,$r['activiteiten_id']);
$pdf->Cell(40,12,$r['users_id']);
}
$pdf->Output();
?>
