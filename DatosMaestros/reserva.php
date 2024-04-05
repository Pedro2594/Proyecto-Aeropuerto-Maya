<?php
    include ("../conexion.php");
    $query=mysqli_query($conn, "SELECT Id_Pasajero, Nombre FROM pasajero");

    // $buscar="SELECT `IDProveedor`, `RTN` FROM proveedores;";
    // $resultado=mysqli_query($conn, $buscar);
    
    if(isset($_POST['estado'])) {
        $estado=$_POST['estado'];
        echo $estado;
    }
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header('location: ../index.php');
    }
    //require_once '../Seguridad/Validate_Roles.php';
    //require_once '../Seguridad/Validate_Pantallas.php';
      //Traer el rol del usuario
   $user=$_SESSION['idUser'];

   $queryllamar_id_rol=mysqli_query($conn, "SELECT Id_Rol FROM usuario WHERE `idUser`=$user;");

   $id_rol = array();
  
    while($datos = mysqli_fetch_array($queryllamar_id_rol)) {
        array_push($id_rol, $datos['Id_Rol']);
    }

    $id_rol_seleccionado=$id_rol[0];


//Con el Rol traer las tablas a las que puede acceder dicho rol
    $queryllamar_id_tabla=mysqli_query($conn, "SELECT Id_Pantalla FROM rolespantallasacciones WHERE `Id_Rol`=$id_rol_seleccionado;");

    $llamar_id_tabla="SELECT Id_Pantalla FROM rolespantallasacciones WHERE `Id_Rol`=$id_rol_seleccionado";

    $id_pantalla = array();

    $resultado2 = $conn->query($llamar_id_tabla);

    $rows2 = $resultado2->num_rows;
	
    $ids = "";
    if($resultado2){
       while($row=$resultado2->fetch_array()){
       // Esto crea un string como 'id1','id2','id3',
           $ids .= "'".$row['Id_Pantalla'] . "', ";
       }
       // Esto quita el ultimo espacio y coma del string generado con lo cual
       // el string queda 'id1','id2','id3'
    
       $ids = substr($ids,0,-2);
    }
    $queryllamar_nombre_tabla=mysqli_query($conn, "SELECT Nombre FROM pantallas WHERE `Id_Pantalla`in (".$ids.")");

    $nombre_tabla = array();
  
    while($datos = mysqli_fetch_array($queryllamar_nombre_tabla)) {
        
        array_push($nombre_tabla, $datos['Nombre']);
    }
$i=0;
$j=0;

while($i<$rows2){
    if($nombre_tabla[$i]=='Reserva'){
        $j=1;
    }
    $i+=1;
}

