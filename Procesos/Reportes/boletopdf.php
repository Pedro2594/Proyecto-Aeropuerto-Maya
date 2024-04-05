<?php

session_start();
if (!isset($_SESSION['idUser'])) {
    echo "No está autorizado para ver esto";
    header('location: index.php'); 
    die();
}
require('fpdf.php');
require "../../conexion.php";
date_default_timezone_set('America/Mexico_City');

$user=$_SESSION['idUser'];
try {
    $queryparametro=mysqli_query($conn, "SELECT Usuario FROM usuario WHERE `idUser`=$user;");
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "BoletoPdfSelectUser-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultaboletos.php");
}


    
    $rangini = array();
  
    while($datos = mysqli_fetch_array($queryparametro)) {
        array_push($rangini, $datos['Usuario']);
    }

    $rangoinicial=$rangini[0];

    date_default_timezone_set('America/Mexico_City');

    $fechaActual = date("d-m-Y");
    $horaActual = date("H:i:s");

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
     $this->Image('img/Emirates-Logo-1985-19991.png',10,8,40);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
     // Color de texto
     $this->SetTextColor(66,92,90);
    // Movernos a la derecha
    $this->Cell(60);
    // Título

    $this->Cell(70,10,'Reporte de boletos',0,0,'C');


    $this->SetFont('Arial','',12);
	$this->SetTextColor(39,39,51);
	$this->Cell(150,9,utf8_decode(""),0,0,'L');

	$this->Ln(10);
    $this->Cell(150);
	
	$this->Cell(250,9,utf8_decode("Usuario: ".$GLOBALS["rangoinicial"]),0,0,'L');

	$this->Ln(7);
    $this->Cell(150);
	$this->Cell(150,9,utf8_decode("Fecha: ".$GLOBALS["fechaActual"] ),0,0,'L');

    $this->Ln(7);
    $this->Cell(150);
	$this->Cell(150,9,utf8_decode("Hora: ".$GLOBALS["horaActual"]),0,0,'L');
	
    $this->Ln(7);
    $this->Cell(117,7,utf8_decode(''),'',0,'C');
    $this->Cell(10,7,utf8_decode('_____________________________________________________________________________________________________________________________'),'',0,'C');
    // Salto de línea

    $this->SetFont('Arial','B',12);
     // Color de texto

    $this->SetTextColor(66,92,90);
    $this->Ln(12);
    $this->Cell(5);
    $this->cell(20,10,'Boleto',1,0,'C',0);
    $this->cell(20,10,'Codigo',1,0,'C',0);
    $this->cell(20,10,'Asiento',1,0,'C',0);
    $this->cell(20,10,'Pasajero',1,0,'C',0);
    $this->cell(20,10,'Vuelo',1,0,'C',0);
    $this->cell(20,10,'Equipaje',1,0,'C',0);
    $this->cell(20,10,'Clase',1,0,'C',0);
    $this->cell(20,10,'Precio',1,0,'C',0);
    $this->cell(20,10,'Estado',1,1,'C',0);
}
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetFont('Arial','',12);
	$this->SetTextColor(39,39,51);
    $this->Ln(7);
    $this->Cell(117,7,utf8_decode(''),'',0,'C');
    $this->Cell(10,7,utf8_decode('_____________________________________________________________________________________________________________________________'),'',0,'C');
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require "../../conexion.php";
try {
    $consulta="SELECT * from boleto";
    $resultado=$conn->query($consulta);
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "BoletoPDFSelectBoleto-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultaboletos.php");
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while($row=$resultado->fetch_assoc()){
    $pdf->Cell(5);
    $pdf->cell(20,10,$row['Id_Boleto'],1,0,'C',0);
    $pdf->cell(20,10,$row['Codigo'],1,0,'C',0); 
    $pdf->cell(20,10,$row['Id_Asiento'],1,0,'C',0);
    $pdf->cell(20,10,$row['Id_Pasajero'],1,0,'C',0);
    $pdf->cell(20,10,$row['Id_Vuelo'],1,0,'C',0);
    $pdf->cell(20,10,$row['Id_Equipaje'],1,0,'C',0);
    $pdf->cell(20,10,$row['Id_Clase'],1,0,'C',0);
    $pdf->cell(20,10,$row['Precio'],1,0,'C',0);
    $pdf->cell(20,10,$row['Estado'],1,0,'C',0);

    $pdf->Ln(10);
  
   
}
    $pdf->Output();

?>    