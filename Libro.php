<?php
include_once './Modelo/BD_Conexion.php';

$sentencia_select = $con->prepare('SELECT *FROM tbllibro ORDER BY IDUSULIBRO DESC');
$sentencia_select->execute();
$resultado = $sentencia_select->fetchAll();

// metodo buscar
if (isset($_POST['btn_buscar'])) {
    $buscar_text = $_POST['buscar'];
    $select_buscar = $con->prepare('
			SELECT *FROM tbllibro WHERE NOMLIBRO LIKE :campo OR IDUSULIBRO LIKE :campo;'
    );

    $select_buscar->execute(array(
        ':campo' => "%" . $buscar_text . "%"
    ));

    $resultado = $select_buscar->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
        <link rel="stylesheet" href="css/estilo.css">    
    </head>
    <body>
        <div class="contenedor">
            <h2>CRUD EN PHP CON MYSQL</h2>
            <div class="barra__buscador">
                <form action="" class="formulario" method="post">
                    <input type="text" name="buscar" placeholder="buscar nombre o apellidos" 
                           value="<?php if (isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
                    <input type="submit" class="btn" name="btn_buscar" value="Buscar">
                    <a href="Modelo/Modelo_Libro/Inserta_Libro.php" class="btn btn__nuevo">Nuevo</a>
                </form>
            </div>
            <table>
                <tr class="head">
                    <td>Id</td>
                    <td>ISBN</td>
                    <td>Nombre</td>
                    <td>Año</td>
                    <td>Precio</td>
                    <td>Usuario</td>
                    <td>Estado</td>
                    <td colspan="2">Acción</td>
                </tr>
                <?php foreach ($resultado as $fila): ?>
                    <tr >
                        <td><?php echo $fila['IDLIBRO']; ?></td>
                        <td><?php echo $fila['ISBNLIBRO']; ?></td>
                        <td><?php echo $fila['NOMLIBRO']; ?></td>
                        <td><?php echo $fila['ANIOLIBRO']; ?></td>
                        <td><?php echo $fila['PRECIOLIBRO']; ?></td>
                        <td><?php echo $fila['IDUSULIBRO']; ?></td>
                        <td><?php echo $fila['ESTADOLIBRO']; ?></td>
                        <td><a href="Modelo/Modelo_Libro/Actualizar_Libro.php?IDLIBRO=<?php echo $fila['IDLIBRO']; ?>"  class="btn__update" >Editar</a></td>
                        <td><a href="Modelo/Modelo_Libro/Eliminar_Libro.php?IDLIBRO=<?php echo $fila['IDLIBRO']; ?>" class="btn__delete">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </body>
</html>