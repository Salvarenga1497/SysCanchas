<?php

require_once "../../clases/Cancha.php";


$id_cancha = $_POST["txtIdCancha"];
$idUsuario = $_POST["txtIdUsuario"];
$nombre = trim($_POST['txtNombre']);
$usuario = $_POST['cboUsuario'];

if (strlen($nombre) < 3) {
	header("location: modificar.php?error=nombre&id_cancha=" . $id_cancha . "&id_usuario=" . $idUsuario);
	exit;
}

if ($usuario == "NULL") {
	header("location: modificar.php?error=iduser&id_cancha=" . $id_cancha . "&id_usuario=" . $idUsuario);
	exit;
}

$usuario = Usuario::obtenerPorid($usuario);

$cancha = Cancha::obtenerPorId($id_cancha);

$cancha->setRelaEntidades($usuario->getRelaEntidades());
$cancha->setNombre($nombre);
$cancha->setEstado($estado);

$cancha->actualizar();

header("location: listado.php?id_usuario=" . $idUsuario);



?>