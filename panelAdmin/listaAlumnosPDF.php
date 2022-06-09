<?php
require('FPDF/fpdf.php');

class PDF extends FPDF
{

	function __construct()
       {
          parent::FPDF();
       }
// Cabecera de p�gina
function Header()
{
	
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	
	// T�tulo
	$this->Cell(0,10,'LISTADO PEDIDOS PENDIENTES',"B",0,'C');
	// Salto de l�nea
	$this->Ln(20);
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$cabecera=false;
$conexion= new mysqli("localhost","root","","todomarvel");
$result=$conexion->query("Select username, pedido, tipo, comentario, fecha from pedidos where estado!='Publicado'");

while($fila=$result->fetch_assoc()){
	if(!$cabecera){
		
		foreach($fila as $indice=>$valor){
			
			$pdf->cell(35,10,$indice);	
		}
		$cabecera=true;
		$pdf->Ln(12);
	}
	foreach($fila as $indice=>$valor){
		
		$pdf->cell(35,10,$valor);
	}
	$pdf->Ln(8);
}
$result->free();
$conexion->close();

ob_end_clean();
$pdf->Output();



?>
