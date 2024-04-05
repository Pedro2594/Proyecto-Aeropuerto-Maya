<?php


    class elementosMenu
    {
        public function mostarTablaUsu()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT r.Id_Rol, r.Nombre, u.idUser, u.Usuario, u.Pass, u.Estado FROM usuario u left join rol r on r.Id_Rol = u.Id_Rol")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-striped table-hover'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id_Usuario</th>
                            <th scope='col'>Nombre Usuario</th>
                            <th scope='col'>Contraseña Encriptada</th>
                            <th scope='col'>Rol</th>
                            <th scope='col'>Estado</th>
                        </tr>
                    </thead>
                <tbody class='text-center'>
            ";

            while ($data = mysqli_fetch_assoc($query))
            {
                echo 
                "
                    <tr>

                        <form action='formEditUsuario.php?id=$data[idUser]' method='POST' name='form2'>
                            <th scope='row'>$data[idUser]</th>
                            <td>$data[Usuario]</td>
                            <td>$data[Pass]</td>
                            <td value='$data[Id_Rol]'>$data[Nombre]</td> 
                            <td>$data[Estado]</td>

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
                <th scope='col'><a class='btn btn-danger' href='../Procesos/Reportes/usuariopdf.php'><i class='fa-solid fa-file-pdf'></i> Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-success' href='../Procesos/Reportes/usuarioxlsx.php'><i class='fa-regular fa-file-excel'></i> Generar EXCEL
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>