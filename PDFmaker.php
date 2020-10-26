




<?php
include './fpdf/fpdf.php';

#Variables

Var1 = "exemplo1"
var3 = "exemplo3"

$varColection = SelectAllSomething

$pdf = new FPDF();
$pdf->addPage();

#1ºEntrada: tipo de letra; 2ºEntrada: se usa algum coisa na letra tipo negrito; 3ºEntrada: tamanho da letra.
$pdf->SetFont('Arial', 'B', 16);

#1ºEntrada: largura; 2ºEntrada altura; 3ºEntrada: titulo do documento; 4ºEntrada: 0 se não quiser uma border nas células, 1 se quiser,
#5ºEntrada: 1 se quero colocar um paragrafo depois de cada célula, 0 se não; 6ºEntrada: Se quero centralizar as células
$pdf->Cell(190, 10, utf8_decore("Titulo do documento"), 0, 0, "C");

#Acrescentar Linhas
$pdf->Ln(15);

#Mudar Fonte
$pdf->SetFont("Arial", "I", 10);

#Acrescenta célula
$pdf->Cell(50, 7, Var1, 1, 0, "C");
$pdf->Cell(40, 7, "exemplo2", 1, 0, "C");
$pdf->Cell(40, 7, var3, 1, 0, "C");
$pdf->Cell(60, 7, "exemplo4", 1, 0, "C");
$pdf->Ln();

foreach ($varColection as $varColectionItem) {
  $pdf->Cell(50, 7, utf8_decode($varColectionItem["nome"]), 1, 0, "C");
  $pdf->Cell(50, 7, $varColectionItem["ano"], 1, 0, "C");
  $pdf->Cell(50, 7, $varColectionItem["saldo"], 1, 0, "C");

}

?>
