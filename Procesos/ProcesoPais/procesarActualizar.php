<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $estado=$_POST['estado'];

  

    $actualizar="UPDATE pais SET Nombre='$nombre', Region='$estado' WHERE Id_Pais='$id'";

    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
    
        $datos = date('H:i:s');
        $hora=explode(":", $datos);
        $datos2 = date('d/m/Y');
    
        $fecha=explode("/", $datos2);
      
        $path = "temp/logActualizarPais-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
        header("Location: ../../principaladmin.php");
     } 

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultapaises.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = '../../Consultas/Consultapaises.php';
        </script>";
    }
?>