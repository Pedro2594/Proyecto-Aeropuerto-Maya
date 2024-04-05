<?php

require "../../conexion.php";

require '../../vendor/autoload.php';
date_default_timezone_set('America/Mexico_City');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Vuelo.xlsx"');
header('Cache-Control: max-age=0');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet ->getProperties()->setTitle("Vuelos");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();
$hojaActiva->setTitle("Vuelos");

session_start();

$user=$_SESSION['idUser'];
try {
    $queryparametro=mysqli_query($conn, "SELECT Usuario FROM usuario WHERE `idUser`=$user;");
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "VueloXLSXSelectUser-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
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

$hojaActiva->mergeCells('A1:I1');
$hojaActiva->getStyle('A1:L3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->setCellValue('A1','Reporte de vuelos');
$hojaActiva->setCellValue('K1', 'Usuario:');
$hojaActiva->setCellValue('L1', $rangoinicial);
$hojaActiva->getStyle('K3:L3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$hojaActiva->setCellValue('K2', 'Fecha:');
$hojaActiva->setCellValue('L2', $fechaActual);
$hojaActiva->setCellValue('K3', 'Hora:');
$hojaActiva->setCellValue('L3', $horaActual);


$hojaActiva->setCellValue('A2','Id del vuelo');
$hojaActiva->setCellValue('B2','Codigo');
$hojaActiva->setCellValue('C2','Lugar de salida');
$hojaActiva->setCellValue('D2','Lugar de llegada');
$hojaActiva->setCellValue('E2','Hora de salida');
$hojaActiva->setCellValue('F2','Hora de llegada');
$hojaActiva->setCellValue('G2','Fecha');
$hojaActiva->setCellValue('H2','Precio');
$hojaActiva->setCellValue('I2','Id de aeronave');
$hojaActiva->getStyle('A1:I2')->applyFromArray($styleArray);
$hojaActiva->getStyle('G1:H3')->applyFromArray($styleArray);
$spreadsheet->getDefaultStyle()->getFont()->setBold(false);

$hojaActiva->getStyle('A3:I100')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


try {
    $consulta="SELECT * from vueo";
    $resultado=$conn->query($consulta);
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "VueloXLSXSelectVuelo-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultavuelo.php");
}

$fila= 3;

while($row=$resultado->fetch_assoc()){

$hojaActiva->setCellValue('A'. $fila, $row['Id_Vuelo']);
$hojaActiva->setCellValue('B'. $fila, $row['Codigo']);
$hojaActiva->setCellValue('C'. $fila, $row['Lugar_Salida']);
$hojaActiva->setCellValue('D'. $fila, $row['Lugar_LLegada']);
$hojaActiva->setCellValue('E'. $fila, $row['Hora_Salida']);
$hojaActiva->setCellValue('F'. $fila, $row['Hora_LLegada']);
$hojaActiva->setCellValue('G'. $fila, $row['Fecha']);
$hojaActiva->setCellValue('H'. $fila, $row['Precio']);
$hojaActiva->setCellValue('I'. $fila, $row['Id_Aeronave']);
$fila++;
}

$hojaActiva->getStyle('A3:I50')->applyFromArray($styleArray);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;


?>