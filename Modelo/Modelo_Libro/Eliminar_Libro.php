<?php 

	include_once '../BD_Conexion.php';
	if(isset($_GET['IDLIBRO'])){
		$IDLIBRO=(int) $_GET['IDLIBRO'];
		$delete=$con->prepare('DELETE FROM tbllibro WHERE IDLIBRO=:IDLIBRO');
		$delete->execute(array(
			':IDLIBRO'=>$IDLIBRO
		));
		header('Location: ../../Libro.php');
	}else{
		header('Location: ../../Libro.php');
	}
 ?>
