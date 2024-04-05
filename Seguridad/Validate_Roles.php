<?php
$roles_permitidos = ['Admin', 'User'];

if(!array_key_exists('rolN', $_SESSION) || !in_array($_SESSION['rolN'], $roles_permitidos)){
    echo  "<script>
    alert('El usuario no tiene permisos para acceder a esta ventana.');
    window.location = '../principaladmin.php';
    </script>";
}
?>