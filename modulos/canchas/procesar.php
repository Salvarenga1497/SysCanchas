<?php

require_once "../../clases/Cancha.php";
require_once "../../clases/Usuario.php";

$idUsuario = $_POST['txtIdUsuario'];
$nombre = trim($_POST['txtNombre']);
$iduser = $_POST['cboUsuario'];


if (strlen($nombre) < 3) {
	header("location: nuevo.php?error=nombre&id_usuario=" . $idUsuario);
	exit;
}

if ($iduser == "NULL") {
	header("location: nuevo.php?error=iduser&id_usuario=" . $idUsuario);
	exit;
}


$usuario = Usuario::obtenerPorid($iduser);

$cancha = new Cancha();

$cancha->setNombre($nombre);
$cancha->setRelaEntidades($usuario->getRelaEntidades());
$cancha->guardar();

header("location: listado.php?id_usuario=" . $idUsuario);


?>