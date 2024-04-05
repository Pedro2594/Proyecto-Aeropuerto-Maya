<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Moneda.xls');
require "../../conexion.php";
session_start();

date_default_timezone_set('America/Mexico_City');

$user=$_SESSION['idUser'];
try {
    $queryparametro=mysqli_query($conn, "SELECT Usuario FROM usuario WHERE `idUser`=$user;");
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "MonedaXLSXSelectUser-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultamoneda.php");
}
  
    $rangini = array();
  
    while($datos = mysqli_fetch_array($queryparametro)) {
        array_push($rangini, $datos['Usuario']);
    }

    $rangoinicial=$rangini[0];

    date_default_timezone_set('America/Mexico_City');

    $fechaActual = date("d-m-Y");
    $horaActual = date("H:i:s");
?>

<table border="1">
<tr>
    <th colspan=9>Reporte de Moneda</th>
<?php
echo "

    <th>Usuario: $rangoinicial</th>
    <th>Fecha: $fechaActual</th>
    <th>Hora: $horaActual</th>
  
    ";
    ?>
    </tr>
    <tr>
    <th colspan=3>Codigo</th>
    <th colspan=3>Nombre</th>
    <th colspan=3>Conversion a Dolar</th>
    <th colspan=3></th>
</tr>
<?php require "../../conexion.php";


try {
    $consulta="SELECT * from moneda";
    $resultado=$conn->query($consulta);
    
}catch(Exception $e) {
   $datos = date('H:i:s');
   $hora=explode(":", $datos);
   $datos2 = date('d/m/Y');

   $fecha=explode("/", $datos2);
   
    $path = "MonedaXLSXSelectMoneda-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
    header("Location: ../../Consultas/Consultamoneda.php");
}
while($row=$resultado->fetch_assoc()){
   echo "<tr>
    <td colspan=3>$row[Id_Moneda]</td>
    <td colspan=3>$row[Nombre]</td>
    <td colspan=3>$row[ConversionADolar]</td>
    <td colspan=3></td>
    </tr>
    ";
}
?>  
</table>