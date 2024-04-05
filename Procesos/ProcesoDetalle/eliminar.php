<?php
include("../../conexion.php");
date_default_timezone_set('America/Mexico_City');

    $id=$_GET['id'];

    $query4=mysqli_query($conn, "SELECT `Id_Boleto` FROM `detallefactura` WHERE `Id_Detalle`=$id;");
    $date = array();
  
    while($datos = mysqli_fetch_array($query4)) {
        array_push($date, $datos['Id_Boleto']);
    }

$pruebafecha=$date[0];


    $boleto=mysqli_query($conn, "SELECT `boleto`.`Codigo`, `boleto`.`Id_Asiento`, `boleto`.`Id_Pasajero`, `boleto`.`Id_Vuelo`, `boleto`.`Id_Clase`, `boleto`.`Id_Equipaje` FROM `boleto` where `Id_Boleto`=$pruebafecha;");

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

    
        $actualizar3="UPDATE boleto SET Estado='1' WHERE `boleto`.`Codigo`= '$pruebabolcod' AND `boleto`.`Id_Pasajero`=$pruebapas AND `boleto`.`Id_Vuelo`=$pruebavuelo AND `boleto`.`Id_Clase`=$pruebaclase AND `boleto`.`Id_Equipaje`=$pruebaequipaje;";
    $eliminar="DELETE FROM detallefactura WHERE Id_Detalle='$id'";

    try {
        $resultado=mysqli_query($conn,$eliminar);
        $resultado2=mysqli_query($conn,$actualizar3);
     }catch(Exception $e) {
    
        $datos = date('H:i:s');
        $hora=explode(":", $datos);
        $datos2 = date('d/m/Y');
    
        $fecha=explode("/", $datos2);
      
        $path = "temp/logEliminarDetalleFactura-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
        header("Location: ../../Consultas/Consultadetalles.php");
     }

    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultadetalles.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultadetalles.php';
        </script>";
    
    }

?>