<?php

require "../../conexion.php";

require '../../vendor/autoload.php';
date_default_timezone_set('America/Mexico_City');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Checkin.xlsx"');
header('Cache-Control: max-age=0');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet ->getProperties()->setTitle("Check-In");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();
$hojaActiva->setTitle("Check-in");

session_start();

$user=$_SESSION['idUser'];
try {
    $queryparametro=mysqli_query($conn, "SELECT Usuario FROM usuario WHERE `idUser`=$user;");
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "CheckinXLSXSelectUser-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultacheckin.php");
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

$hojaActiva->mergeCells('A1:C1');
$hojaActiva->getStyle('A1:G2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->setCellValue('A1','Reporte de check-in');
$hojaActiva->setCellValue('F1', 'Usuario:');
$hojaActiva->setCellValue('G1', $rangoinicial);
$hojaActiva->getStyle('F3:G3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$hojaActiva->setCellValue('F2', 'Fecha:');
$hojaActiva->setCellValue('G2', $fechaActual);
$hojaActiva->setCellValue('F3', 'Hora:');
$hojaActiva->setCellValue('G3', $horaActual);


$hojaActiva->setCellValue('A2','Id de check-in');
$hojaActiva->setCellValue('B2','Id de reserva');
$hojaActiva->setCellValue('C2','Pasajero');


$hojaActiva->getStyle('A1:C2')->applyFromArray($styleArray);
$hojaActiva->getStyle('F1:G3')->applyFromArray($styleArray);
$spreadsheet->getDefaultStyle()->getFont()->setBold(false);

$hojaActiva->getStyle('A3:D100')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);



try {
    $consulta="SELECT * from checkin";
    $resultado=$conn->query($consulta); 
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "CheckinXLSXSelectCheckin-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultacheckin.php");
}
$fila= 3;

while($row=$resultado->fetch_assoc()){


$hojaActiva->setCellValue('A'. $fila, $row['Id_Checkin']);
$hojaActiva->setCellValue('B'. $fila, $row['Id_Reserva']);
$hojaActiva->setCellValue('C'. $fila, $row['Pasajero']);

$fila++;
}

$hojaActiva->getStyle('A3:C50')->applyFromArray($styleArray);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;


?>