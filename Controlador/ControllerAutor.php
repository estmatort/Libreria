<?php

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

}
