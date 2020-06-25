<?php

<<<<<<< Upstream, based on origin/master
class ControllerAutor {

    //eliminar los autores
    public function eliminarAutor($id) {
        //nos conectamos :
        $conexion = mysqli_connect('localhost', 'root', '', 'bd_libreria');

        //llamamos al procedimiento almacenado
        $sql = "CALL EliminarLogicoAutor('$id')";

        //ejecutamos el query con la conexion
        mysqli_query($conexion, $sql);
    }

    public function crearAutor($nombre, $apedillo, $estado) {
        //nos conectamos :
        $conexion = mysqli_connect('localhost', 'root', '', 'bd_libreria');

        //llamamos al procedimiento almacenado
        $sql = "CALL InsertarAutor('$nombre', '$apedillo', '$estado')";

        //ejecutamos el query con la conexion
        mysqli_query($conexion, $sql);
    }

    public function editarAutor($id, $nombre, $apellido, $estado) {
        //nos conectamos :
        $conexion = mysqli_connect('localhost', 'root', '', 'bd_libreria');

        //llamamos al procedimiento almacenado
        $sql = "CALL ActualizarAutor('$id','$nombre','$apellido', '$estado')";

        //ejecutamos el query con la conexion
        mysqli_query($conexion, $sql);
    }

=======
require '../Modelo/BD_Conexion.php';

class ControllerAutor {

public void function(){
$conn = mssql_connect('servidor', 'usuario', 'contraseña');
mssql_select_db('base_datos', $conn);

$p_cadena = 'Probando';
$p_entero = 6;
$p_mensaje = '';
$p_salida = 0;

$stmt = mssql_init('usp_simple', $conn);

mssql_bind($stmt, '@cadena', $p_cadena, SQLVARCHAR, false, false, 10);
mssql_bind($stmt, '@entero', $p_entero, SQLINT4);
mssql_bind($stmt, '@mensaje', $p_mensaje, SQLVARCHAR, true, false, 50);
mssql_bind($stmt, 'RETVAL', $p_salida, SQLINT4);

mssql_execute($stmt);
mssql_free_statement($stmt);

echo 'Mensaje:: ', $p_mensaje, "\r\n", 'Salida:: ', $p_salida;

mssql_close($conn);
}
>>>>>>> fa33f11 Creacion del controlador del autor para el crud
}
