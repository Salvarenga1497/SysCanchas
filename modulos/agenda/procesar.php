<?php

require_once "../../clases/Agenda.php";


$fechaInicio = trim($_POST['dateFechaInicio']);
$fechaFin = trim($_POST['dateFechaFin']);
$horaInicio = trim($_POST['timeHoraInicio']);
$horaFin = trim($_POST['timeHoraFin']);
$duracion = trim($_POST['timeDuracion']);

if ($fechaInicio == "") {
	header("location: nuevo.php?error=fechaInicio");
	exit;
}

if ($fechaFin == "") {
	header("location: nuevo.php?error=fechaFin");
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

if ($duracion == "") {
	header("location: nuevo.php?error=duracion");
	exit;
}


$agenda = new Agenda();

$agenda->setFechaInicio($fechaInicio);
$agenda->setFechaFin($fechaFin);
$agenda->setHoraInicio($horaInicio);
$agenda->setHoraFin($horaFin);
$agenda->setDuracion($duracion);


$agenda->guardar();

header("location: listado.php");


?>