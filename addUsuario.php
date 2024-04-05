<?php
include("conexion.php");

$Usuario= $_POST['Usuario'];
$Pass= $_POST['Pass'];
$estado2=  filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);

	$sql2 = "SELECT idUser FROM usuario
    WHERE Usuario = '$Usuario'";
    $resultado2 = $conn->query($sql2);
    $rows2 = $resultado2->num_rows;

if($rows2 > 0){
    echo  "<script>
    alert('Este nombre de usuario ya ha sido registrado');
    window.location = 'Seguridad/usuario.php';
    </script>";  

}else{

$insertarUser= "INSERT INTO usuario (idUser, Usuario, Pass, Id_Rol, Estado)
VALUES(NULL,'$Usuario', sha1('$Pass'), '$estado2','1');";

$resultado = mysqli_query($conn, $insertarUser);

if($resultado) {
    echo "<script>
    alert('Se ha insertado correctamente los datos');
    window.location = 'index.php';
    </script>";

} else {
    echo  "<script>
    alert('NO SE PUDO insertar los datos');
    window.location = 'Seguridad/usuario.php';
    </script>";
}

}
mysqli_close($conn);


?>