<?php
    include ("../../conexion.php");
    
    $cargo=$_POST['cargo'];
    $horasvuelo=$_POST['horasvuelo'];
    $tipolicencia=$_POST['tipolicencia'];
    $academia=$_POST['academia'];
  
    $insertar="INSERT INTO `tripulacion` (`Id_Tripulacion`,`Cargo`,`Horas_Vuelo`,`Tipo_Licencia`,`Academia`) 
    VALUES (NULL, '$cargo','$horasvuelo','$tipolicencia','$academia');";

  

    // echo "<script> alert('".$cargo."'); </script>";
    try {
        $resultado=mysqli_query($conn, $insertar);
    }catch(Exception $e) {
      $datos = date('H:i:s');
      $hora=explode(":", $datos);
      $datos2 = date('d/m/Y');
   
      $fecha=explode("/", $datos2);
      
       $path = "GuardarTripulacion-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
       error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
       header("Location: ../../principaladmin.php");
      
   }

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/tripulacion.php';
        </script>";
        exit();
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>