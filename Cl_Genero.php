<?php
session_start();
include '../Modelo/BD_Conexion.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_libreria";
$conn = mysqli_connect($servername, $username, $password, $dbname);

//METODO ELIMINAR
if ($_GET) {
    $genero = [
        'id' => $_GET['cod']
    ];
    
    $query = "update tblgenero set ESTADOGENERO='Inactivo' where IDGENERO=:id";
    $result = mysqli_query($conn, $query);
    header("location:../Controlador_Genero/Genero.php");
    $_SESSION['msmEliminar'] = 'OK';
}

//METODO DE AGREGAR
if (isset($_POST['btnagregar']) != null) {
    $genero = [
        'descripcion' => $_POST['txtdescrip'],
        'estado' => "Activo"
    ];
    
    $query = "insert into tblgenero (DESCGENERO,ESTADOGENERO) values (:descripcion, :estado)";
    $result = mysqli_query($conn, $query);
    header("location:../Controlador_Genero/Genero.php");
    $_SESSION['msmAgregar'] = 'OK';
}

if (isset($_POST['btnmodificar']) != null) {
    $genero = [
        'id' => $_POST['txtid'],
        'descripcion' => $_POST['txtdescrip'],
        'estado' => $_POST['txtestado']
    ];
    
    $query = "update tblgenero set DESCGENERO=:descripcion, ESTADOGENERO=:estado where IDGENERO=:id";
    $result = mysqli_query($conn, $query);
    header("location:../Controlador_Genero/Genero.php");
    $_SESSION['msmModificar'] = 'OK';
}

?>