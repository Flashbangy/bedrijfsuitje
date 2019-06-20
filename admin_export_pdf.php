<?php
include_once('dbconfig.php');
/*if(isset($_SESSION) && $_SESSION['gebruikersnaam'] == 'admin'){
    echo '<h2>welcome admin</h2>';
} else {
    header('Location: index.php?page=admin_login');
}*/
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
}

$pdf->Output();
?>
