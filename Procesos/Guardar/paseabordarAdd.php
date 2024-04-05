<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');
    
    $codigo=$_POST['codigo'];
    $fecha=$_POST['fecha'];
    $puertaembarque=$_POST['puertaembarque'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
  


    $insertar="INSERT INTO `paseabordar` (`Id_Pase`, `Codigo`, `Fecha`, `Puerta_Embarque`, `Id_Boleto`, `Id_Pasajero`) 
    VALUES (NULL, '$codigo', '$fecha', '$puertaembarque', '$estado', '$estado2');";

    

    // echo "<script> alert('".$codigo."'); </script>";
    try {
        $resultado=mysqli_query($conn, $insertar);
    }catch(Exception $e) {
      $datos = date('H:i:s');
      $hora=explode(":", $datos);
      $datos2 = date('d/m/Y');
   
      $fecha=explode("/", $datos2);
      
       $path = "GuardarPaseAbordar-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
       error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
       header("Location: ../../principaladmin.php");
   }

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/paseabordar.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>