<?php

include"../Controller/fournisseurC.php";

//if(strlen($_SESSION['alogin'])==0)
	//{
	//header("Location: index.php"); //


require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$sql ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='popupcamps' AND `TABLE_NAME`='fournisseur'";
$db = config::getConnexion();
$query = $db->prepare($sql);
$query->execute();
$header=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($header as $heading) {
        foreach($heading as $column_heading)
            $pdf->Cell(46,12,$column_heading,1);
    }}
//code for print data
$sql = "SELECT * from  fournisseur ";
$query = $db->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($results as $row) {
        $pdf->SetFont('Arial','',12);
        $pdf->Ln();
        foreach($row as $column)
            $pdf->Cell(46,12,$column,1);
    } }
$pdf->Output();
?>
    }
<?php

