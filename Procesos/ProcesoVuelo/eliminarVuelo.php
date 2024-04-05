<?php
include("../../conexion.php");
date_default_timezone_set('America/Mexico_City');
    $id=$_GET['id'];
    $eliminar="DELETE FROM vuelo WHERE Id_Vuelo='$id'";
    

    try {
        $resultado=mysqli_query($conn,$eliminar);
     }catch(Exception $e) {
       $datos = date('H:i:s');
       $hora=explode(":", $datos);
       $datos2 = date('d/m/Y');
    
       $fecha=explode("/", $datos2);
       
        $path = "EliminarVuelo-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
        header("Location: ../../principaladmin.php");
    }

    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultavuelo.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultavuelo.php';
        </script>";
    
    }

?>