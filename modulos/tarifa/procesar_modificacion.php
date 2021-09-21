<?php

require_once "../../clases/Tarifa.php";

$id_tarifa = $_POST["txtIdTarifa"];
$horaInicio = trim($_POST['timeHoraInicio']);
$horaFin = trim($_POST['timeHoraFin']);
$tipo = $_POST['cboTipo'];
$monto = trim($_POST['numMonto']);
$cancha = $_POST['cboCanchas'];

if ($tipo == "NULL") {
	header("location: modificar.php?error=tipo&id_tarifa=" . $id_tarifa);
	exit;
}

if ($cancha == "NULL") {
	header("location: modificar.php?error=cancha&id_tarifa=" . $id_tarifa);
	exit;
}

if ($horaInicio == "") {
	header("location: modificar.php?error=horaInicio&id_tarifa=" . $id_tarifa);
	exit;
}

if ($horaInicio == "00:00:00") {
	header("location: modificar.php?error=horaInicio&id_tarifa=" . $id_tarifa);
	exit;
}

if ($horaFin == "") {
	header("location: modificar.php?error=horaFin&id_tarifa=" . $id_tarifa);
	exit;
}

if ($horaFin == "00:00:00") {
	header("location: modificar.php?error=horaFin&id_tarifa=" . $id_tarifa);
	exit;
}

if (strlen($monto) < 3) {
	header("location: modificar.php?error=monto&id_tarifa=" . $id_tarifa);
	exit;
}

$tarifa = Tarifa::obtenerPorId($id_tarifa);

$tarifa->setHoraInicio($horaInicio);
$tarifa->setHoraFin($horaFin);
$tarifa->setRelaTipoTarifa($tipo);
$tarifa->setMonto($monto);
$tarifa->setRelaCanchas($cancha);


$tarifa->actualizar();

header("location: listado.php");



?>