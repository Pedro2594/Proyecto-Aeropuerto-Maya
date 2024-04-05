<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $id=$_POST['id'];
    $estado=$_POST['estado'];
    $estado2=$_POST['estado2'];
    $activo=$_POST['activo'];
  

    $actualizar="UPDATE pantallaaccion SET Id_Pantalla='$estado', Id_Acciones='$estado2', Activo='$activo' WHERE Id_PantallaAccion='$id'";

    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
    
        $datos = date('H:i:s');
        $hora=explode(":", $datos);
        $datos2 = date('d/m/Y');
    
        $fecha=explode("/", $datos2);
      
        $path = "temp/logActualizarPantallaAcciones-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
        header("Location: ../../principaladmin.php");
     } 

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultapantallaacciones.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = '../../Consultas/Consultapantallaacciones.php';
        </script>";
    }
?>