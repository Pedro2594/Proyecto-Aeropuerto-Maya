<?php


    class elementosMenu
    {
        public function mostarTabla()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM detallefactura")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-striped table-hover'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de detalle</th>
                            <th scope='col'>Id del boleto</th>
                            <th scope='col'>Cantidad</th>
                            <th scope='col'>Descripción</th>
                            <th scope='col'>Subtotal</th>
                            <th scope='col'>Descuentos</th>
                            <th scope='col'>Impuestos</th>
                            <th scope='col'>Total</th>
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
             if($nombre_tabla[$i]=='ModificarDetalle'){
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

                        <form action='formEdit.php?id=$data[Id_Detalle]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Detalle]</th>
                            <td>$data[Id_Boleto]</td>
                            <td>$data[Cantidad]</td>
                            <td>$data[Descripcion]</td>
                            <td>$data[Subtotal]</td>
                            <td>$data[Total_Descuento]</td>
                            <td>$data[Total_Impuesto]</td>
                            <td>$data[Total]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR
                            <a class='btn btn-info' href='../Procesos/ProcesoDetalle/actualizar.php?id=$data[Id_Detalle]' >
                            <i class='fas fa-edit'></i>
                            </a>-->

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoDetalle/eliminar.php?id=$data[Id_Detalle]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Descripcion]\"); '><i class='fas fa-trash-alt'></i></a> </td>
                        </form>
                    </tr>

                ";
            }
        }else{

        }
        while ($data = mysqli_fetch_assoc($query))
        {
            echo 
            "
                <tr>

                    <form action='formEditNave.php?id=$data[Id_Detalle]' method='POST' name='form2'>
                    <th scope='row'>$data[Id_Detalle]</th>
                    <td>$data[Id_Boleto]</td>
                    <td>$data[Cantidad]</td>
                    <td>$data[Descripcion]</td>
                    <td>$data[Subtotal]</td>
                    <td>$data[Total_Descuento]</td>
                    <td>$data[Total_Impuesto]</td>
                    <td>$data[Total]</td>

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







            echo
            "
                </tbody>
                </table>
                <table>
                <thead>
                <th scope='col'><a class='btn btn-danger' href='../Procesos/Reportes/detallepdf.php'><i class='fa-solid fa-file-pdf'></i> Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-success' href='../Procesos/Reportes/detallexlsx.php'><i class='fa-regular fa-file-excel'></i> Generar EXCEL
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>