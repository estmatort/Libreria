<?php
 include 'Controlador/ControllerAutor.php';
 
 $autor = new ControllerAutor();
 
 //
 $id_e="";
 $nombre_e="";
 $apellido_e="";
 $estado_e="";
 
 if (isset($_POST['guardar'])) {
   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];
   $estado = $_POST['estado'];
   $id = $_POST['id_editar'];
   
   if ($id == "") {
       $autor->crearAutor($nombre, $apellido , $estado);
       echo "<div class='alert alert-primary' role='alert'>
                Guardado!
              </div>";
   }else{
       $autor->editarAutor($id, $nombre, $apellido, $estado);
        echo "<div class='alert alert-warning' role='alert'>
            Se Actualizo
</div>";
        
   }
   
   
}

if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    
    $autor->eliminarAutor($id);
    
    echo "<div class='alert alert-danger' role='alert'>
    Eliminado
</div>";
}

if (isset($_GET['editar'])) {
    $id_e = $_GET['id'];
    $nombre_e = $_GET['nombre'];
    $apellido_e = $_GET['apellido'];
    $estado_e = $_GET['estado'];
      
}
 
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-10">
            <form action="autor.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="id_editar" id="id_editar" value="<?php echo $id_e ?>"/>
                </div>
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre: </label>
                    <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $nombre_e ?>" />
                </div>
                <div class="form-group">
                    <label for="apellido" class="form-label">Apellido: </label>
                    <input class="form-control" type="text" name="apellido" id="apellido" value="<?php echo $apellido_e ?>" />
                </div>
                <div class="form-group">
                    <label for="estado" class="form-label">Estado: </label>
                    <input class="form-control" type="text" name="estado" id="nombre" value="<?php echo $estado_e ?>" />
                </div>
                <div>
                    <input type="submit" value="Guardar" name="guardar" id="guardar" class="btn btn-primary" />
                </div>

            </form>
        </div>
        <div class="col-10 text-center">
            



<!-- Mostrar datos del autor en una tabla -->
<?php 
//nos conectamos :
$conexion = mysqli_connect('localhost', 'root', '', 'bd_libreria');
$sql = "CALL ListarAutorActivo";

$result = mysqli_query($conexion, $sql);
?>

<table id="example" class="table table-sm table-inverse table-bordered">
    <tr style="font-weight: bold" >

            <td>Id</td>

            <td>Nombre</td>

            <td>Apellido</td>

            <td>Estado</td>

            <td style="text-align: center;">Editar</td>

            <td style="text-align: center;">Eliminar</td>

    </tr>
    
    
    
    
    
    
    
    
    
    
    
    
    

	<?php 



		while ($ver=mysqli_fetch_row($result)):

	 ?>

		<tr>

			<td><?php echo $ver[0]; ?></td>

			<td><?php echo $ver[1]; ?></td>

			<td><?php echo $ver[2]; ?></td>

			<td><?php echo $ver[3]; ?></td>

			<td style="text-align: center;">
                            <?php
                                $url="id=".$ver[0];
                                $url.="&nombre=".$ver[1];
                                $url.="&apellido=".$ver[2];
                                $url.="&estado=".$ver[3];
                                $url.="&editar=si";
                            ?>
                            <a class="btn btn-warning" href="http://localhost:88/Libreria/autor.php?<?php echo $url ?>">Editar</a>
			</td>

			<td style="text-align: center;">

				
                            <form method="post" action="autor.php">
                                <input type="hidden" name="id" value="<?php echo $ver[0]; ?>" />
                                <input type="submit" name="eliminar" id="eliminar" value="Eliminar" class="btn btn-danger" />
                            </form>

			</td>

		</tr>



		<?php 

			endwhile;

		 ?>

</table>
        </div>
    </div>
</div>

