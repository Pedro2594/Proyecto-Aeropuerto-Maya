<?php

function redondear_dos_decimal($valor) {
	$float_redondeado=round($valor * 100) / 100;
	return $float_redondeado;
	}
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
   

$boleto=mysqli_query($conn, "SELECT `boleto`.`Codigo`, `boleto`.`Id_Asiento`, `boleto`.`Id_Pasajero`, `boleto`.`Id_Vuelo`, `boleto`.`Id_Clase`, `boleto`.`Id_Equipaje` FROM `boleto` where `Id_Boleto`=$estado;");

$bolcod = array();
$pas = array();
$vuelo = array();
$clase = array();
$equipaje = array();

while($datos = mysqli_fetch_array($boleto)) {
	array_push($bolcod, $datos['Codigo']);
	array_push($vuelo, $datos['Id_Vuelo']);
	array_push($clase, $datos['Id_Clase']);
	array_push($pas, $datos['Id_Pasajero']);
	array_push($equipaje, $datos['Id_Equipaje']);
}
$pruebabolcod=$bolcod[0];
$pruebapas=$pas[0];
$pruebavuelo=$vuelo[0];
$pruebaclase=$clase[0];
$pruebaequipaje=$equipaje[0];
    
    $querycontador=mysqli_query($conn,"SELECT COUNT(`boleto`.`Id_Boleto`) AS boletoRes FROM `boleto` where `boleto`.`Codigo`= '$pruebabolcod' AND `boleto`.`Id_Pasajero`=$pruebapas AND `boleto`.`Id_Vuelo`=$pruebavuelo AND `boleto`.`Id_Clase`=$pruebaclase AND `boleto`.`Id_Equipaje`=$pruebaequipaje;");

    $contbol= array();
    
    while($datos = mysqli_fetch_array($querycontador)) {
        array_push($contbol, $datos['boletoRes']);
    
    }
    $cantidad=$contbol[0];


    $query3=mysqli_query($conn, "SELECT Precio, Id_Pasajero, Codigo FROM boleto WHERE `Id_Boleto`=$estado;");
    $subt = array();
    $pasaj = array();
    $cod = array();
  
    while($datos = mysqli_fetch_array($query3)) {
        array_push($subt, $datos['Precio']);
        array_push($pasaj, $datos['Id_Pasajero']);
        array_push($cod, $datos['Codigo']);
    }

    $subtot=$subt[0];
    $pasajero=$pasaj[0];
    $codigo=$cod[0];

    $querypasajero=mysqli_query($conn, "SELECT `pasajero`.`Fecha_Nacimiento` FROM `pasajero` where `Id_Pasajero`=$pruebapas;");

    $fecnac = array();
    while($datos = mysqli_fetch_array($querypasajero)) {
		array_push($fecnac, $datos['Fecha_Nacimiento']);
    }

    $pruebafecnac=$fecnac[0];

    $subtotal = redondear_dos_decimal($subtot*$cantidad);
    
    $cumpleanos = new DateTime($pruebafecnac);
        $hoy = new DateTime();
        $annos = $hoy->diff($cumpleanos);
        
        if($annos->y>=60){
            $desc=redondear_dos_decimal($subtotal*0.08);
        }else{
            $desc=0;
        }

    $impuesto = redondear_dos_decimal($subtotal*0.18);
    
$total = $subtotal + $impuesto - $desc;

if($cantidad==1){


$actualizar="UPDATE boleto SET Estado='0' WHERE `boleto`.`Codigo`= '$pruebabolcod' AND `boleto`.`Id_Pasajero`=$pruebapas AND `boleto`.`Id_Vuelo`=$pruebavuelo AND `boleto`.`Id_Clase`=$pruebaclase AND `boleto`.`Id_Equipaje`=$pruebaequipaje;";

$insertar="INSERT INTO `detallefactura` (`Id_Detalle`, `Id_Boleto`, `Cantidad`, `Descripcion`, `Subtotal`, `Total_Descuento`, `Total_Impuesto`, `Total`, `Estado`) 
    VALUES (NULL, '$estado', '$cantidad','Detalle de boleto con codigo: $codigo', '$subtotal', '$desc','$impuesto', '$total', '1');";


try {
    $resultado=mysqli_query($conn, $insertar);
    $res2=mysqli_query($conn, $actualizar);
    }catch(Exception $e) {

        $datos = date('H:i:s');
        $hora=explode(":", $datos);
        $datos2 = date('d/m/Y');
    
        $fecha=explode("/", $datos2);
      
        $path = "temp/logGuardarDetalleFactura-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
        header("Location: ../../principaladmin.php");
    }
}else{

$actualizar="UPDATE boleto SET Estado='0' WHERE `boleto`.`Codigo`= '$pruebabolcod' AND `boleto`.`Id_Pasajero`=$pruebapas AND `boleto`.`Id_Vuelo`=$pruebavuelo AND `boleto`.`Id_Clase`=$pruebaclase AND `boleto`.`Id_Equipaje`=$pruebaequipaje;";
$insertar="INSERT INTO `detallefactura` (`Id_Detalle`, `Id_Boleto`, `Cantidad`, `Descripcion`, `Subtotal`, `Total_Descuento`, `Total_Impuesto`, `Total`, `Estado`) 
    VALUES (NULL, '$estado', '$cantidad','Detalle de boletos con codigo: $codigo', '$subtotal', '$desc','$impuesto', '$total', '1');";

try {
    $resultado=mysqli_query($conn, $insertar);
    $res2=mysqli_query($conn, $actualizar);
    }catch(Exception $e) {

        $datos = date('H:i:s');
        $hora=explode(":", $datos);
        $datos2 = date('d/m/Y');
    
        $fecha=explode("/", $datos2);
      
        $path = "temp/logGuardarDetalleFactura-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
    }
}

    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {

        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/detallefactura.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>

