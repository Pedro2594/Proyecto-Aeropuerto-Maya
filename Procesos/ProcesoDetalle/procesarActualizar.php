<?php

function redondear_dos_decimal($valor) {
	$float_redondeado=round($valor * 100) / 100;
	return $float_redondeado;
	}
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $estado= filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $boletoanterior=$_POST['boletoanterior'];
   
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


$boleto2=mysqli_query($conn, "SELECT `boleto`.`Codigo`, `boleto`.`Id_Asiento`, `boleto`.`Id_Pasajero`, `boleto`.`Id_Vuelo`, `boleto`.`Id_Clase`, `boleto`.`Id_Equipaje` FROM `boleto` where `Id_Boleto`=$boletoanterior;");

$bolcod2 = array();
$pas2 = array();
$vuelo2 = array();
$clase2 = array();
$equipaje2 = array();

while($datos = mysqli_fetch_array($boleto2)) {
    array_push($bolcod2, $datos['Codigo']);
    array_push($vuelo2, $datos['Id_Vuelo']);
    array_push($clase2, $datos['Id_Clase']);
    array_push($pas2, $datos['Id_Pasajero']);
    array_push($equipaje2, $datos['Id_Equipaje']);
}
$pruebabolcod2=$bolcod2[0];
$pruebapas2=$pas2[0];
$pruebavuelo2=$vuelo2[0];
$pruebaclase2=$clase2[0];
$pruebaequipaje2=$equipaje2[0];

if($cantidad==1){

    if($estado!=$boletoanterior){
        $actu2="UPDATE boleto SET Estado='0' WHERE `boleto`.`Codigo`= '$pruebabolcod' AND `boleto`.`Id_Pasajero`=$pruebapas AND `boleto`.`Id_Vuelo`=$pruebavuelo AND `boleto`.`Id_Clase`=$pruebaclase AND `boleto`.`Id_Equipaje`=$pruebaequipaje;";
        $actu3="UPDATE boleto SET Estado='1' WHERE `boleto`.`Codigo`= '$pruebabolcod2' AND `boleto`.`Id_Pasajero`=$pruebapas2 AND `boleto`.`Id_Vuelo`=$pruebavuelo2 AND `boleto`.`Id_Clase`=$pruebaclase2 AND `boleto`.`Id_Equipaje`=$pruebaequipaje2;";
        $resul2=mysqli_query($conn, $actu2);
        $resul3=mysqli_query($conn, $actu3);

    }


    $actualizar="UPDATE detallefactura SET Id_Boleto='$estado', Cantidad='$cantidad', Descripcion='Detalle de boleto con codigo: $codigo', Subtotal='$subtotal', Total_Descuento='$desc', Total_Impuesto= '$impuesto', Total='$total' WHERE Id_Detalle='$id'";    
    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
    
        $datos = date('H:i:s');
        $hora=explode(":", $datos);
        $datos2 = date('d/m/Y');
    
        $fecha=explode("/", $datos2);
      
        $path = "temp/logActualizarDetalleFactura-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
     }
    
}else{

if($estado!=$boletoanterior){
    
    $actu2="UPDATE boleto SET Estado='0' WHERE `boleto`.`Codigo`= '$pruebabolcod' AND `boleto`.`Id_Pasajero`=$pruebapas AND `boleto`.`Id_Vuelo`=$pruebavuelo AND `boleto`.`Id_Clase`=$pruebaclase AND `boleto`.`Id_Equipaje`=$pruebaequipaje;";
    $actu3="UPDATE boleto SET Estado='1' WHERE `boleto`.`Codigo`= '$pruebabolcod2' AND `boleto`.`Id_Pasajero`=$pruebapas2 AND `boleto`.`Id_Vuelo`=$pruebavuelo2 AND `boleto`.`Id_Clase`=$pruebaclase2 AND `boleto`.`Id_Equipaje`=$pruebaequipaje2;";
    
    $resul2=mysqli_query($conn, $actu2);
    $resul3=mysqli_query($conn, $actu3);   
}
    
    $actualizar="UPDATE detallefactura SET Id_Boleto='$estado', Cantidad='$cantidad', Descripcion='$codigo', Subtotal='$subtotal', Total_Descuento='$desc', Total_Impuesto='$impuesto', Total='$total' WHERE Id_Detalle='$id'";
    
    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
    
        $datos = date('H:i:s');
        $hora=explode(":", $datos);
        $datos2 = date('d/m/Y');
    
        $fecha=explode("/", $datos2);
      
        $path = "temp/logActualizarDetalleFactura-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
        header("Location: ../../Consultas/Consultadetalles.php");
     }
    

}
    
        
    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {

        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../Consultas/Consultadetalles.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>
