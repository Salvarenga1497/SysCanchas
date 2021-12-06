<?php

require_once "../../clases/Barrio.php";

$idUsuario = $_POST["txtIdUsuario"];

$descripcion = trim($_POST['txtBarrio']);
$localidad = $_POST['cboLocalidad'];

if (strlen($descripcion) < 3) {
	header("location: listado.php?error=descripcion&id_usuario=".$idUsuario);
	exit;
}

if ($localidad == "NULL") {
	header("location: listado.php?error=localidad&id_usuario=".$idUsuario);
	exit;
}

$barrio = new Barrio();

$barrio->setDescripcion($descripcion);
$barrio->setRelaLocalidad($localidad);


$barrio->guardar();

header("location: listado.php?id_usuario=".$idUsuario);


?>