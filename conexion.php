<?php
//codigo de conexion
$servername="localhost";
$username="root";
$password="";
$database="aeropuertomaya";

date_default_timezone_set('America/Mexico_City');

try {
   $conn = mysqli_connect($servername, $username, $password, $database);
}catch(Exception $e) {
  $datos = date('H:i:s');
  $hora=explode(":", $datos);
  $datos2 = date('d/m/Y');

  $fecha=explode("/", $datos2);
  
   $path = "Conexion-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
   error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
}
?>