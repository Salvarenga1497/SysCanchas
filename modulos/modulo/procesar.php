<?php

require_once "../../clases/Modulo.php";

$idUsuario = $_POST['txtIdUsuario'];
$descripcion = trim($_POST['txtNombre']);
$directorio = trim($_POST['txtDirectorio']);

if (strlen($descripcion) < 3) {
	header("location: nuevo.php?error=nombre&id_usuario=".$idUsuario);
	exit;
}

if (strlen($directorio) < 3) {
	header("location: nuevo.php?error=directorio&id_usuario=".$idUsuario);
	exit;
}



$modulo = new Modulo();

$modulo->setDescipcion($descripcion);
$modulo->setDirectorio($directorio);


$modulo->guardar();

header("location: listado.php?id_usuario=".$idUsuario);


?>