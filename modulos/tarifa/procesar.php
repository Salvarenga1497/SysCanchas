<?php

require_once "../../clases/Tarifa.php";

$horaInicio = trim($_POST['timeHoraInicio']);
$horaFin = trim($_POST['timeHoraFin']);
$tipo = $_POST['cboTipo'];
$monto = trim($_POST['numMonto']);
$cancha = $_POST['cboCanchas'];

if ($tipo == "NULL") {
	header("location: nuevo.php?error=tipo");
	exit;
}

if ($cancha == "NULL") {
	header("location: nuevo.php?error=cancha");
	exit;
}

if ($horaInicio == "") {
	header("location: nuevo.php?error=horaInicio");
	exit;
}

if ($horaFin == "") {
	header("location: nuevo.php?error=horaFin");
	exit;
}

if ($horaInicio == "00:00:00") {
	header("location: nuevo.php?error=horaInicio");
	exit;
}

if ($horaFin == "" and "00:00:00") {
	header("location: nuevo.php?error=horaFin");
	exit;
}

if (strlen($monto) < 3) {
	header("location: nuevo.php?error=monto");
	exit;
}
$tarifa = new Tarifa();

$tarifa->setHoraInicio($horaInicio);
$tarifa->setHoraFin($horaFin);
$tarifa->setRelaTipoTarifa($tipo);
$tarifa->setMonto($monto);
$tarifa->setRelaCanchas($cancha);

$tarifa->guardar();

header("location: listado.php");


?>