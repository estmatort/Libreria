<?php
include_once '../BD_Conexion.php';

if (isset($_GET['IDLIBRO'])) {
    $IDLIBRO = (int) $_GET['IDLIBRO'];

    $buscar_id = $con->prepare('SELECT * FROM tbllibro WHERE IDLIBRO=:IDLIBRO LIMIT 1');
    $buscar_id->execute(array(
        ':IDLIBRO' => $IDLIBRO
    ));
    $resultado = $buscar_id->fetch();
} else {
    header('Location: ../../Libro.php');
}


if (isset($_POST['guardar'])) {
    $ISBNLIBRO = $_POST['ISBNLIBRO'];
    $NOMLIBRO = $_POST['NOMLIBRO'];
    $ANIOLIBRO = $_POST['ANIOLIBRO'];
    $PRECIOLIBRO = $_POST['PRECIOLIBRO'];
    $IDUSULIBRO = $_POST['IDUSULIBRO'];
    $ESTADOLIBRO = $_POST['ESTADOLIBRO'];
    $IDLIBRO = (int) $_GET['IDLIBRO'];

    if (!empty($ISBNLIBRO) && !empty($NOMLIBRO) && !empty($ANIOLIBRO) && !empty($PRECIOLIBRO) && !empty($IDUSULIBRO)&& !empty($ESTADOLIBRO)) {
            $consulta_update = $con->prepare(' UPDATE tbllibro SET  
					ISBNLIBRO=:ISBNLIBRO,
					NOMLIBRO=:NOMLIBRO,
					ANIOLIBRO=:ANIOLIBRO,
					PRECIOLIBRO=:PRECIOLIBRO,
					IDUSULIBRO=:IDUSULIBRO,
                                        ESTADOLIBRO=:ESTADOLIBRO
					WHERE IDLIBRO=:IDLIBRO;'
            );
            $consulta_update->execute(array(
                ':ISBNLIBRO' => $ISBNLIBRO,
                ':NOMLIBRO' => $NOMLIBRO,
                ':ANIOLIBRO' => $ANIOLIBRO,
                ':PRECIOLIBRO' => $PRECIOLIBRO,
                ':IDUSULIBRO' => $IDUSULIBRO,
                ':ESTADOLIBRO'=>$ESTADOLIBRO,
                ':IDLIBRO' => $IDLIBRO
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
        <title>Editar Cliente</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <div class="contenedor">
            <h2>CRUD EN PHP CON MYSQL</h2>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="ISBNLIBRO" value="<?php if ($resultado) echo $resultado['ISBNLIBRO']; ?>" class="input__text">
                    <input type="text" name="NOMLIBRO" value="<?php if ($resultado) echo $resultado['NOMLIBRO']; ?>" class="input__text">
                </div>
                <div class="form-group">
                    <input type="text" name="ANIOLIBRO" value="<?php if ($resultado) echo $resultado['ANIOLIBRO']; ?>" class="input__text">
                    <input type="text" name="PRECIOLIBRO" value="<?php if ($resultado) echo $resultado['PRECIOLIBRO']; ?>" class="input__text">
                </div>
                <div class="form-group">
                    <input type="text" name="IDUSULIBRO" value="<?php if ($resultado) echo $resultado['IDUSULIBRO']; ?>" class="input__text">
                    <input type="text" name="ESTADOLIBRO" value="<?php if ($resultado) echo $resultado['ESTADOLIBRO']; ?>" class="input__text">
                </div>
                <div class="btn__group">
                    <a href="../../Libro.php" class="btn btn__danger">Cancelar</a>
                    <input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
                </div>
            </form>
        </div>
    </body>
</html>