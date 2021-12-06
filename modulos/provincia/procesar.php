<?php

require_once "../../clases/Provincia.php";

$idUsuario = $_POST["txtIdUsuario"];
$descripcion = trim($_POST['txtProvincia']);

if (strlen($descripcion) < 3) {
	header("location: listado.php?error=descripcion&id_usuario=".$idUsuario);
	exit;
}

$provincia = new Provincia();

$provincia->setDescripcion($descripcion);

$provincia->guardar();

header("location: listado.php?id_usuario=".$idUsuario);


?>