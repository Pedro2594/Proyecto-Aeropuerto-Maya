<?php
    include ("../../conexion.php");

    $id = $_GET['id'];

    // Verificar si el usuario es lector
    $sql1 = "SELECT Id_Rol FROM usuario WHERE idUser = '$id' AND Id_Rol = '3'";
    $resultado1 = $conn->query($sql1);
    $rows1 = $resultado1->num_rows;

    // Si es lector, ascender a usuario
    if ($rows1 > 0) {
        $actualizar = "UPDATE usuario SET Id_Rol='2' WHERE idUser='$id'";
        $resultado = mysqli_query($conn, $actualizar);

        if ($resultado) {
            echo "<script>
                alert('Se ha ascendido este usuario a User');
                window.location = '../../Seguridad/Consultausuarios.php';
            </script>";
        } else {
            echo "<script>
                alert('No se ha podido ascender este usuario');
                window.location = 'actualizarUsuario.php';
            </script>";
        }
    } else {
        // Verificar si el usuario es user
        $sql2 = "SELECT Id_Rol FROM usuario WHERE idUser = '$id' AND Id_Rol = '2'";
        $resultado2 = $conn->query($sql2);
        $rows2 = $resultado2->num_rows;

        // Si es user, ascender a administrador
        if ($rows2 > 0) {
            $actualizar = "UPDATE usuario SET Id_Rol='1' WHERE idUser='$id'";
            $resultado = mysqli_query($conn, $actualizar);

            if ($resultado) {
                echo "<script>
                    alert('Se ha ascendido este usuario a Administrador');
                    window.location = '../../Seguridad/Consultausuarios.php';
                </script>";
            } else {
                echo "<script>
                    alert('No se ha podido ascender este usuario');
                    window.location = 'actualizarUsuario.php';
                </script>";
            }
        } else {
            // Si es administrador, descender a lector
            $actualizar = "UPDATE usuario SET Id_Rol='3' WHERE idUser='$id'";
            $resultado = mysqli_query($conn, $actualizar);

            if ($resultado) {
                echo "<script>
                    alert('Se ha descendido este usuario a Lector');
                    window.location = '../../Seguridad/Consultausuarios.php';
                </script>";
            } else {
                echo "<script>
                    alert('No se ha podido descender este usuario');
                    window.location = 'actualizarUsuario.php';
                </script>";
            }
        }
    }
?>
