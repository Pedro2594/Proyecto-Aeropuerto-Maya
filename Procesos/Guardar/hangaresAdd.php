<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $codigo=$_POST['codigo'];
    $capacidad=$_POST['capacidad'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
   
    
    $insertar="INSERT INTO `hangar` (`Id_hangar`, `Codigo`,`Capacidad`, `Id_Aeronave`,`Id_Aeropuerto`) 
    VALUES (NULL, '$codigo','$capacidad', '$estado','$estado2');";

    date_default_timezone_set('America/Mexico_City');

    try {
    $resultado=mysqli_query($conn, $insertar);
    }catch(Exception $e) {

    $datos = date('H:i:s');
    $hora=explode(":", $datos);
    $datos2 = date('d/m/Y');

    $fecha=explode("/", $datos2);
  
    $path = "temp/logGuardarHangar-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
    header("Location: ../../principaladmin.php");
    }

    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/hangares.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>