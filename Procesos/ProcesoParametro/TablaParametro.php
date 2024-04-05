<?php

    class elementosMenu
    {
        public function mostarTablaParametro()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM parametro")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-striped table-hover'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id del parámetro</th>
                            <th scope='col'>CAI</th>
                            <th scope='col'>Fecha de vencimiento</th>
                            <th scope='col'>Fecha de emisión</th>
                            <th scope='col'>Rango inicial</th>
                            <th scope='col'>Rango final</th>
                            <th scope='col'>Consecutivo</th>
                            
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
             if($nombre_tabla[$i]=='ModificarParametro'){
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

                        <form action='formEditParametros.php?id=$data[Id_Parametro]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Parametro]</th>
                            <td>$data[Cai]</td>
                            <td>$data[Fecha_Ven]</td>
                            <td>$data[Fecha_Emi]</td>
                            <td>$data[Rango_Ini]</td>
                            <td>$data[Rango_Fin]</td>
                            <td>$data[Consecutivo]</td>
                            

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR
                            <a class='btn btn-info' href='../Procesos/ProcesoParametro/actualizarParametro.php?id=$data[Id_Parametro]' >
                            <i class='fas fa-edit'></i>
                            </a>-->

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoParametro/eliminarParametro.php?id=$data[Id_Parametro]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Cai]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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

                        <form action='formEditNave.php?id=$data[Id_Parametro]' method='POST' name='form2'>
                        <th scope='row'>$data[Id_Parametro]</th>
                        <td>$data[Cai]</td>
                        <td>$data[Fecha_Ven]</td>
                        <td>$data[Fecha_Emi]</td>
                        <td>$data[Rango_Ini]</td>
                        <td>$data[Rango_Fin]</td>
                        <td>$data[Consecutivo]</td>

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
                <table>
                <thead>
                <th scope='col'><a class='btn btn-danger' href='../Procesos/Reportes/parametropdf.php'><i class='fa-solid fa-file-pdf'></i> Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-success' href='../Procesos/Reportes/parametroxlsx.php'><i class='fa-regular fa-file-excel'></i> Generar XLSX
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>