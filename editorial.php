<?php
 include 'Controlador/CRUDEditorial.php';
 
 $editorial = new CRUDEditorial();
 
 //variables  vacias
 $id_e="";
 $nombre_e="";
 $ubicacion_e="";
 $estado_e="";
 
 if (isset($_POST['guardar'])) {
   $nombre = $_POST['nombre'];
   $ubicacion = $_POST['ubicacion'];
   $estado = $_POST['estado'];
   $id =$_POST['id_editar'];
   if($id == ""){
       $editorial->crearEditorial($nombre, $ubicacion, $estado);
        echo "<script>alert('GUARDADO');</script>";
   }else{
       $editorial->editarEditorial($id,$nombre, $ubicacion , $estado);
        echo "<script>alert('ACTUALIZADO');</script>";
   }

   

   
}
If(isset($_POST['eliminar'])){
    $id =$_POST['id'];
    $editorial->eliminarEditorial($id);
     echo "<script>alert('ELIMINADO');</script>";
}
If(isset($_GET['editar'])){
    $id_e =$_GET['id'];
    $nombre_e =$_GET['nombre'];
    $ubicacion_e =$_GET['ubicacion'];
    $estado_e =$_GET['estado'];
    
   
}
 

 
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<div class = "container">
<div class="row">


<br/>
<br/>
<br/>

<form class ="table-bordered" action="editorial.php" method="POST">
     <div class =" form-group">
         
         <input type="hidden" name="id_editar" id="id_editar" value ="<?php echo $id_e;?>"/>
    </div>
      <div class =" form-group">
          <label for="nombre">NOMBRE:</label>
          <input type="text" class ="form-control" name="nombre" id="nombre" value ="<?php echo $nombre_e;?>"/>
    </div>
        <div>
          <label for="nombre">UBICACIÒN:</label>
          <input type="text" class ="form-control" name="ubicacion" id="ubicacion" value ="<?php echo $ubicacion_e;?>"/>
    </div>
        <div class =" form-group">
          <label for="nombre">ESTADO:</label>
          <input type="text" class ="form-control" name="estado" id="estado" value ="<?php echo $estado_e;?>"/>
    </div>
    
    <br/>
       <div>
          
          <input class="btn btn-success" type="submit" value="GUARDAR" name="guardar" id="estado"/>
    </div>
      
</form>

<?php
 $conexion = mysqli_connect('localhost','root','','bd_libreria');
     
        $sql = "CALL ListarEditorialActivo";
    
         $result= mysqli_query( $conexion, $sql );
  ?>

<table id="example" class="table table-sm table-inverse table-bordered">
    <tr style="font-weight: bold" >

            <td>Id</td>

            <td>Nombre</td>

            <td>Ubicacion</td>

            <td>Estado</td>

            <td style="text-align: center;">Eliminar</td>

            <td style="text-align: center;">Editar</td>

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
              
                <form method="post" action="editorial.php">
                    
                    <input type="hidden" name="id" value ="<?php echo $ver[0];?>"/>
                    <input class="btn btn-outline-danger"type="submit" name="eliminar" id="eliminar" value="ELIMINAR"/>
                </form>

            </td>

            <td style="text-align: center;">
                  <?php
                $url="id=".$ver[0];
                $url.="&nombre=".$ver[1];
                $url.="&ubicacion=".$ver[2];
                $url.="&estado=".$ver[3];
                $url.="&editar=si";
                
                ?>
                <a class="btn btn-outline-primary"href="http://localhost:88/PracticasWeb/Libreria/editorial.php?<?php echo $url ?>">Editar</a>


                

                </span>

            </td>

        </tr>

        <?php 

            endwhile;

         ?>

</table>
</div>
</div>