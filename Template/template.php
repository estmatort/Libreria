<?php
//inicio de session
session_start();
//conexion
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_libreria";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$intentos = 0;
//capturar valor de la session
$nomusu = $_SESSION['usuario'];
$query = "SELECT * FROM tblusuario WHERE USUUSUARIO='$nomusu'";
$result = mysqli_query($conn, $query);
foreach ($result as $res) {
    $nombre = $res['NOMUSUARIO'];
    $perfil = $res['IDROL'];
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    </head>
    <body>
        <?php
        if ($perfil == "1") {
            ?>
            <nav class="navbar navbar-expand-lg  navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Inicio</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ventas</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Mantenimiento
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Editorial</a>
                                <a class="dropdown-item" href="#">Libros</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Vendedores</a>
                            </div>
                        </li>
                        <li class="nav-item">

                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Administrador</a>    
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit"><?php echo $nomusu; ?></button>
                    </form>
                </div>
            </nav>
            <?php
        } else {
            ?>
            <nav class="navbar navbar-expand-lg  navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Inicio</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ventas</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Mantenimiento
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Editorial</a>
                                <a class="dropdown-item" href="#">Libros</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">

                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Vendedor</a>    
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit"><?php echo $nombre; ?></button>
                    </form>
                </div>
            </nav>

        <?php } ?>

