<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $nombre=$_POST['nombre'];
    $conversionadolar=$_POST['conversionadolar'];


    $insertar="INSERT INTO `moneda` (`Id_Moneda`, `Nombre`, `ConversionADolar`) 
    VALUES (NULL, '$nombre', '$conversionadolar');";

    
try {
    $resultado=mysqli_query($conn, $insertar);
}catch(Exception $e) {
  $datos = date('H:i:s');
  $hora=explode(":", $datos);
  $datos2 = date('d/m/Y');

  $fecha=explode("/", $datos2);
  
   $path = "GuardarMoneda-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
   error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
   header("Location: ../../principaladmin.php");
}
    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/moneda.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>