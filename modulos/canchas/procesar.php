<?php

require_once "../../clases/Canchas.php";
require_once "../../clases/Usuario.php";

$nombre = trim($_POST['txtNombre']);
$iduser = $_POST['cboUsuario'];


if (strlen($nombre) < 3) {
	header("location: nuevo.php?error=nombre");
	exit;
}

if ($iduser == "NULL") {
	header("location: nuevo.php?error=iduser");
	exit;
}


$usuario = Usuario::obtenerPorid($iduser);

$cancha = new Cancha();

$cancha->setNombre($nombre);
$cancha->setRelaEntidades($usuario->getRelaEntidades());
$cancha->guardar();

header("location: listado.php");


?>