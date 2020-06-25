<?php
include '../Template/template.php';

$cod = $_GET['cod'];
$query = "select * from tblgenero where IDGENERO=$cod";
$result = mysqli_query($conn, $query);
foreach ($result as $gender) {
    $descripcion = $gender['DESCGENERO'];
    $estado = $gender['ESTADOGENERO'];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <form action="../Controlador_Genero/Cl_Genero.php" method="POST" novalidate>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <input name="txtid" type="hidden" class="form-control" value="<?php echo $cod ?>" required>
                            <label for="validationServer01">Descripción</label>
                            <input name="txtdescrip" type="text" class="form-control" id="validationServer01" value="<?php echo $descripcion ?>" required>
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer04">Estado</label>
                            <select name="txtestado" class="custom-select" id="validationServer04" value="<?php echo $estado ?>" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit"  name="btnmodificar">Modify</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include '..//Template/footer.php';
?>