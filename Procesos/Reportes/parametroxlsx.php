<?php

require "../../conexion.php";

require '../../vendor/autoload.php';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Parametro.xlsx"');
header('Cache-Control: max-age=0');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet ->getProperties()->setTitle("Parametro");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();
$hojaActiva->setTitle("Parametro");

session_start();

$user=$_SESSION['idUser'];
try {
    $queryparametro=mysqli_query($conn, "SELECT Usuario FROM usuario WHERE `idUser`=$user;");
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "ParametroXLSXSelectUser-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultaparametro.php");
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
    $spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(190, 'pt');

$hojaActiva->mergeCells('A1:H1');
$hojaActiva->getStyle('A1:K2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->setCellValue('A1','Reporte de Parametro');
$hojaActiva->setCellValue('J1', 'Usuario:');
$hojaActiva->setCellValue('K1', $rangoinicial);
$hojaActiva->getStyle('J3:K3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$hojaActiva->setCellValue('J2', 'Fecha:');
$hojaActiva->setCellValue('K2', $fechaActual);
$hojaActiva->setCellValue('J3', 'Hora:');
$hojaActiva->setCellValue('K3', $horaActual);


$hojaActiva->setCellValue('A2','Id');
$hojaActiva->setCellValue('B2','CAI');
$hojaActiva->setCellValue('C2','Fecha Vencimiento');
$hojaActiva->setCellValue('D2','Fecha Emision');
$hojaActiva->setCellValue('E2','Rango Inicio');
$hojaActiva->setCellValue('F2','Rango Final');
$hojaActiva->setCellValue('G2','Consecutivo');
$hojaActiva->setCellValue('H2','Estado');

$hojaActiva->getStyle('A1:H2')->applyFromArray($styleArray);
$hojaActiva->getStyle('J1:K3')->applyFromArray($styleArray);
$spreadsheet->getDefaultStyle()->getFont()->setBold(false);

$hojaActiva->getStyle('A3:H100')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


try {
    $consulta="SELECT * from 	parametro";
    $resultado=$conn->query($consulta);
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "ParametroXLSXSelectParametro-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultaparametro.php");
}

$fila= 3;

while($row=$resultado->fetch_assoc()){

$hojaActiva->setCellValue('A'. $fila, $row['Id_Parametro']);
$hojaActiva->setCellValue('B'. $fila, $row['Cai']);
$hojaActiva->setCellValue('C'. $fila, $row['Fecha_Ven']);
$hojaActiva->setCellValue('D'. $fila, $row['Fecha_Emi']);
$hojaActiva->setCellValue('E'. $fila, $row['Rango_Ini']);
$hojaActiva->setCellValue('F'. $fila, $row['Rango_Fin']);
$hojaActiva->setCellValue('G'. $fila, $row['Consecutivo']);
$hojaActiva->setCellValue('H'. $fila, $row['Estado']);
$fila++;
}

$hojaActiva->getStyle('A3:H50')->applyFromArray($styleArray);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;





?>