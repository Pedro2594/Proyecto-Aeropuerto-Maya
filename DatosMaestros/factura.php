<?php
    include ("../conexion.php");
    $query=mysqli_query($conn, "SELECT Id_Pasajero, Nombre FROM pasajero");
    $query2=mysqli_query($conn, "SELECT Id_Detalle, Descripcion, Total FROM detallefactura WHERE Estado=1");
    $query3=mysqli_query($conn, "SELECT Id_Moneda, Nombre, ConversionADolar FROM moneda");
    $query4=mysqli_query($conn, "SELECT Id_Parametro, Cai, Rango_Ini, Rango_Fin, Consecutivo  FROM parametro WHERE Estado=1");
    // $buscar="SELECT `IDProveedor`, `RTN` FROM proveedores;";
    // $resultado=mysqli_query($conn, $buscar);
    
    if(isset($_POST['estado'])) {
        $estado=$_POST['estado'];
        echo $estado;
    }
    if(isset($_POST['estado2'])) {
        $estado2=$_POST['estado2'];
        echo $estado2;
    }
    if(isset($_POST['estado3'])) {
        $estado3=$_POST['estado3'];
        echo $estado3;
    }

if(isset($_POST['estado4'])) {
    $estado4=$_POST['estado34'];
    echo $estado4;
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
    if($nombre_tabla[$i]=='Factura'){
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
    <title>Factura</title>

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
        <div id="content">
                <nav class="navbar navbar-expand topbar mb-4 text-light shadow" style="background-color:#060724;text-color:white;">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h2 style="font-family:Luminari;text-color:white;"><i class="fa-solid fa-file-invoice-dollar"></i> Factura</h2>
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
                            <form class="row g-3 needs-validation" action="../Procesos/Guardar/facturaAdd.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                    <label for="boleto">Parametros SAR</label>
                                    <select class="form-select" name="estado4" id="estado4" onchange="setdatos();" required>
                                    <option option value="opcion">--- Escoja una opcion ---</option>
                                    <?php 
                                        while($datos = mysqli_fetch_array($query4))
                                        {
                                    ?>
                                            <option value="<?php echo $datos['Id_Parametro']?>" data-voo="<?php echo $datos['Cai']?>" data-foo="<?php echo $datos['Rango_Ini']?>" data-koo="<?php echo $datos['Rango_Fin']?>" data-too="<?php echo $datos['Consecutivo']?>"><?php echo $datos['Cai']?></option>
                                    <?php
                                        }
                                    ?> 
                                    </select>
                                </div>
                                <script>

function setdatos(){
    var sel = document.getElementById('estado4');
    var pref= document.getElementById('monto').value;
    var cadenainicio = document.getElementById('foo');
    sel.onchange = function() {
                                                                            
    var selected = sel.options[sel.selectedIndex];
                                     
    var cadenainicio = selected.getAttribute('data-foo');
                                            
    var arrayDeCadenas = cadenainicio.split('-');
        
    var conse = selected.getAttribute('data-too');
    
    var cadena = Number(conse)+1;
    var cadena3 = zfill(cadena,8);

    var separ= "-";
    var stringfin=arrayDeCadenas[0]+separ+arrayDeCadenas[1]+separ+arrayDeCadenas[2]+separ+cadena3; 
    $("#codigo").prop('value',stringfin);
    $("#cod").prop('value',stringfin);

    var cai = selected.getAttribute('data-voo');

    $("#cai").prop('value',cai);
    $("#cai2").prop('value',cai);

    var fin = selected.getAttribute('data-koo');



    };

                                        
            
   sel.onchange();
   return sel.onchange();
}
 
 function zfill(number, width) {
var numberOutput = Math.abs(number); /* Valor absoluto del número */
var length = number.toString().length; /* Largo del número */ 
var zero = "0"; /* String de cero */  

if (width <= length) {
if (number < 0) {
return ("-" + numberOutput.toString()); 
} else {
return numberOutput.toString(); 
}
} else {
if (number < 0) {
return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
} else {
return ((zero.repeat(width - length)) + numberOutput.toString()); 
}
}
}
</script>
                            <div class="mb-3">
                                  <input class="form-control" name="codigo"  id="codigo" readonly type="text" placeholder="Código" onkeypress="return event.charCode>=48 && event.charCode<=57 || event.charCode>=65 && event.charCode<=90"  minlength="6" maxlength="6" required>
                            </div>
                           
                                <div class="mb-3">
                                  <input class="form-control" name="rtn" id="RTN" type="text" placeholder="RTN" onkeypress="return event.charCode>=48 && event.charCode<=57 || event.charCode>=65 && event.charCode<=90"  minlength="14" maxlength="14" required>
                            </div>
                            <div class="mb-3">
                                  <input class="form-control" name="CAI" id="cai" readonly type="text" placeholder="CAI" onkeypress="return event.charCode>=48 && event.charCode<=57 || event.charCode>=65 && event.charCode<=90"  minlength="32" maxlength="32" required>
                            </div>
                            <div class="mb-3">
                                    <label for="boleto">Detalle Factura</label>
                                    <select class="form-select" name="estado2" id="estado2" onchange="changeFunc()" required>
                                    <option option value="opcion">--- Escoja una opcion ---</option>
                                    <?php 
                                        while($datos = mysqli_fetch_array($query2))
                                        {
                                    ?>
                                            <option value="<?php echo $datos['Id_Detalle']?>" data-voo="<?php echo $datos['Total']?>"><?php echo $datos['Descripcion']?></option>
                                    <?php
                                        }
                                    ?> 
                                    </select>
                                </div>
                               
                                <label for="rol">Fecha de Emisión</label>
                                  <input class="form-control" name="fecha" id="fecha" type="text" onclick="setfecha();" placeholder="Fecha de vuelo" onkeypress="return event.charCode>=0128" maxlength="20" required>
                                </div>
                                <script>
                                   const input = document.getElementById("RTN");
                                   input.addEventListener("input",function(event){
                                    if(isNaN(event.target.value)){
                                      event.target.value = "";
                                   }
                                   });
                             </script>
                                <script>
                                    function setfecha(){
                                        var today = new Date();
                                        var now = today.toLocaleString();
                                        document.getElementById('fecha').value=now;
                                    }
                                </script>
                                <div class="mb-3">
                                    <label for="boleto">Moneda</label>
                                    <select class="form-select" name="estado3" id="estado3" onchange="changeFunc2()" required>
                                    <?php 
                                        while($datos = mysqli_fetch_array($query3))
                                        {
                                    ?>
                                            <option value="<?php echo $datos['Id_Moneda']?>" data-foo="<?php echo $datos['ConversionADolar']?>"><?php echo $datos['Nombre']?></option>
                                    <?php
                                        }
                                    ?> 
                                    </select>
                                </div>
                                <script>
                                    function changeFunc() {
                                        var sel = document.getElementById('estado2');
                                        var pref= document.getElementById('monto').value;
                                        var precio = document.getElementById('voo');
                                        sel.onchange = function() {
                                           
                                           
                                            var selected = sel.options[sel.selectedIndex];
                                            
                                            document.getElementById('monto').value = selected.getAttribute('data-voo');
                                            document.getElementById('mon').value = selected.getAttribute('data-voo');
                                            pref= document.getElementById('monto').value;  
                                            return pref; 
                                        };

                                        
            
                                        sel.onchange();
                                        return sel.onchange();
                                        
                                    }
                                    function changeFunc2() {
                                       
                                        
                                        var sel2 = document.getElementById('estado3');
                                        
                                        var conver = document.getElementById('foo');
                                        sel2.onchange = function() {
                                            precioz=changeFunc();
                                            var preciox=precioz;
                                            var selected = sel2.options[sel2.selectedIndex];
                                            
                                            var multm = selected.getAttribute('data-foo');
                                            
                                            var fin = preciox*multm;
                                            document.getElementById('monto').value = fin;
                                            document.getElementById('montof2').value = fin;
                                        };
                                        sel2.onchange();
                                        
                                    }
                                </script>


                                <div class="mb-3">
                                  <input class="form-control" name="monto" id="monto" type="text" placeholder="Valor a pagar" required onkeypress="return event.charCode===0128">
                            </div>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            
                                <div class="mb-3">
                                <label for="documentos">Método de Pago</label>
                                <select class= "form-select" name="metodo" id="metodo"  onchange="carg(this);" required>
                                <option option value="opcion">--- Escoja una opción ---</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta">Tarjeta</option>
                                <option value="Mixto">Mixto</option>
                                </select> 
                                </div>
                                <script>
                                $("#efectivo").prop('disabled', true);
                                $("#tarjeta").prop('disabled', true);
                                $( "#metodo").change(function() {
                                    var efe = document.getElementById('monto').value;
                                    var mon = efe -10;
                                    var prmon = Number(efe)+ Number(100);
                                    var efemon= efe;
                                var selector = $("#metodo  option:selected").val();
                                switch(selector){
                                    case "Efectivo":
                                    $("#efectivo").prop('disabled', false);
                                    $("#tarjeta").prop('disabled', true);
                                    $("#tarjeta").prop('value', 0);
                                    $("#efectivo").prop('min', efe);
                                    $("#efectivo").prop('max', prmon);
                                    break;
                                    case "Tarjeta":
                                        $("#efectivo").prop('value', 0);
                                        $("#efectivo").prop('disabled', true);
                                    $("#tarjeta").prop('disabled', false);
                                    break;
                                    break;
                                    case "Mixto":
                                        $("#efectivo").prop('disabled', false);
                                        $("#efectivo").prop('max', mon);
                                    $("#tarjeta").prop('disabled', false);
                                    break;
                                }
                                });
                                </script>
                                <div class="mb-3">
                                  <input class="form-control" name="efectivo" id="efectivo"  type="number" placeholder="Efectivo" disabled="true" onkeypress="return event.charCode>=48 && event.charCode<=57 || event.charCode===46" minlength="1" maxlength="5" required>
                            </div>
                            <div class="mb-3">
                                  <input class="form-control" name="tarjeta" id="tarjeta" type="text" placeholder="Numero de Tarjeta" disabled="true" onkeypress="return event.charCode>=48 && event.charCode<=57" minlength="13" maxlength="18" required>
                            </div>
                            <div class="col-md-12  mt-5 text-center">
                                   <button name="btnnombre" type="submit" style="background-color:#060724;color:white;"><i class="bi bi-save" style="text-color:white;"></i> Guardar</button>
                              </div>
                              <div class="mb-3">
                              <input name="cod" id="cod" type=hidden>  
                            </div>
                            <div class="mb-3">
                              <input name="cai2" id="cai2" type=hidden>  
                            </div>

                            <div class="mb-3">
                              <input name="montof2" id="montof2" type=hidden>  
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