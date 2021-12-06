<?php

require_once "../../clases/Localidad.php";

$idUsuario = $_POST["txtIdUsuario"];

$descripcion = trim($_POST['txtLocalidad']);
$provincia = $_POST['cboProvincia'];

if (strlen($descripcion) < 3) {
	header("location: listado.php?error=descripcion&id_usuario=".$idUsuario);
	exit;
}

if ($provincia == "NULL") {
	header("location: listado.php?error=provincia&id_usuario=".$idUsuario);
	exit;
}

$localidad = new Localidad();

$localidad->setDescripcion($descripcion);
$localidad->setRelaProvincia($provincia);


$localidad->guardar();

header("location: listado.php?id_usuario=".$idUsuario);


?>