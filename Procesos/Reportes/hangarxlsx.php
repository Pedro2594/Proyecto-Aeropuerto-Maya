<?php

require "../../conexion.php";

require '../../vendor/autoload.php';
date_default_timezone_set('America/Mexico_City');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Hangar.xlsx"');
header('Cache-Control: max-age=0');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet ->getProperties()->setTitle("Hangar");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();
$hojaActiva->setTitle("Hangar");

session_start();

$user=$_SESSION['idUser'];
try {
    $queryparametro=mysqli_query($conn, "SELECT Usuario FROM usuario WHERE `idUser`=$user;");
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "HangarXLSXSelectUser-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultahangar.php");
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

$hojaActiva->mergeCells('A1:E1');
$hojaActiva->getStyle('A1:H2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->setCellValue('A1','Reporte de Hangares');
$hojaActiva->setCellValue('G1', 'Usuario:');
$hojaActiva->setCellValue('H1', $rangoinicial);
$hojaActiva->getStyle('G3:H3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$hojaActiva->setCellValue('G2', 'Fecha:');
$hojaActiva->setCellValue('H2', $fechaActual);
$hojaActiva->setCellValue('G3', 'Hora:');
$hojaActiva->setCellValue('H3', $horaActual);


$hojaActiva->setCellValue('A2','Id');
$hojaActiva->setCellValue('B2','Codigo');
$hojaActiva->setCellValue('C2','Capacidad');
$hojaActiva->setCellValue('D2','Id Aeronave');
$hojaActiva->setCellValue('E2','Id Aeropuerto');

$hojaActiva->getStyle('A1:E2')->applyFromArray($styleArray);
$hojaActiva->getStyle('G1:H3')->applyFromArray($styleArray);
$spreadsheet->getDefaultStyle()->getFont()->setBold(false);

$hojaActiva->getStyle('A3:E100')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);




try {
    $consulta="SELECT * from hangar";
    $resultado=$conn->query($consulta);
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "AeroXLSXSelectAero-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultaaeronaves.php");
}
$fila= 3;

while($row=$resultado->fetch_assoc()){

$hojaActiva->setCellValue('A'. $fila, $row['Id_hangar']);
$hojaActiva->setCellValue('B'. $fila, $row['Codigo']);
$hojaActiva->setCellValue('C'. $fila, $row['Capacidad']);
$hojaActiva->setCellValue('D'. $fila, $row['Id_Aeronave']);
$hojaActiva->setCellValue('E'. $fila, $row['Id_Aeropuerto']);
$fila++;
}

$hojaActiva->getStyle('A3:E50')->applyFromArray($styleArray);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;





?>