<?php

include("conexion.php");
session_start();
if(!empty($_POST)){
    $usuario = mysqli_real_escape_string($conn,$_POST['user']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);
    $password_encriptada = sha1($password);


	$sql2 = "SELECT idUser FROM usuario
    WHERE Usuario = '$usuario' AND Estado = '0'";
    $resultado2 = $conn->query($sql2);
    $rows2 = $resultado2->num_rows;
	if($rows2 > 0){
		echo  "<script>
		alert('El usuario está deshabilitado');
		</script>";
	}else{

$sql = "SELECT idUser, rol.Nombre as rolN, p.Nombre as pantallaN FROM usuario LEFT JOIN rol ON usuario.Id_Rol = rol.Id_Rol 
INNER JOIN rolespantallasacciones rp ON rp.Id_Rol = rol.Id_Rol 
INNER JOIN pantallas p ON p.Id_Pantalla = rp.Id_Pantalla
    WHERE Usuario = '$usuario' AND Pass = '$password_encriptada'";
    $resultado = $conn->query($sql);
    $rows = $resultado->num_rows;

    if($rows > 0){
        $row = $resultado->fetch_assoc();
        $_SESSION['idUser'] = $row ['idUser'];
		$_SESSION['rolN'] = $row ['rolN'];
		$_SESSION['pantallaN'] = $row ['pantallaN'];
        header("Location: principaladmin.php");
        $_SESSION['fails'] = 0;
    }else{
        echo  "<script>
        alert('El usuario o password incorrectas');
        window.location = 'index.php';
        </script>";
		$_SESSION['fails'] = $_SESSION['fails'] + 1;
		if ($_SESSION['fails'] == 3 ) {
			echo  "<script>
			alert('El usuario será deshabilitado');
			</script>";
			$eliminar="UPDATE usuario SET Estado='0' WHERE Usuario='$usuario'";
			$resultado=mysqli_query($conn,$eliminar);

		}
	
	}
	
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-***" crossorigin="anonymous" />
 <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
 crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background-image: url('http://localhost/AeropuertoMaya_ISI_2023/img/jeje.jpg');">
	<main>
		<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" class="formulario" id="formulario" style="background-color: rgba(58, 56, 56, 0.4);">
			<table>
				
			<tr>
					<td colspan=10 width=100% align="center">
					<img src="img/logo1.png" width="100%" style="margin-left:60%;">
					<h1> Airlines</h1>

				</td>	

				
			</tr>	
						
			<td colspan=5 ><!-- Grupo: Usuario -->
				<div class="formulario__grupo" id="grupo__usuario">
					<label for="usuario" class="formulario__label"><i class="bi bi-people-fill"></i> Usuario </label>
					<div class="formulario__grupo-input">
						<input  type="text" class="formulario__input" name="user" id="usuario" placeholder="Ingrese su usuario">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					</div>
		</td>
		</tr>
				
		<tr>
		<td colspan=5>
			
				<!-- Grupo: Contraseña -->
				<div class="formulario__grupo" id="grupo__password">
					<label for="password" class="formulario__label"><i class="bi bi-file-lock"></i> Contraseña</label>
					<div class="formulario__grupo-input">
						<input type="password" class="formulario__input" name="pass" id="password" placeholder="Ingrese su contraseña">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
				</div>
			 </td>
	
	
		</tr>
		
	<tr>
		
		<td colspan="19">
			<div class="formulario__grupo">
				<input type="submit"  value="Iniciar Sesión" class="formulario__btn">
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			</div>
		</td>	
	</tr>
			<!-- Grupo: Terminos y Condiciones -->
			<!--<div class="formulario__grupo" id="grupo__terminos">
				<label class="formulario__label">
					<input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
					Acepto los Terminos y Condiciones
				</label>
			</div>

			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>
			<br>
		-->
		
		</form>
	</table>
	</main>


	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>