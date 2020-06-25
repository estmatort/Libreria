<?php
include '../Template/template.php';

$query = "select * from tblgenero";
$result = mysqli_query($conn, $query);
?>

<body>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm">
            <center><h1> LISTA POR GENERO</h1></center>
        </div>
    </div>
</div>

<div class="container-fluid" style="position: relative; margin: auto; width: 1000px;">
    <div class="row">
        <div class="col-sm">
            <form action="filtrar.php" method="POST">
                <table style="position: relative; margin: auto; width: 970px;">                
                    <!--<td type="submit" class="btn btn-secondary btn-sm" role="button" aria-pressed="true">Search user
                        <input type="text" id="nombreFiltrar" name="nombreFiltrar" required>-->
                    <td align="right"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" role="button" aria-pressed="true">
                            Añadir Genero
                        </button>
                    </td>
                </table>
            </form><br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"> Codigo</th>
                        <th scope="col"> Descripción</th>
                        <th scope="col"> Estado</th>
                        <th scope="col"> Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $genero) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $genero['IDGENERO']; ?></th>
                            <td><?php echo $genero['DESCGENERO']; ?></td>
                            <td><?php
                                echo ($genero['ESTADOGENERO'] == 'Activo') ? "<span class='badge badge-success'>Activo</span>" :
                                        "<span class='badge badge-secondary'>Inactivo</span>";
                                ?></td>
                            <td><a href="Modificar_Genero.php?cod=<?php echo $genero['IDGENERO']; ?>"  align="center" 
                                   
                                   class="badge badge-warning"><i class="far fa-edit" title="Modify user"></i></a>
                                <a href="Cl_Genero.php?cod=<?php echo $genero['IDGENERO']; ?>" 
                                   onclick="return confirm('Desea ¡Eliminar! el Registro')" class="badge badge-danger">
                                    <i class="fas fa-trash-alt" title="User delete"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
                <?php if (@$_SESSION['msmEliminar'] == 'OK') { ?>
                <div align="center" class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registry!</strong> Successfully removed.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            $_SESSION['msmEliminar'] = '';
            ?>
        </div>
    </div>
</div>

<!-- Modal AGREGAR USUARIO-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Genero</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../Controlador_Genero/Cl_Genero.php" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Descripción</label>
                            <input name="txtdescrip" type="text" class="form-control" id="validationServer01" value="" required>
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit"  name="btnagregar">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<?php if (@$_SESSION['msmAgregar'] == 'OK') { ?>
    <div align="center" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registry!</strong> Saved successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
$_SESSION['msmAgregar'] = '';
?>

<?php if (@$_SESSION['msmModificar'] == 'OK') { ?>
    <div align="center" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registry!</strong> Modified successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
$_SESSION['msmModificar'] = '';
?>

<?php
include '../Template/footer.php';
?>