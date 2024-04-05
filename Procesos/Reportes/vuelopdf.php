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
   
    $path = "VueloPdfSelectUser-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultavuelo.php");
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

        $this->Cell(70,10,'Reporte de vuelos',0,0,'C');

       

        
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

        $this->SetFont('Arial','B',10);
        // Color de texto
        $this->SetTextColor(66,92,90);
        $this->Ln(12);
        $this->Cell(-1);
        $this->cell(16,10,'Vuelo',1,0,'C',0);
        $this->cell(20,10,'Codigo',1,0,'C',0);
        $this->cell(26,10,'Salida',1,0,'C',0);
        $this->cell(26,10,'Llegada',1,0,'C',0);
        $this->cell(28,10,'Hr salida',1,0,'C',0);
        $this->cell(28,10,'Hr llegada',1,0,'C',0);
        $this->cell(20,10,'Fecha',1,0,'C',0);
        $this->cell(15,10,'Precio',1,0,'C',0);
        $this->cell(17,10,'Aeronave',1,1,'C',0);

      

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


try {
    $consulta="SELECT * from 	uelo";
    $resultado=$conn->query($consulta);
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "VueloPdfSelectVuelo-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultavuelo.php");
}




$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
while($row=$resultado->fetch_assoc()){
    $pdf->Cell(-1);
    $pdf->cell(16,10,$row['Id_Vuelo'],1,0,'C',0);
    $pdf->cell(20,10,$row['Codigo'],1,0,'C',0); 
    $pdf->cell(26,10,$row['Lugar_Salida'],1,0,'C',0);
    $pdf->cell(26,10,$row['Lugar_LLegada'],1,0,'C',0);
    $pdf->cell(28,10,$row['Hora_Salida'],1,0,'C',0);
    $pdf->cell(28,10,$row['Hora_LLegada'],1,0,'C',0);
    $pdf->cell(20,10,$row['Fecha'],1,0,'C',0);
    $pdf->cell(15,10,$row['Precio'],1,0,'C',0);
    $pdf->cell(17,10,$row['Id_Aeronave'],1,0,'C',0);



    $pdf->Ln(10);

}
$pdf->Output();

?>