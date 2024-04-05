<?php

 
 
function redondear_dos_decimal($valor) {
	$float_redondeado=round($valor * 100) / 100;
	return $float_redondeado;
	}
    
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $codigo=$_POST['codigo'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
    $estado3 = filter_input(INPUT_POST, 'estado3', FILTER_SANITIZE_STRING);
    $estado4 = filter_input(INPUT_POST, 'estado4', FILTER_SANITIZE_STRING);
    $estado5 = filter_input(INPUT_POST, 'estado5', FILTER_SANITIZE_STRING);

    $query4=mysqli_query($conn, "SELECT `vuelo`.`Precio` FROM `vuelo` WHERE `Id_Vuelo`=$estado3;");
    $date = array();
  
    while($datos = mysqli_fetch_array($query4)) {
        array_push($date, $datos['Precio']);
    }

$pruebafecha=$date[0];

    $query5=mysqli_query($conn, "SELECT MultiplicadorPrecio FROM equipaje WHERE Id_Equipaje=$estado4");
    $equi = array();
  
    while($datos = mysqli_fetch_array($query5)) {
        array_push($equi, $datos['MultiplicadorPrecio']);
    }

$pruebaequi=$equi[0];

    $query6=mysqli_query($conn, "SELECT MultiplicadorPrecio FROM clase WHERE Id_Clase=$estado5");
 
    $cla = array();
  
    while($datos = mysqli_fetch_array($query6)) {
        array_push($cla, $datos['MultiplicadorPrecio']);
    }

$pruebacla=$cla[0];  


$costo_vuelo=$pruebafecha;
    $costo_clase=redondear_dos_decimal($costo_vuelo*$pruebacla);
    $costo_equipaje=redondear_dos_decimal($costo_vuelo*$pruebaequi);


$monto=$costo_vuelo + $costo_clase + $costo_equipaje;




$sql2 = "SELECT Id_Boleto FROM boleto
    WHERE Codigo = '$codigo'";
    $resultado2 = $conn->query($sql2);
    $rows2 = $resultado2->num_rows;

if($rows2 > 0){

$queryboletos=mysqli_query($conn, "SELECT `boleto`.`Codigo`, `boleto`.`Id_Pasajero`,`boleto`.`Id_Vuelo`,`boleto`.`Id_Clase` FROM `boleto` WHERE `Codigo`='$codigo';");
$codg = array();
$idpas = array();
$idvuel = array();
$idclas = array();
while($datos = mysqli_fetch_array($queryboletos)) {
    array_push($codg, $datos['Codigo']);
    array_push($idpas, $datos['Id_Pasajero']);
    array_push($idvuel, $datos['Id_Vuelo']);
    array_push($idclas, $datos['Id_Clase']);
}

$pruebacodg=$codg[0];
$pruebaidpas=$idpas[0];
$pruebaidvuel=$idvuel[0];
$pruebaidclas=$idclas[0];

if(($codigo!=$pruebacodg) || ($estado2!=$pruebaidpas) || ($estado3!=$pruebaidvuel) || ($estado5!=$pruebaidclas)){
    echo  "<script>
    alert('Los valores para registrar este boleto no son correctos');
    window.location = '../../DatosMaestros/boleto.php';
    </script>";  
}else{
    $actualizar="UPDATE listaasientos SET Estado='0' WHERE Id_Lista='$estado'";
    $insertar="INSERT INTO `boleto` (`Id_Boleto`, `Codigo`, `Id_Asiento`, `Id_Pasajero`, `Id_Vuelo`, `Id_Equipaje`,`Id_Clase`,`Precio`,`Estado`) 
    VALUES (NULL, '$codigo', '$estado', '$estado2','$estado3','$estado4','$estado5','$monto','1');";
    $res2=mysqli_query($conn, $actualizar);
    

    // echo "<script> alert('".$nombre."'); </script>";
    try {
        
        $resultado=mysqli_query($conn, $insertar);
     }catch(Exception $e) {
       $datos = date('H:i:s');
       $hora=explode(":", $datos);
       $datos2 = date('d/m/Y');
    
       $fecha=explode("/", $datos2);
       
        $path = "GuardarBoleto-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
        header("Location: ../../principaladmin.php");
    }
    

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/boleto.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../Consultas/Consultaboletos.php';
        </script>";
    }   
}
}else{
    $actualizar="UPDATE listaasientos SET Estado='0' WHERE Id_Lista='$estado'";
    $insertar="INSERT INTO `boleto` (`Id_Boleto`, `Codigo`, `Id_Asiento`, `Id_Pasajero`, `Id_Vuelo`, `Id_Equipaje`,`Id_Clase`,`Precio`,`Estado`) 
    VALUES (NULL, '$codigo', '$estado', '$estado2','$estado3','$estado4','$estado5','$monto','1');";
    $resultado=mysqli_query($conn, $insertar);
    $res2=mysqli_query($conn, $actualizar);

    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/boleto.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
}

?>