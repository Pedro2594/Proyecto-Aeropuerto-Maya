<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);

    $insertar="INSERT INTO `pantallaacciones` (`Id_PantallaAccion`, `Id_Pantalla`, `Id_Acciones`, `Activo`) 
    VALUES (NULL, '$estado', '$estado2', '1');";

  

    // echo "<script> alert('".$nombre."'); </script>";
    date_default_timezone_set('America/Mexico_City');

    try {
        $resultado=mysqli_query($conn, $insertar);
    }catch(Exception $e) {
      $datos = date('H:i:s');
      $hora=explode(":", $datos);
      $datos2 = date('d/m/Y');
    
      $fecha=explode("/", $datos2);
      
       $path = "GuardarPantallaAcciones-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
       error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
       header("Location: ../../principaladmin.php");
    }
    


    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/pantallaacciones.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>