<?php
include_once '../BD_Conexion.php';

if (isset($_POST['guardar'])) {
    $ISBNLIBRO = $_POST['ISBNLIBRO'];
    $NOMLIBRO = $_POST['NOMLIBRO'];
    $ANIOLIBRO = $_POST['ANIOLIBRO'];
    $PRECIOLIBRO = $_POST['PRECIOLIBRO'];
    $IDUSULIBRO = $_POST['IDUSULIBRO'];
    $ESTADOLIBRO = $_POST['ESTADOLIBRO'];

    if (!empty($ISBNLIBRO) && !empty($NOMLIBRO) && !empty($ANIOLIBRO) && !empty($PRECIOLIBRO) && !empty($IDUSULIBRO)&& !empty($ESTADOLIBRO)) {
            $consulta_insert = $con->prepare('INSERT INTO tbllibro(ISBNLIBRO,NOMLIBRO,ANIOLIBRO,PRECIOLIBRO,IDUSULIBRO,ESTADOLIBRO) VALUES(:ISBNLIBRO,:NOMLIBRO,:ANIOLIBRO,:PRECIOLIBRO,:IDUSULIBRO,:ESTADOLIBRO)');
            $consulta_insert->execute(array(
                ':ISBNLIBRO' => $ISBNLIBRO,
                ':NOMLIBRO' => $NOMLIBRO,
                ':ANIOLIBRO' => $ANIOLIBRO,
                ':PRECIOLIBRO' => $PRECIOLIBRO,
                ':IDUSULIBRO' => $IDUSULIBRO,
                ':ESTADOLIBRO'=>$ESTADOLIBRO,
                
            ));
            header('Location: ../../Libro.php');
    } else {
        echo "<script> alert('Los campos estan vacios');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Cliente</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <div class="contenedor">
            <h2>CRUD EN PHP CON MYSQL</h2>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="ISBNLIBRO" placeholder="ISBNLIBRO" class="input__text">
                    <input type="text" name="NOMLIBRO" placeholder="NOMLIBRO" class="input__text">
                </div>
                <div class="form-group">
                    <input type="text" name="ANIOLIBRO" placeholder="ANIOLIBRO" class="input__text">
                    <input type="text" name="PRECIOLIBRO" placeholder="PRECIOLIBRO" class="input__text">
                </div>
                <div class="form-group">
                    <input type="text" name="IDUSULIBRO" placeholder="IDUSULIBRO" class="input__text">
                    <input type="text" name="ESTADOLIBRO" placeholder="ESTADOLIBRO" class="input__text">
                </div>
                <div class="btn__group">
                    <a href="../../Libro.php" class="btn btn__danger">Cancelar</a>
                    <input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
                </div>
            </form>
        </div>
    </body>
</html>
