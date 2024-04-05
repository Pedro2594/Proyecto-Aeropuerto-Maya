<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $matricula=$_POST['matricula'];
    $modelo=$_POST['modelo'];
    $capacidad=$_POST['capacidad'];
    $tamanio=$_POST['tamanio'];
    $tipo=$_POST['tipo'];
    $area=$_POST['area'];


    $insertar="INSERT INTO `aeronave` (`Id_Aeronave`, `Matricula`, `Modelo`, `Capacidad`, `Tamaño`, `Tipo`, `Area`) 
    VALUES (NULL, '$matricula', '$modelo', '$capacidad', '$tamanio', '$tipo', '$area');";

  

    // echo "<script> alert('".$nombre."'); </script>";
    date_default_timezone_set('America/Mexico_City');

    try {
        $resultado=mysqli_query($conn, $insertar);
    }catch(Exception $e) {
      $datos = date('H:i:s');
      $hora=explode(":", $datos);
      $datos2 = date('d/m/Y');
    
      $fecha=explode("/", $datos2);
      
       $path = "GuardarAeronave-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
       error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
       header("Location: ../../principaladmin.php");
    }
    


    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/aeronave.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>