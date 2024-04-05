<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $numerodoc=$_POST['documento'];
    $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];
    $Id_Pais= filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
    $fechaN=$_POST['fechaN'];


  

    $actualizar="UPDATE pasajero SET Nombre='$nombre', Tipo_Documento='$estado', Numero_Documento='$numerodoc', Telefono='$telefono', Correo='$correo', Id_Pais='$Id_Pais', Fecha_Nacimiento='$fechaN' WHERE Id_Pasajero='$id'";

   
    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
       $datos = date('H:i:s');
       $hora=explode(":", $datos);
       $datos2 = date('d/m/Y');
    
       $fecha=explode("/", $datos2);
       
        $path = "ActualizarPasajero-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
        header("Location: ../../principaladmin.php");
    }
 

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultapasajeros.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarPasajero.php';
        </script>";
    }
?>