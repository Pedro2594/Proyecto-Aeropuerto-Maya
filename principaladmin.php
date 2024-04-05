<?php
    include("conexion.php");
    session_start();
if (!isset($_SESSION['idUser'])) {
    echo "No está autorizado para ver esto";
    header('location: index.php'); 
    die();
}

    $vuelo=mysqli_query($conn, "SELECT COUNT(`Id_Vuelo`) AS vueloRes FROM `vuelo`;");
    $aeronaves=mysqli_query($conn, "SELECT COUNT(`Id_Aeronave`) AS aeronaveRes FROM `aeronave`;");
    $boleto=mysqli_query($conn, "SELECT COUNT(`Id_Boleto`) AS boletoRes FROM `boleto`;");
    $usuario=mysqli_query($conn, "SELECT COUNT(`idUser`) AS usuarioRes FROM `usuario`;");

    $bar=mysqli_query($conn, "SELECT `aeronave`.`Matricula`, `aeronave`.`Capacidad` FROM `aeronave`;");

    $marca = array();
    $cantidad = array();

    while($datos = mysqli_fetch_array($bar)) {
       array_push($marca, $datos['Matricula']);
       array_push($cantidad, $datos['Capacidad']);
    }


    $pie=mysqli_query($conn, "SELECT `vuelo`.`Fecha`, COUNT(`vuelo`.`Id_Vuelo`) AS VuelosTotales FROM `vuelo`;");

    $fecha = array();
    $total = array();

    while($datos = mysqli_fetch_array($pie)) {
        array_push($fecha, $datos['Fecha']);
        array_push($total, $datos['VuelosTotales']);
    }

    // echo var_dump($marca);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Administración</title>

    <link href="style/Dashboard/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="style/cuerpo/Dashboard-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/cuerpo/dashboard.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
   
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body id="page-top">
    <div id="wrapper">
        <!--Empieza Lista -->
        <ul class="navbar-nav color sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="principaladmin.php">
                <div class="sidebar-brand-text mx-3" style="font-family:Luminari;font-size:20px;"><i class="fa-solid fa-mosque"></i> Emirates Airlines</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="principaladmin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Datos
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Datos Maestros</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="DatosMaestros/tripulacion.php">Tripulación</a>
                        <a class="collapse-item" href="DatosMaestros/personaltierra.php">Personal de tierra</a>
                        <a class="collapse-item" href="DatosMaestros/aeronave.php">Aeronave</a>
                        <a class="collapse-item" href="DatosMaestros/aeropuerto.php">Aeropuerto</a>
                        <a class="collapse-item" href="DatosMaestros/boleto.php">Boleto</a>
                        <a class="collapse-item" href="DatosMaestros/pais.php">País</a>
                        <a class="collapse-item" href="DatosMaestros/ciudad.php">Ciudad</a>
                        <a class="collapse-item" href="DatosMaestros/pasajero.php">Pasajero</a>
                        <a class="collapse-item" href="DatosMaestros/paseabordar.php">Pase de abordar</a>
                        <a class="collapse-item" href="DatosMaestros/vuelo.php">Vuelo</a>
                        <a class="collapse-item" href="DatosMaestros/factura.php">Factura</a>
                        <a class="collapse-item" href="DatosMaestros/hangares.php">Hangar</a>
                        <a class="collapse-item" href="DatosMaestros/reserva.php">Reserva</a>
                        <a class="collapse-item" href="DatosMaestros/clase.php">Clase</a>
                        <a class="collapse-item" href="DatosMaestros/moneda.php">Moneda</a>
                        <a class="collapse-item" href="DatosMaestros/checkin.php">Check-In</a>
                        <a class="collapse-item" href="DatosMaestros/equipaje.php">Equipaje</a>
                        <a class="collapse-item" href="DatosMaestros/detallefactura.php">Detalles</a>
                        <a class="collapse-item" href="DatosMaestros/parametros.php">Parametro</a>
                        <a class="collapse-item" href="DatosMaestros/rol.php">Rol</a>
                        <a class="collapse-item" href="DatosMaestros/acciones.php">Acciones</a>
                        <a class="collapse-item" href="DatosMaestros/pantallas.php">Pantallas</a>
                        <a class="collapse-item" href="DatosMaestros/pantallaacciones.php">Pantalla Acciones</a>
                        <a class="collapse-item" href="DatosMaestros/rolespantallasacciones.php">Roles Pantallas Acciones</a>
                    </div>
                </div>
            </li>

        
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Consultas</span>
                </a>
                <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="Consultas/Consultaaeropuertos.php">Aeropuertos</a>
                        <a class="collapse-item" href="Consultas/Consultaseronaves.php">Aeronaves</a>
                        <a class="collapse-item" href="Consultas/Consultapaises.php">Paises</a>
                        <a class="collapse-item" href="Consultas/Consultaboletos.php">Boletos</a>
                        <a class="collapse-item" href="Consultas/Consultaciudades.php">Ciudades</a>
                        <a class="collapse-item" href="Consultas/Consultapasajeros.php">Pasajeros</a>
                        <a class="collapse-item" href="Consultas/Consultapaseabordar.php">Pase de Abordar</a>
                        <a class="collapse-item" href="Consultas/ConsultaPersonaltierra.php">Personal de Tierra</a>
                        <a class="collapse-item" href="Consultas/Consultatripulacion.php">Tripulacion</a>
                        <a class="collapse-item" href="Consultas/Consultavuelo.php">Vuelo</a>
                        <a class="collapse-item" href="Consultas/Consultahangar.php">Hangar</a>
                        <a class="collapse-item" href="Consultas/Consultacheckin.php">Check-In</a>
                        <a class="collapse-item" href="Consultas/Consultareserva.php">Reserva</a>
                        <a class="collapse-item" href="Consultas/Consultamoneda.php">Moneda</a>
                        <a class="collapse-item" href="Consultas/Consultaclase.php">Clase</a>
                        <a class="collapse-item" href="Consultas/Consultafactura.php">Factura</a>
                        <a class="collapse-item" href="Consultas/Consultaequipaje.php">Equipaje</a>
                        <a class="collapse-item" href="Consultas/Consultadetalles.php">Detalle</a>
                        <a class="collapse-item" href="Consultas/Consultaparametro.php">Parametro</a>
                        <a class="collapse-item" href="Consultas/Consultarol.php">Rol</a>
                        <a class="collapse-item" href="Consultas/Consultaacciones.php">Acciones</a>
                        <a class="collapse-item" href="Consultas/Consultapantallas.php">Pantallas</a>
                        <a class="collapse-item" href="Consultas/Consultapantallaacciones.php">Pantalla Acciones</a>
                        <a class="collapse-item" href="Consultas/Consultarolespantallasacciones.php">Roles Pantallas Acciones</a>
                       
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Seguridad</span>
                </a>
                <div id="collapsePages4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="Seguridad/usuario.php">Usuario</a>
                        <a class="collapse-item" href="Seguridad/Consultausuarios.php">Consulta de Usuarios</a>
                    </div>
                </div>
            </li>
        </ul>
        <!--Termina Lista -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand  topbar mb-4 static-top shadow"style="background-color:#060724;">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <i class="bi bi-box-arrow-left" style="color:white;font-size:32px;"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="pages/logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><i class="fa-solid fa-plane-departure"></i> 
                                               Vuelos programados</div>
                                            <?php 
                                               while($datos = mysqli_fetch_array($vuelo)) {
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $datos['vueloRes']?></div>
                                            <?php
                                                }
                                            ?>
                                            </div>
                                        <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <i class="fa-solid fa-plane"></i>  Aeronaves en propiedad</div>
                                            <?php 
                                                while($datos = mysqli_fetch_array($aeronaves)) {
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $datos['aeronaveRes']?></div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><i class="fa-solid fa-users-viewfinder"></i> Usuarios registrados
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <?php 
                                                        while($datos = mysqli_fetch_array($usuario)) {
                                                    ?>
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $datos['usuarioRes']?></div>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            <i class="fa-solid fa-dollar-sign"></i> Boletos vendidos</div>
                                            <?php 
                                                while($datos = mysqli_fetch_array($boleto)) {
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $datos['boletoRes']?></div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color:#060724;">
                                    <h6 class="m-0 font-weight-bold"style="color:#ffff;"><i class="fa-solid fa-plane-departure"></i> Gráfica de aeronave por capacidad</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart" style="width:100%; max-width:700px"></canvas>

                                    <script>
                                        var xValues = <?php echo json_encode($marca); ?>;
                                        var yValues = <?php echo json_encode($cantidad); ?>;
                                        var barColors = ["red","blue","orange","brown"];

                                        new Chart("myChart", {
                                        type: "bar",
                                        data: {
                                            labels: xValues,
                                            datasets: [{
                                            backgroundColor: barColors,
                                            data: yValues
                                            }]
                                        },
                                        options: {
                                            legend: {display: false},
                                            title: {
                                            display: true,
                                            text: ""
                                            }
                                        }
                                        });
                                    </script>
                                </div>
                            
                            </div>
                            <input type="hidden" id="iduser" value="<?php echo $IdUser?>">
                            <input type="hidden" id="oculto" value="<?=$asx4?>">
                        </div>
                        <div class="col-xl-6 col-lg-5">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color:#060724;">
                                    <h6 class="m-0 font-weight-bold" style="color:#ffff;"><i class="fa-solid fa-sun"></i> Gráfica de vuelo por día</h6>
                                </div>
                                <div class="card-body">
                                <canvas id="myChart2" style="width:100%; max-width:3000px"></canvas>
                                    <script>
                                        var xValues = <?php echo json_encode($fecha); ?>;
                                        var yValues = <?php echo json_encode($total); ?>;
                                        var barColors = [
                                        "#b91d47",
                                        "#00aba9",
                                        "#2b5797",
                                        "#e8c3b9",
                                        "#1e7145"
                                        ];

                                        new Chart("myChart2", {
                                        type: "pie",
                                        data: {
                                            labels: xValues,
                                            datasets: [{
                                            backgroundColor: barColors,
                                            data: yValues
                                            }]
                                        },
                                        options: {
                                            title: {
                                            display: true,
                                            text: ""
                                            }
                                        }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Emirates Airlanes 2023</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar sesión</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" Si asi lo desea.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="cerrarsesion.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <script src="style/Dashboard/jquery/jquery.min.js"></script>
    <script src="style/Dashboard/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="style/Dashboard/jquery-easing/jquery.easing.min.js"></script>
    <script src="style/js/Dashboard-2.min.js"></script>
</body>

</html>