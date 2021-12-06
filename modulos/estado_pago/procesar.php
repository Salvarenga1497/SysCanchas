<?php

require_once "../../clases/EstadoPago.php";

$idUsuario = $_POST['txtIdUsuario'];
$descripcion = trim($_POST['txtNombre']);

if (strlen($descripcion) < 3) {
	header("location: nuevo.php?error=descripcion&id_usuario=" . $idUsuario);
	exit;
}

$estadoPago = new EstadoPago();

$estadoPago->setDescripcion($descripcion);

$estadoPago->guardar();

header("location: listado.php?id_usuario=".$idUsuario);


?>