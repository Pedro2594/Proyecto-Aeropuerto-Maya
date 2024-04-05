<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $id=$_POST['id'];
    $tipoclase=$_POST['estado2'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    
  

    $actualizar="UPDATE clase SET Tipo_Clase='$tipoclase', Descripcion='$descripcion', MultiplicadorPrecio='$precio' WHERE Id_Clase='$id'";

    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
    
        $datos = date('H:i:s');
        $hora=explode(":", $datos);
        $datos2 = date('d/m/Y');
    
        $fecha=explode("/", $datos2);
      
        $path = "temp/logActualizarClase-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
        header("Location: ../../principaladmin.php");
     }   

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultaclase.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = '../../Consultas/Consultaclase.php';
        </script>";
    }
?>