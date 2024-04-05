<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

   
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $pasajero=$_POST['pasajero'];
    $fecha=$_POST['fecha'];
   

    $actualizar="UPDATE reserva SET Estado='0' WHERE Id_Reserva='$estado'";
    $insertar="INSERT INTO `checkin` (`Id_Checkin`,`Id_Reserva`,`Pasajero`,`Fecha_Hora`) 
    VALUES (NULL,'$estado', '$pasajero','$fecha');";

    
    $res2=mysqli_query($conn, $actualizar);
    // echo "<script> alert('".$nombre."'); </script>";
    try {
        $resultado=mysqli_query($conn, $insertar);
    }catch(Exception $e) {
      $datos = date('H:i:s');
      $hora=explode(":", $datos);
      $datos2 = date('d/m/Y');
   
      $fecha=explode("/", $datos2);
      
       $path = "GuardarCheckin-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";

       error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
       header("Location: ../../principaladmin.php");
    }

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/checkin.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
  
    }
    
?>