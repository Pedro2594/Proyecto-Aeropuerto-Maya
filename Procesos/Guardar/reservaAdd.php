<?php
    include ("../../conexion.php");

    $codigo=$_POST['codigo'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    
   

    $insertar="INSERT INTO `reserva` (`Id_Reserva`, `Codigo`, `Pasajero`,`Estado`) 
    VALUES (NULL, '$codigo', '$estado', '1');";

    

    // echo "<script> alert('".$nombre."'); </script>";
    try {
        $resultado=mysqli_query($conn, $insertar);
    }catch(Exception $e) {
      $datos = date('H:i:s');
      $hora=explode(":", $datos);
      $datos2 = date('d/m/Y');
   
      $fecha=explode("/", $datos2);
      
       $path = "GuardarReserva-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
       error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
       header("Location: ../../principaladmin.php");
   }
    

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/reserva.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>