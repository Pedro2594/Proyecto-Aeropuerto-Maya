<?php


    class elementosMenu
    {
        public function mostarTablaVuelo()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM vuelo")
            or die ('error: '.mysqli_error($conn));

        
            echo 
            "
            <table>
            <thead>
            <th scope='col'><a class='btn btn-danger' href='../Procesos/Reportes/vuelopdf.php'><i class='fa-solid fa-file-pdf'></i> Generar PDF
            </a></th>
                        <th scope='col'>
                        <a class='btn btn-success' href='../Procesos/Reportes/vueloxlsx.php'><i class='fa-regular fa-file-excel'></i> Generar Excel
                         </a></th>
                        </thead>
                        </table>
                        <br>
                <table class='table table-striped table-hover table_id'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de vuelo</th>
                            <th scope='col'>Código</th>
                            <th scope='col'>Lugar de salida</th>
                            <th scope='col'>Lugar de llegada</th>
                            <th scope='col'>Hora de salida</th>
                            <th scope='col'>Hora de llegada</th>
                            <th scope='col'>Fecha</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Id de aeronave</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                <tbody class='text-center'>
            ";
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
             if($nombre_tabla[$i]=='ModificarVuelo'){
                 $j=1;
             }
             $i+=1;
         }
         
         if($j == 1){

            while ($data = mysqli_fetch_assoc($query))
            {
                echo 
                "
                    <tr>

                        <form action='formEditVuelo.php?id=$data[Id_Vuelo]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Vuelo]</th>
                            <td>$data[Codigo]</td>
                            <td>$data[Lugar_Salida]</td>
                            <td>$data[Lugar_LLegada]</td>
                            <td>$data[Hora_Salida]</td>
                            <td>$data[Hora_LLegada]</td>
                            <td>$data[Fecha]</td>
                            <td>$data[Precio]</td>
                            <td>$data[Id_Aeronave]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoVuelo/actualizarVuelo.php?id=$data[Id_Vuelo]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoVuelo/eliminarVuelo.php?id=$data[Id_Vuelo]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Codigo]\"); '><i class='fas fa-trash-alt'></i></a> </td>
                        </form>
                    </tr>

                ";
            }
        }else{
            while ($data = mysqli_fetch_assoc($query))
            {
                echo 
                "
                    <tr>

                        <form action='formEditNave.php?id=$data[Id_Vuelo]' method='POST' name='form2'>
                        <th scope='row'>$data[Id_Vuelo]</th>
                        <td>$data[Codigo]</td>
                        <td>$data[Lugar_Salida]</td>
                        <td>$data[Lugar_LLegada]</td>
                        <td>$data[Hora_Salida]</td>
                        <td>$data[Hora_LLegada]</td>
                        <td>$data[Fecha]</td>
                        <td>$data[Precio]</td>
                        <td>$data[Id_Aeronave]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' >
                            <i class='fas fa-lock'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a  name='btneliminar' class='item_tabla btn btn-danger' '><i class='fas fa-lock'></i></a> </td>
                        </form>
                    </tr>

                ";  
                
        }
        
        }
            echo
            "
                </tbody>
                </table>
              

            ";
        }
    }
    

?>