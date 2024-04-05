<?php

function redondear_dos_decimal($valor) {
	$float_redondeado=round($valor * 100) / 100;
	return $float_redondeado;
	}
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $monto=$_POST['montof2'];
    $codigo=$_POST['cod'];
    $rtn=$_POST['rtn'];
    $cai=$_POST['cai2'];
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
    $fecha=$_POST['fecha'];
    $estado3 = filter_input(INPUT_POST, 'estado3', FILTER_SANITIZE_STRING);
    $estado4 = filter_input(INPUT_POST, 'estado4', FILTER_SANITIZE_STRING);
    $metodo = filter_input(INPUT_POST, 'metodo', FILTER_SANITIZE_STRING);
    $efectivo=$_POST['efectivo'];
    $tarjeta=$_POST['tarjeta'];
    
    $queryparametro=mysqli_query($conn, "SELECT Rango_Ini, Rango_Fin, Consecutivo, Fecha_Emi, Fecha_Ven FROM parametro WHERE `Id_Parametro`=$estado4;");
    
    $rangini = array();
    $rangfin = array();
    $conse = array();
    $fechaemi = array();
    $fechafin = array();
  
    while($datos = mysqli_fetch_array($queryparametro)) {
        array_push($rangini, $datos['Rango_Ini']);
        array_push($rangfin, $datos['Rango_Fin']);
        array_push($conse, $datos['Consecutivo']);
        array_push($fechaemi, $datos['Fecha_Emi']);
        array_push($fechafin, $datos['Fecha_Ven']);
    }

$rangoinicial=$rangini[0];
$rangofinal=$rangfin[0];
$consecutivo=$conse[0];
$fechaemision=$fechaemi[0];
$fechafinal=$fechafin[0];

/*$fecha_inicio = new Date($fechaemision);
$fecha_fin    = new Date($fechafinal);
*/
$fechasinhora=explode(',', $fecha);
/*
$fechaevaluar= new Date($fechasinhora);*/

$timestampfin = strtotime($fechafinal); 
$newDatefin = date("m-d-Y", $timestampfin );

$timestampini = strtotime($fechaemision); 
$newDateini = date("m-d-Y", $timestampini );

$timestampeva = strtotime($fechasinhora[0]); 
$newDateeva = date("m-d-Y", $timestampeva );


if($codigo>$rangofinal){
    echo  "<script>
    alert('El numero de esta factura supera el permitido');
    window.location = '../../DatosMaestros/factura.php';
    </script>"; 
}else if($newDateeva>$newDateini){
    echo  "<script>
    alert('La fecha de esta factura es obsoleta');
    window.location = '../../DatosMaestros/factura.php';
    </script>"; 
    
}else if($newDateeva>$newDatefin){
    echo  "<script>
    alert('Ya ha pasado el periodo para registrar con esta fecha');
    window.location = '../../DatosMaestros/factura.php';
    </script>";    
}else if ($codigo==$rangofinal){

        $finalconse = $consecutivo+1;
        
        $actualizar="UPDATE parametro SET Consecutivo='$finalconse', Estado='0' WHERE Id_Parametro=$estado4";
        $actuali2="UPDATE detallefactura SET Estado='0' WHERE Id_Detalle=$estado2";
        $insertar="INSERT INTO `factura` (`Id_Factura`, `Id_Parametro`, `Codigo`, `RTN`,`CAI`, `Id_Detalle`, `Fecha`, `Id_Moneda`, `Monto`, `Metodo_Pago`, `Cantidad_Efectivo`, `Numero_Tarjeta`) 
        VALUES (NULL, '$estado4', '$codigo', '$rtn','$cai', '$estado2', '$fecha','$estado3', '$monto', '$metodo', '$efectivo', '$tarjeta');";
    
        $resultado=mysqli_query($conn, $insertar);
        $res2=mysqli_query($conn, $actualizar);
        $resul3=mysqli_query($conn, $actuali2);
}else{
    $finalconse = $consecutivo+1;
        
    $actualizar="UPDATE parametro SET Consecutivo='$finalconse' WHERE Id_Parametro=$estado4";
    $actuali2="UPDATE detallefactura SET Estado='0' WHERE Id_Detalle=$estado2";
    $insertar="INSERT INTO `factura` (`Id_Factura`, `Id_Parametro`, `Codigo`, `RTN`,`CAI`, `Id_Detalle`, `Fecha`, `Id_Moneda`, `Monto`, `Metodo_Pago`, `Cantidad_Efectivo`, `Numero_Tarjeta`) 
    VALUES (NULL, '$estado4', '$codigo', '$rtn','$cai', '$estado2', '$fecha','$estado3', '$monto', '$metodo', '$efectivo', '$tarjeta');";

     

}


try {
    $resultado=mysqli_query($conn, $insertar);
}catch(Exception $e) {
  $datos = date('H:i:s');
  $hora=explode(":", $datos);
  $datos2 = date('d/m/Y');

  $fecha=explode("/", $datos2);
  
   $path = "InsertarFactura-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
   error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
   header("Location: ../../principaladmin.php");
   
}

try {
    $resultado=mysqli_query($conn, $insertar);
}catch(Exception $e) {
  $datos = date('H:i:s');
  $hora=explode(":", $datos);
  $datos2 = date('d/m/Y');

  $fecha=explode("/", $datos2);
  
   $path = "ParametroFactura-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
   error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
   header("Location: ../../principaladmin.php");
}

try {
    $resultado=mysqli_query($conn, $insertar);
}catch(Exception $e) {
  $datos = date('H:i:s');
  $hora=explode(":", $datos);
  $datos2 = date('d/m/Y');

  $fecha=explode("/", $datos2);
  
   $path = "DetalleFactura-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
   error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
   header("Location: ../../principaladmin.php");
}
        /*

    }*/
    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {

        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/factura.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>