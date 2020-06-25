<?php

class CRUDEditorial {
    //funcioness 

    public function crearEditorial($nombre, $ubicacion, $estado) {
        $conexion = mysqli_connect('localhost', 'root', '', 'bd_libreria');

        $sql = "CALL InsertarEditorial('$nombre', '$ubicacion', '$estado')";

        mysqli_query($conexion, $sql);
    }

    public function eliminarEditorial($id) {

        $conexion = mysqli_connect('localhost', 'root', '', 'bd_libreria');


        $sql = "CALL EliminarFisicoEditorial('$id')";


        mysqli_query($conexion, $sql);
    }

    public function editarEditorial($id, $nombre, $ubicacion, $estado) {

        $conexion = mysqli_connect('localhost', 'root', '', 'bd_libreria');


        $sql = "CALL ActualizarEditorial('$id','$nombre', '$ubicacion', '$estado')";


        mysqli_query($conexion, $sql);
    }

}

?>