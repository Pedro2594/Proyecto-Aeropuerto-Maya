<?php
$pantallas_permitidas = ['Acciones', 'Aeronave', 'Aeropuerto', 'Boleto', 'Checkin', 'Cuidad', 'Clase', 'Conversion', 
'DetalleFactura', 'Equipaje', 'Factura', 'Hangares', 'Moneda', 'Pais', 'PantallaAcciones', 'Pantallas', 'Parametros', 
'Pasajero', 'PaseAbordar', 'PersonalTierra', 'Reserva', 'Roles', 'RolesPantallasAccion', 'Tripulacion', 'Vuelo'];

if(!array_key_exists('pantallaN', $_SESSION) || !in_array($_SESSION['pantallaN'], $pantallas_permitidas)){
    echo  "<script>
    alert('El usuario no tiene permisos para acceder a esta pantalla.');
    window.location = '../principaladmin.php';
    </script>";
}
?>