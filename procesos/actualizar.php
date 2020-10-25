<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombre_a'],
		$_POST['anio_a'],
		$_POST['empresa_a'],
		$_POST['idjuego']
				);

	echo $obj->actualizar($datos);
	

 ?>