<?php
	include_once 'conexion.php';

	if(isset($_GET['idUsuario'])){
		$idUsuario=(int) $_GET['idUsuario'];

		$buscar_idUsuario=$con->prepare('SELECT * FROM usuario WHERE idUsuario=:idUsuario LIMIT 1');
		$buscar_idUsuario->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_idUsuario->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$descripcionGenero=$_POST['descripcionGenero'];
		$estadoGenero=$_POST['estadoGenero'];
		$Estado=$_POST['Estado'];
		$usuario=$_POST['usuario'];
		$idUsuario=(int) $_GET['idUsuario'];

		if(!empty($descripcionGenero) && !empty($estadoGenero) && !empty($Estado) && !empty($usuario)){
			if(!filter_var($usuario)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE usuario SET  
					descripcionGenero=:descripcionGenero,
					estadoGenero=:estadoGenero,
					Estado=:Estado,
					usuario=:usuario,
					WHERE idUsuario=:idUsuario;'
				);
				$consulta_update->execute(array(
					':descripcionGenero' =>$descripcionGenero,
					':estadoGenero' =>$estadoGenero,
					':Estado' =>$Estado,
					':usuario' =>$usuario,
					':idUsuario' =>$idUsuario
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
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>EDITAR</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="descripcionGenero" value="<?php if($resultado) echo $resultado['descripcionGenero']; ?>" class="input__text">
				<input type="text" name="estadoGenero" value="<?php if($resultado) echo $resultado['estadoGenero']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="Estado" value="<?php if($resultado) echo $resultado['Estado']; ?>" class="input__text">
				<input type="text" name="usuario" value="<?php if($resultado) echo $resultado['usuario']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>