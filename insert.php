<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$descripcionGenero=$_POST['descripcionGenero'];
		$estadoGenero=$_POST['estadoGenero'];
		$Estado=$_POST['Estado'];
		$usuario=$_POST['usuario'];

		if(!empty($descripcionGenero) && !empty($estadoGenero) && !empty($Estado) && !empty($usuario)){
			if(!filter_var($usuario)){
				echo "<script> alert('usuario no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO usuario(descripcionGenero,estadoGenero,Estado,usuario) VALUES(:descripcionGenero,:estadoGenero,:Estado,:usuario)');
				$consulta_insert->execute(array(
					':descripcionGenero' =>$descripcionGenero,
					':estadoGenero' =>$estadoGenero,
					':Estado' =>$Estado,
					':usuario' =>$usuario,
				));
				header('Location: index.php');
			}
		}else{
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
		<h2>AGREGAR USUARIO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="descrpcionGenero" placeholder="descrpcionGenero" class="input__text">
				<input type="text" name="estadoGenero" placeholder="estadoGenero" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="Estado" placeholder="Estado" class="input__text">
				<input type="text" name="usuario" placeholder="usuario" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>