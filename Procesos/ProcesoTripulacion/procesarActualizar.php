<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');
    $id=$_POST['id'];
    $cargo=$_POST['cargo'];
    $horasvuelo=$_POST['horasvuelo'];
    $tipolicencia=$_POST['tipolicencia'];
    $academia=$_POST['academia'];
  

    $actualizar="UPDATE tripulacion SET Cargo='$cargo', Horas_Vuelo='$horasvuelo', Tipo_Licencia='$tipolicencia', Academia='$academia' WHERE Id_Tripulacion='$id'";

  
    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
       $datos = date('H:i:s');
       $hora=explode(":", $datos);
       $datos2 = date('d/m/Y');
    
       $fecha=explode("/", $datos2);
       
        $path = "ActualizarTripulacion-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
        header("Location: ../../principaladmin.php");
    }
 

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultatripulacion.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = '../../Consultas/Consultatripulacion.php';
        </script>";
    }
?>