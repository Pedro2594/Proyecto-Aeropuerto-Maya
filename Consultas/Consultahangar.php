<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hangar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../style/cuerpo/Dashboard-2.min.css" rel="stylesheet">
    <link href="../style/cuerpo/dashboard.css" rel="stylesheet">
    <link href="../style/Dashboard/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-***" crossorigin="anonymous" />
 <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    echo "No está autorizado para ver esto";
    header('location: ../index.php'); 
    die();
}
date_default_timezone_set('America/Mexico_City');
try {
    require("../Procesos/ProcesoHangar/TablaHangar.php");
  }catch(Exception $e) {
    $datos = date('H:i:s');
    $hora=explode(":", $datos);
    $datos2 = date('d/m/Y');
 
    $fecha=explode("/", $datos2);
    
     $path = "temp/ConsultaHangar-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
     error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
     echo  "<script>
        window.location = '../../Consultas/Consultahangar.php';
        </script>";
 }
    ?>
<body id="page-top">
    <div id="wrapper">
        <!--Empieza Lista -->
        <ul class="navbar-nav color sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../principaladmin.php">
            <div class="sidebar-brand-text mx-3" style="font-family:Luminari;font-size:20px;"> <i class="fa-solid fa-mosque"></i> Emirates Airlines</div>
        </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="../principaladmin.php">
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
                    <a class="collapse-item" href="../DatosMaestros/tripulacion.php">Tripulación</a>
                        <a class="collapse-item" href="../DatosMaestros/personaltierra.php">Personal de tierra</a>
                        <a class="collapse-item" href="../DatosMaestros/aeronave.php">Aeronave</a>
                        <a class="collapse-item" href="../DatosMaestros/aeropuerto.php">Aeropuerto</a>
                        <a class="collapse-item" href="../DatosMaestros/boleto.php">Boleto</a>
                        <a class="collapse-item" href="../DatosMaestros/pais.php">Pais</a>
                        <a class="collapse-item" href="../DatosMaestros/ciudad.php">Ciudad</a>
                        <a class="collapse-item" href="../DatosMaestros/pasajero.php">Pasajero</a>
                        <a class="collapse-item" href="../DatosMaestros/paseabordar.php">Pase de abordar</a>
                        <a class="collapse-item" href="../DatosMaestros/vuelo.php">Vuelo</a>
                        <a class="collapse-item" href="../DatosMaestros/factura.php">Factura</a>
                        <a class="collapse-item" href="../DatosMaestros/hangares.php">Hangar</a>
                        <a class="collapse-item" href="../DatosMaestros/reserva.php">Reserva</a>
                        <a class="collapse-item" href="../DatosMaestros/clase.php">Clase</a>
                        <a class="collapse-item" href="../DatosMaestros/moneda.php">Moneda</a>
                        <a class="collapse-item" href="../DatosMaestros/checkin.php">Check-In</a>
                        <a class="collapse-item" href="../DatosMaestros/equipaje.php">Equipaje</a>
                        <a class="collapse-item" href="../DatosMaestros/detallefactura.php">Detalles</a>
                        <a class="collapse-item" href="../DatosMaestros/parametros.php">Parámetros</a>

                        <a class="collapse-item" href="../DatosMaestros/rol.php">Rol</a>
                        <a class="collapse-item" href="../DatosMaestros/acciones.php">Acciones</a>
                        <a class="collapse-item" href="../DatosMaestros/pantallas.php">Pantallas</a>
                        <a class="collapse-item" href="../DatosMaestros/pantallaacciones.php">Pantalla Acciones</a>
                        <a class="collapse-item" href="../DatosMaestros/rolespantallasacciones.php">Roles Pantallas Acciones</a>
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
                        
                    <a class="collapse-item" href="Consultaaeropuertos.php">Aeropuertos</a>
                        <a class="collapse-item" href="Consultaseronaves.php">Aeronaves</a>
                        <a class="collapse-item" href="Consultapaises.php">Paises</a>
                        <a class="collapse-item" href="Consultaboletos.php">Boletos</a>
                        <a class="collapse-item" href="Consultaciudades.php">Ciudades</a>
                        <a class="collapse-item" href="Consultapasajeros.php">Pasajeros</a>
                        <a class="collapse-item" href="Consultapaseabordar.php">Pase de Abordar</a>
                        <a class="collapse-item" href="ConsultaPersonaltierra.php">Personal de Tierra</a>
                        <a class="collapse-item" href="Consultatripulacion.php">Tripulacion</a>
                        <a class="collapse-item" href="Consultavuelo.php">Vuelo</a>
                        <a class="collapse-item" href="Consultahangar.php">Hangar</a>
                        <a class="collapse-item" href="Consultacheckin.php">Check-In</a>
                        <a class="collapse-item" href="Consultareserva.php">Reserva</a>
                        <a class="collapse-item" href="Consultamoneda.php">Moneda</a>
                        <a class="collapse-item" href="Consultaclase.php">Clase</a>
                        <a class="collapse-item" href="Consultafactura.php">Factura</a>
                        <a class="collapse-item" href="Consultaequipaje.php">Equipaje</a>
                        <a class="collapse-item" href="Consultadetalles.php">Detalles</a>
                        <a class="collapse-item" href="Consultaparametro.php">Parámetros</a>

                        <a class="collapse-item" href="Consultarol.php">Rol</a>
                        <a class="collapse-item" href="Consultaacciones.php">Acciones</a>  
                        <a class="collapse-item" href="Consultapantallas.php">Pantallas</a> 
                        <a class="collapse-item" href="Consultapantallaacciones.php">Pantalla Acciones</a>  
                        <a class="collapse-item" href="Consultarolespantallasacciones.php">Roles Pantalla Acciones</a>    
                       
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
                        <a class="collapse-item" href="../Seguridad/usuario.php">Usuario</a>
                        <a class="collapse-item" href="../Seguridad/Consultausuarios.php">Consulta de Usuarios</a>
                    </div>
                </div>
            </li>
        </ul>
        <!--Termina Lista -->
        <div id="content" style="width:150%;">
                <nav class="navbar navbar-expand topbar mb-4 text-light shadow" style="background-color:#060724;text-color:white;">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h2 style="font-family:Luminari;text-color:white;"><i class="fa-solid fa-tents"></i> Hangar</h2>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <i class="bi bi-box-arrow-left" style="color:white;font-size:32px;"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="perfil.php">

                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color:#060724;">
                            <h6 class="m-0 font-weight-bold" style="color:#ffff;"><i class="fa-solid fa-tents"></i> Lista de hangar</h6>
                            <div style="margin-left:870px;margin-top:-1.5%;">
                                   <a class="btn btn-success" href="../DatosMaestros/hangares.php" type="post" style="color:white;"> Agregar registro <i class="fa-solid fa-plus"></i></a>
                              </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                        $objetoTabla = new elementosMenu();
                                        echo $objetoTabla->mostarTablaHangar();
                                    ?>
                                </table>
                               <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a class="btn btn-primary" href="../Procesos/Reportes/Reporte.php" role="button">Generar Reporte</a> 
                                </div>-->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
</div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aerolinea Maya 2022</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Desea Salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" Si asi lo desea.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../index.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../style/Dashboard/jquery/jquery.min.js"></script>
    <script src="../style/Dashboard/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../style/Dashboard/jquery-easing/jquery.easing.min.js"></script>
    <script src="../style/js/Dashboard-2.min.js"></script>
    <script src="../style/Dashboard/chart.js/Chart.min.js"></script>
    <script src="../style/js/demo/chart-area-demo.js"></script>
    <script src="../style/js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>