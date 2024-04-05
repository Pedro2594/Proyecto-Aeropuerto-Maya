<?php

require "../../conexion.php";

require '../../vendor/autoload.php';
date_default_timezone_set('America/Mexico_City');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Boletos.xlsx"');
header('Cache-Control: max-age=0');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet ->getProperties()->setTitle("Boletos");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();
$hojaActiva->setTitle("Boletos");

session_start();

$user=$_SESSION['idUser'];
try {
    $queryparametro=mysqli_query($conn, "SELECT Usuario FROM usuario WHERE `idUser`=$user;");
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "BoletoXLSXSelectUser-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
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
//ESPACIADO A LA TABLA DE USUARIO
$hojaActiva->getStyle('A1:K3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->setCellValue('A1','Reporte de boletos');
$hojaActiva->setCellValue('K1', 'Usuario:');
$hojaActiva->setCellValue('L1', $rangoinicial);
//NEGRITA DE LOS DATOS DEL USUARIO
$hojaActiva->getStyle('K1:L3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$hojaActiva->setCellValue('k2', 'Fecha:');
$hojaActiva->setCellValue('L2', $fechaActual);
$hojaActiva->setCellValue('K3', 'Hora:');
$hojaActiva->setCellValue('L3', $horaActual);


$hojaActiva->setCellValue('A2','Id del boleto');
$hojaActiva->setCellValue('B2','Codigo');
$hojaActiva->setCellValue('C2','Id del asiento');
$hojaActiva->setCellValue('D2','Id del pasajero');
$hojaActiva->setCellValue('E2','Id del vuelo');
$hojaActiva->setCellValue('F2','Id del equipaje');
$hojaActiva->setCellValue('G2','Id del clase');
$hojaActiva->setCellValue('H2','Precio');
$hojaActiva->setCellValue('I2','Estado');


$hojaActiva->getStyle('A1:I2')->applyFromArray($styleArray);
$hojaActiva->getStyle('K1:L3')->applyFromArray($styleArray);
$spreadsheet->getDefaultStyle()->getFont()->setBold(false);

$hojaActiva->getStyle('A3:D100')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

try {
    $consulta="SELECT * from bolet";
    $resultado=$conn->query($consulta);
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "BoletoXLSXSelectBoleto-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultaboletos.php");
}



$fila= 3;

while($row=$resultado->fetch_assoc()){

$hojaActiva->setCellValue('A'. $fila, $row['Id_Boleto']);
$hojaActiva->setCellValue('B'. $fila, $row['Codigo']);
$hojaActiva->setCellValue('C'. $fila, $row['Id_Asiento']);
$hojaActiva->setCellValue('D'. $fila, $row['Id_Pasajero']);
$hojaActiva->setCellValue('E'. $fila, $row['Id_Vuelo']);
$hojaActiva->setCellValue('F'. $fila, $row['Id_Equipaje']);
$hojaActiva->setCellValue('G'. $fila, $row['Id_Clase']);
$hojaActiva->setCellValue('H'. $fila, $row['Precio']);
$hojaActiva->setCellValue('I'. $fila, $row['Estado']);
$fila++;
}

$hojaActiva->getStyle('A3:I50')->applyFromArray($styleArray);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;


?>