if($j == 0){
    echo  "<script>
    alert('El usuario no tiene acceso a esta ventana.');
    window.location = '../principaladmin.php';
    </script>";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Reserva</title>

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
                        <a class="collapse-item" href="tripulacion.php">Tripulación</a>
                        <a class="collapse-item" href="personaltierra.php">Personal de tierra</a>
                        <a class="collapse-item" href="aeronave.php">Aeronave</a>
                        <a class="collapse-item" href="aeropuerto.php">Aeropuerto</a>
                        <a class="collapse-item" href="boleto.php">Boleto</a>
                        <a class="collapse-item" href="pais.php">Pais</a>
                        <a class="collapse-item" href="ciudad.php">Ciudad</a>
                        <a class="collapse-item" href="pasajero.php">Pasajero</a>
                        <a class="collapse-item" href="paseabordar.php">Pase de abordar</a>
                        <a class="collapse-item" href="vuelo.php">Vuelo</a>
                        <a class="collapse-item" href="factura.php">Factura</a>
                        <a class="collapse-item" href="hangares.php">Hangar</a>
                        <a class="collapse-item" href="reserva.php">Reserva</a>
                        <a class="collapse-item" href="clase.php">Clase</a>
                        <a class="collapse-item" href="checkin.php">Check-In</a>
                        <a class="collapse-item" href="equipaje.php">Equipaje</a>
                        <a class="collapse-item" href="detallefactura.php">Detalles</a>
                        <a class="collapse-item" href="parametros.php">Parámetros</a>
                        
                        <a class="collapse-item" href="rol.php">Rol</a>
                        <a class="collapse-item" href="acciones.php">Acciones</a>
                        <a class="collapse-item" href="pantallas.php">Pantallas</a>
                        <a class="collapse-item" href="pantallaacciones.php">Pantalla Acciones</a>
                        <a class="collapse-item" href="rolespantallasacciones.php">Roles Pantallas Acciones</a>
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
                        
                    
                        <a class="collapse-item" href="../Consultas/Consultaaeropuertos.php">Aeropuertos</a>
                        <a class="collapse-item" href="../Consultas/Consultaseronaves.php">Aeronaves</a>
                        <a class="collapse-item" href="../Consultas/Consultapaises.php">Paises</a>
                        <a class="collapse-item" href="../Consultas/Consultaboletos.php">Boleto</a>
                        <a class="collapse-item" href="../Consultas/Consultaciudades.php">Ciudades</a>
                        <a class="collapse-item" href="../Consultas/Consultapasajeros.php">Pasajeros</a>
                        <a class="collapse-item" href="../Consultas/Consultapaseabordar.php">Pase de Abordar</a>
                        <a class="collapse-item" href="../Consultas/ConsultaPersonaltierra.php">Personal de Tierra</a>
                        <a class="collapse-item" href="../Consultas/Consultatripulacion.php">Tripulacion</a>
                        <a class="collapse-item" href="../Consultas/Consultavuelo.php">Vuelo</a>
                        <a class="collapse-item" href="../Consultas/Consultahangar.php">Hangar</a>
                        <a class="collapse-item" href="../Consultas/Consultacheckin.php">Check-In</a>
                        <a class="collapse-item" href="../Consultas/Consultareserva.php">Reserva</a>
                        <a class="collapse-item" href="../Consultas/Consultamoneda.php">Moneda</a>
                        <a class="collapse-item" href="../Consultas/Consultaclase.php">Clase</a>
                        <a class="collapse-item" href="../Consultas/Consultafactura.php">Factura</a>
                        <a class="collapse-item" href="../Consultas/Consultaequipaje.php">Equipaje</a>
                        <a class="collapse-item" href="../Consultas/Consultadetalles.php">Detalles</a>
                        <a class="collapse-item" href="../Consultas/Consultaparametro.php">Parámetros</a>
                        
                        <a class="collapse-item" href="../Consultas/Consultarol.php">Rol</a>
                        <a class="collapse-item" href="../Consultas/Consultaacciones.php">Acciones</a>
                        <a class="collapse-item" href="../Consultas/Consultapantallas.php">Pantallas</a>
                        <a class="collapse-item" href="../Consultas/Consultapantallaacciones.php">Pantalla Acciones</a>
                        <a class="collapse-item" href="../Consultas/Consultarolespantallasacciones.php">Roles Pantallas Acciones</a>
                        
                       
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
                    <h2 style="font-family:Luminari;text-color:white;"><i class="fa-solid fa-calendar-days"></i> Reservaciones</h2>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <i class="bi bi-box-arrow-left" style="color:white;font-size:32px;"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Contenido -->
                <div class="col-auto">
                    <!-- Tajeta y Contenido -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color:#060724;">
                        <h6 class="m-0 font-weight-bold" style="color:#ffff;"><i class="bi bi-textarea-t"></i> Insertar datos
                            </h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 needs-validation" action="../Procesos/Guardar/reservaAdd.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                            <label for="rol">Código de reservación</label>
                                  <input class="form-control" name="codigo" type="text" placeholder="Inserte el código" onkeypress="return event.charCode>=48 && event.charCode<=57 || event.charCode>=65 && event.charCode<=90"  minlength="6" maxlength="6" required>
                            </div>
                                <div class="mb-3">
                                    <label for="rol">Pasajero</label>
                                    <select class="form-select" name="estado" id="pasajero">
                                    <option option value="opcion">--- Escoja una opción ---</option>
                                    <?php 
                                        while($datos = mysqli_fetch_array($query))
                                        {
                                    ?>
                                            <option value="<?php echo $datos['Nombre']?>"><?php echo $datos['Nombre']?> </option>
                                    <?php
                                        }
                                    ?> 
                                    </select>
                                </div>
                                <div class="col-md-12  mt-5 text-center">
                                   <button name="btnnombre" type="submit" style="background-color:#060724;color:white;"><i class="bi bi-save" style="text-color:white;"></i> Guardar</button>
                              </div>
                              
                      </form>
                        </div>
                    </div>
                </div>
                <!-- Fin de Contenido -->
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