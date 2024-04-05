<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    function redondear_dos_decimal($valor) {
        $float_redondeado=round($valor * 100) / 100;
        return $float_redondeado;
        }

    $id=$_POST['id'];
    $codigo=$_POST['codigo'];
    $asientoanterior=$_POST['asientoanterior'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
    $estado3 = filter_input(INPUT_POST, 'estado3', FILTER_SANITIZE_STRING);
    $estado5 = filter_input(INPUT_POST, 'estado5', FILTER_SANITIZE_STRING);
    $estado6 = filter_input(INPUT_POST, 'estado6', FILTER_SANITIZE_STRING);

    
    $query4=mysqli_query($conn, "SELECT `vuelo`.`Precio` FROM `vuelo` WHERE `Id_Vuelo`=$estado3;");
    $date = array();
  
    while($datos = mysqli_fetch_array($query4)) {
        array_push($date, $datos['Precio']);
    }

$pruebafecha=$date[0];

    $query5=mysqli_query($conn, "SELECT MultiplicadorPrecio FROM equipaje WHERE Id_Equipaje=$estado5");
    $equi = array();
  
    while($datos = mysqli_fetch_array($query5)) {
        array_push($equi, $datos['MultiplicadorPrecio']);
    }

$pruebaequi=$equi[0];

    $query6=mysqli_query($conn, "SELECT MultiplicadorPrecio FROM clase WHERE Id_Clase=$estado6");
 
    $cla = array();
  
    while($datos = mysqli_fetch_array($query6)) {
        array_push($cla, $datos['MultiplicadorPrecio']);
    }

$pruebacla=$cla[0];  


$costo_vuelo=$pruebafecha;
    $costo_clase=redondear_dos_decimal($costo_vuelo*$pruebacla);
    $costo_equipaje=redondear_dos_decimal($costo_vuelo*$pruebaequi);


$monto=$costo_vuelo + $costo_clase + $costo_equipaje;
    
    
    
    if($estado!=$asientoanterior){
    $actualizar2="UPDATE listaasientos SET Estado='0' WHERE Id_Lista='$estado'";
    $actualizar3="UPDATE listaasientos SET Estado='1' WHERE Id_Lista='$asientoanterior'";

    $resultad2=mysqli_query($conn,$actualizar2);
    $resultado3=mysqli_query($conn,$actualizar3);
    }

    $actualizar="UPDATE boleto SET Codigo='$codigo', Id_Asiento='$estado', Id_Pasajero='$estado2', Id_Vuelo='$estado3', Id_Equipaje='$estado5', Id_Clase='$estado6',Precio='$monto' WHERE Id_Boleto='$id'";

    

    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
       $datos = date('H:i:s');
       $hora=explode(":", $datos);
       $datos2 = date('d/m/Y');
    
       $fecha=explode("/", $datos2);
       
        $path = "ActualizarBoleto-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
        header("Location: ../../principaladmin.php");
    }

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultaboletos.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = '../../Consultas/Consultaboletos.php';
        </script>";
    }
?>