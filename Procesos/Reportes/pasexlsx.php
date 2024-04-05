<?php

require "../../conexion.php";

require '../../vendor/autoload.php';
date_default_timezone_set('America/Mexico_City');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="pase.xlsx"');
header('Cache-Control: max-age=0');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet ->getProperties()->setTitle("Pase de abordar");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();
$hojaActiva->setTitle("Pase de abordar");

session_start();

$user=$_SESSION['idUser'];
try {
    $queryparametro=mysqli_query($conn, "SELECT Usuario FROM usuario WHERE `idUser`=$user;");
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "PaseXLSXSelectUser-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultapaseabordar.php");
}

    $rangini = array();
while($datos = mysqli_fetch_array($queryparametro)) {
        array_push($rangini, $datos['Usuario']);
    }

    $rangoinicial=$rangini[0];

    date_default_timezone_set('America/Mexico_City');

    $fechaActual = date("d-m-Y");

    $horaActual = date("H:i:s");

    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => '00000000'],
            ],
        ],
    ];
    
    
    $spreadsheet->getDefaultStyle()->getFont()->setBold(true);
    $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
    $spreadsheet->getDefaultStyle()->getFont()->setSize(12);
    $spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(70, 'pt');

$hojaActiva->mergeCells('A1:F1');
//ESPACIADO A LA TABLA DE USUARIO
$hojaActiva->getStyle('A1:f3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->setCellValue('A1','Reporte de pases de abordar');
$hojaActiva->setCellValue('H1', 'Usuario:');
$hojaActiva->setCellValue('I1', $rangoinicial);
//NEGRITA DE LOS DATOS DEL USUARIO
$hojaActiva->getStyle('H1:I3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$hojaActiva->setCellValue('H2', 'Fecha:');
$hojaActiva->setCellValue('I2', $fechaActual);
$hojaActiva->setCellValue('H3', 'Hora:');
$hojaActiva->setCellValue('I3', $horaActual);


$hojaActiva->setCellValue('A2','Id del pase');
$hojaActiva->setCellValue('B2','Codigo');
$hojaActiva->setCellValue('C2','Fecha');
$hojaActiva->setCellValue('D2','Puerta de embarque');
$hojaActiva->setCellValue('E2','Id del boleto');
$hojaActiva->setCellValue('F2','Id del pasajero');

$hojaActiva->getStyle('A1:F2')->applyFromArray($styleArray);
$hojaActiva->getStyle('H1:I3')->applyFromArray($styleArray);
$spreadsheet->getDefaultStyle()->getFont()->setBold(false);

$hojaActiva->getStyle('A3:F100')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


try {
    $consulta="SELECT * from 	pase";
    $resultado=$conn->query($consulta);
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "PaseXLSXSelectPase-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultapaseabordar.php");
}


$fila= 3;

while($row=$resultado->fetch_assoc()){

$hojaActiva->setCellValue('A'. $fila, $row['Id_Pase']);
$hojaActiva->setCellValue('B'. $fila, $row['Codigo']);
$hojaActiva->setCellValue('C'. $fila, $row['Fecha']);
$hojaActiva->setCellValue('D'. $fila, $row['Puerta_Embarque']);
$hojaActiva->setCellValue('E'. $fila, $row['Id_Boleto']);
$hojaActiva->setCellValue('F'. $fila, $row['Id_Pasajero']);

$fila++;
}

$hojaActiva->getStyle('A3:F50')->applyFromArray($styleArray);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;


?>