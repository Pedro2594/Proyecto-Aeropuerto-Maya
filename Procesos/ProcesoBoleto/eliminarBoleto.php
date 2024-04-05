<?php
include("../../conexion.php");
date_default_timezone_set('America/Mexico_City');

    $id=$_GET['id'];

    $query4=mysqli_query($conn, "SELECT `Id_Asiento` FROM `boleto` WHERE `Id_boleto`=$id;");
    $date = array();
  
    while($datos = mysqli_fetch_array($query4)) {
        array_push($date, $datos['Id_Asiento']);
    }

$pruebafecha=$date[0];

    
    $actualizar3="UPDATE listaasientos SET Estado='1' WHERE Id_Lista='$pruebafecha'";
    $eliminar="DELETE FROM boleto WHERE Id_Boleto='$id'";
    

    try {
        $resultado=mysqli_query($conn,$eliminar);
     }catch(Exception $e) {
       $datos = date('H:i:s');
       $hora=explode(":", $datos);
       $datos2 = date('d/m/Y');
    
       $fecha=explode("/", $datos2);
       
        $path = "EliminarBoleto-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
        header("Location: ../../principaladmin.php");
    }

    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultaboletos.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultaboletos.php';
        </script>";
    
    }

?>