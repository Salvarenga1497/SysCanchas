<?php

require_once "../../clases/Agenda.php";

$idUsuario = $_POST["txtIdUsuario"];
$id_agenda = $_POST["txtIdAgenda"];
$fechaInicio = trim($_POST['dateFechaInicio']);
$fechaFin = trim($_POST['dateFechaFin']);
$horaInicio = trim($_POST['timeHoraInicio']);
$horaFin = trim($_POST['timeHoraFin']);
$duracion = trim($_POST['timeDuracion']);
$cancha = $_POST['cboCanchas'];

if ($fechaInicio == "") {
	header("location: modificar.php?error=fechaInicio&id_agenda=" . $id_agenda."&id_usuario=".$idUsuario);
	exit;
}

if ($fechaFin == "") {
	header("location: modificar.php?error=fechaFin&id_agenda=" . $id_agenda."&id_usuario=".$idUsuario);
	exit;
}

if ($horaInicio == "") {
	header("location: modificar.php?error=horaInicio&id_agenda=" . $id_agenda."&id_usuario=".$idUsuario);
	exit;
}

if ($horaInicio == "00:00:00") {
	header("location: modificar.php?error=horaInicio&id_agenda=" . $id_agenda."&id_usuario=".$idUsuario);
	exit;
}

if ($horaFin == "") {
	header("location: modificar.php?error=horaFin&id_agenda=" . $id_agenda."&id_usuario=".$idUsuario);
	exit;
}

if ($horaFin == "00:00:00") {
	header("location: modificar.php?error=horaFin&id_agenda=" . $id_agenda."&id_usuario=".$idUsuario);
	exit;
}

if ($duracion == "") {
	header("location: modificar.php?error=duracion&id_agenda=" . $id_agenda."&id_usuario=".$idUsuario);
	exit;
}


$agenda = Agenda::obtenerPorId($id_agenda);

$agenda->setFechaInicio($fechaInicio);
$agenda->setFechaFin($fechaFin);
$agenda->setHoraInicio($horaInicio);
$agenda->setHoraFin($horaFin);
$agenda->setDuracion($duracion);
$agenda->setRelaCancha($cancha);



$agenda->actualizar();

header("location: listado.php?id_usuario=".$idUsuario);



?>