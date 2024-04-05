<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $id=$_POST['id'];
    $cai=$_POST['cai'];
    $fecha_ven=$_POST['fecha_ven'];
    $fecha_emi=$_POST['fecha_emi'];
    $rango_ini=$_POST['rango_ini'];
    $rango_fin=$_POST['rango_fin'];
    $consecutivo=$_POST['consecutivo'];
   
  

    $actualizar="UPDATE parametro SET Cai='$cai', Fecha_Ven='$fecha_ven', Fecha_Emi='$fecha_emi', Rango_Ini='$rango_ini', Rango_Fin='$rango_fin', Consecutivo='$consecutivo' WHERE Id_Parametro='$id'";

    
    try {
        $resultado=mysqli_query($conn,$actualizar);
      }catch(Exception $e) {
        $datos = date('H:i:s');
        $hora=explode(":", $datos);
        $datos2 = date('d/m/Y');
     
        $fecha=explode("/", $datos2);
        
         $path = "ActualizarParametro-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
         error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
         header("Location: ../../principaladmin.php");
     }


    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultaparametro.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarParametro.php';
        </script>";
    }
?>