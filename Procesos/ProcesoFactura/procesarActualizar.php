<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');
    function redondear_dos_decimal($valor) {
        $float_redondeado=round($valor * 100) / 100;
        return $float_redondeado;
        }
    $id=$_POST['id'];
    $codigo=$_POST['codigo'];
    $rtn=$_POST['rtn'];
    $cai=$_POST['cai'];
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
    $fecha=$_POST['fecha'];
    $estado3 = filter_input(INPUT_POST, 'estado3', FILTER_SANITIZE_STRING);
    $metodo = filter_input(INPUT_POST, 'metodo', FILTER_SANITIZE_STRING);
    $efectivo=$_POST['efectivo'];
    $tarjeta=$_POST['tarjeta'];
    
    $querymoneda=mysqli_query($conn, "SELECT ConversionADolar  FROM moneda WHERE `Id_Moneda`=$estado3;");
    $valoradolar = array();
   
  
    while($datos = mysqli_fetch_array($querymoneda)) {
        array_push($valoradolar, $datos['ConversionADolar']);

    }

$valordolar=$valoradolar[0];


$querydetall=mysqli_query($conn, "SELECT `Id_Boleto`, `Total` FROM `detallefactura` where `Id_Detalle`=$estado2;");

$bol= array();
$total= array();

while($datos = mysqli_fetch_array($querydetall)) {
	array_push($bol, $datos['Id_Boleto']);
    array_push($total, $datos['Total']);
    
}
$pruebabol=$bol[0];
$pruebatotal=$total[0];

   
  /*  $query3=mysqli_query($conn, "SELECT Id_Vuelo, Id_Equipaje, Id_Clase  FROM boleto WHERE `Id_Boleto`=$estado2;");
    $idvue = array();
    $idequipa = array();
    $idcla = array();
  
    while($datos = mysqli_fetch_array($query3)) {
        array_push($idvue, $datos['Id_Vuelo']);
        array_push($idequipa, $datos['Id_Equipaje']);
        array_push($idcla, $datos['Id_Clase']);
    }

$idvuelo=$idvue[0];
$idequipaje=$idequipa[0];
$idclase=$idcla[0];

    $query4=mysqli_query($conn, "SELECT `vuelo`.`Precio` FROM `vuelo` WHERE `Id_Vuelo`=$idvuelo;");
    $date = array();
  
    while($datos = mysqli_fetch_array($query4)) {
        array_push($date, $datos['Precio']);
    }

$pruebafecha=$date[0];

    $query5=mysqli_query($conn, "SELECT MultiplicadorPrecio FROM equipaje WHERE Id_Equipaje=$idequipaje");
    $equi = array();
  
    while($datos = mysqli_fetch_array($query5)) {
        array_push($equi, $datos['MultiplicadorPrecio']);
    }

$pruebaequi=$equi[0];

    $query6=mysqli_query($conn, "SELECT MultiplicadorPrecio FROM clase WHERE Id_Clase=$idclase");
 
    $cla = array();
  
    while($datos = mysqli_fetch_array($query6)) {
        array_push($cla, $datos['MultiplicadorPrecio']);
    }

$pruebacla=$cla[0];   
*/
if($estado3==1){    
   /* $costo_vuelo=$pruebafecha;
    $costo_clase=redondear_dos_decimal($costo_vuelo*$pruebacla);
    $costo_equipaje=redondear_dos_decimal($costo_vuelo*$pruebaequi);

    $monto=$costo_vuelo + $costo_clase + $costo_equipaje;*/
    $monto=$pruebatotal*$valordolar;
 
    $actualizar="UPDATE factura SET Codigo='$codigo',RTN='$rtn' ,CAI='$cai', Id_Detalle='$estado2', Fecha='$fecha', Id_Moneda='$estado3', Monto='$monto', Metodo_Pago='$metodo', Cantidad_Efectivo='$efectivo', Numero_Tarjeta='$tarjeta'  WHERE Id_Factura='$id'";

    $resultado=mysqli_query($conn,$actualizar);
}else if($estado3==2){

  /*  $costo_vuelo= redondear_dos_decimal($pruebafecha*$valordolar);
    $costo_clase=redondear_dos_decimal($costo_vuelo*$pruebacla);
    $costo_equipaje=redondear_dos_decimal($costo_vuelo*$pruebaequi);
    
    
    $monto=$costo_vuelo + $costo_clase + $costo_equipaje;*/
    $monto=$pruebatotal*$valordolar;
    $actualizar="UPDATE factura SET Codigo='$codigo',RTN='$rtn' ,CAI='$cai', Id_Detalle='$estado2', Fecha='$fecha', Id_Moneda='$estado3', Monto='$monto', Metodo_Pago='$metodo', Cantidad_Efectivo='$efectivo', Numero_Tarjeta='$tarjeta'  WHERE Id_Factura='$id'";

    $resultado=mysqli_query($conn,$actualizar);


}else if($estado3==3){

   /* $costo_vuelo= redondear_dos_decimal($pruebafecha*$valordolar);
    $costo_clase=redondear_dos_decimal($costo_vuelo*$pruebacla);
    $costo_equipaje=redondear_dos_decimal($costo_vuelo*$pruebaequi);*/
    
    
    $monto=$pruebatotal*$valordolar;

    $actualizar="UPDATE factura SET Codigo='$codigo',RTN='$rtn' ,CAI='$cai', Id_Detalle='$estado2', Fecha='$fecha', Id_Moneda='$estado3', Monto='$monto', Metodo_Pago='$metodo', Cantidad_Efectivo='$efectivo', Numero_Tarjeta='$tarjeta'  WHERE Id_Factura='$id'";



}

try {
    $resultado=mysqli_query($conn,$actualizar);
  }catch(Exception $e) {
    $datos = date('H:i:s');
    $hora=explode(":", $datos);
    $datos2 = date('d/m/Y');
 
    $fecha=explode("/", $datos2);
    
     $path = "ActualizarFactura-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_ss".$hora[2].".log";
     error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
     header("Location: ../../principaladmin.php");
 }

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultafactura.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = '../../Consultas/Consultafactura.php';
        </script>";
    }
?>