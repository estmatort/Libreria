<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_libreria";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$intentos = 0;

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $intentos = $_POST['hidden'];

    if ($intentos < 3) {
        $query = "SELECT * FROM tblusuario WHERE usuusuario = '" . $user . "'AND passusuario = '" . $pass . "'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            if (mysqli_num_rows($result)) {
                while (mysqli_fetch_array($result, MYSQLI_BOTH)) {
                    echo "<script>alert('Bienvenido');location.href='inicio.php';</script>";
                }
            } else {
                $intentos ++;
                echo '<script type="text/javascript">alert("ACCESO DENEGADO. NUMERO DE INTENTOS "' . $intentos . '");</script>';
            }
        }
    }

    if ($intentos == 3) {
        echo '<script type="text/javascript">alert("NUMERO DE INTENTOS PERMITIDOS EXCEDIDOS");</script>';
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrarse</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
    <body>
        <div class="login-wrap">
            <div class="login-html" >
                <form method="POST" action="">
                    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar Sesion</label>

                    <div class="login-form" id="login">
                        <div class="">
                            <?php
                            echo "<input type='hidden' name='hidden' value='" . $intentos . "'>";
                            ?>
                            <div class="group">
                                <label for="user" class="label">Usuario</label>
                                <input id="user" name="user" <?php if ($intentos == 3) { ?> disabled="disabled" <?php } ?> type="text" class="input">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Contraseña</label>
                                <input id="pass" name="pass" <?php if ($intentos == 3) { ?> disabled="disabled" <?php } ?> type="password" class="input" data-type="password">
                            </div>
                            <div class="group">
                                <input id="check" type="checkbox" class="check" checked>
                                <label for="check"><span class="icon"></span> No cerrar Sesión</label>
                            </div>
                            <div class="group">
                                <input class="button button-block" type="submit" name="login" value="Ingresar" <?php if ($intentos == 3) { ?> disabled="disabled" <?php } ?>  placeholder="Login">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <a href="#forgot">Olvidaste la contraseña?</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
