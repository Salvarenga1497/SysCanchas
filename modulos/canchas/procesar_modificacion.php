<?php

require_once "../../clases/Canchas.php";


$id_cancha = $_POST["txtIdCancha"];
$nombre = trim($_POST['txtNombre']);
$usuario = $_POST['cboUsuario'];

if (strlen($nombre) < 3) {
	header("location: modificar.php?error=nombre&id_cancha=" . $id_cancha);
	exit;
}

if ($usuario == "NULL") {
	header("location: modificar.php?error=iduser&id_cancha=" . $id_cancha);
	exit;
}

$usuario = Usuario::obtenerPorid($usuario);

$cancha = Cancha::obtenerPorId($id_cancha);

$cancha->setRelaEntidades($usuario->getRelaEntidades());
$cancha->setNombre($nombre);
$cancha->setEstado($estado);

$cancha->actualizar();

header("location: listado.php");



?>