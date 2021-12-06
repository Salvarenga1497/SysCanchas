<?php

require_once "../../clases/Agenda.php";
$idUsuario = $_POST['txtIdUsuario'];
$fechaInicio = trim($_POST['dateFechaInicio']);
$fechaFin = trim($_POST['dateFechaFin']);
$horaInicio = trim($_POST['timeHoraInicio']);
$horaFin = trim($_POST['timeHoraFin']);
$duracion = trim($_POST['timeDuracion']);
$idCancha = $_POST['cboCanchas'];


if ($fechaInicio == "") {
	header("location: nuevo.php?error=fechaInicio&id_usuario=" . $idUsuario);
	exit;
}

if ($fechaFin == "") {
	header("location: nuevo.php?error=fechaFin&id_usuario=" . $idUsuario);
	exit;
}

if ($horaInicio == "") {
	header("location: nuevo.php?error=horaInicio&id_usuario=" . $idUsuario);
	exit;
}

if ($horaFin == "") {
	header("location: nuevo.php?error=horaFin&id_usuario=" . $idUsuario);
	exit;
}

if ($duracion == "") {
	header("location: nuevo.php?error=duracion&id_usuario=" . $idUsuario);
	exit;
}


$agenda = new Agenda();

$agenda->setFechaInicio($fechaInicio);
$agenda->setFechaFin($fechaFin);
$agenda->setHoraInicio($horaInicio);
$agenda->setHoraFin($horaFin);
$agenda->setDuracion($duracion);
$agenda->setRelaCancha($idCancha);

$agenda->guardar();

$agendas= Agenda::obtenerUltimoId();
$idAgenda = $agendas->getIdAgenda();

header("location: ../dia/nuevo.php?id_agenda=" . $idAgenda . "&id_usuario=" . $idUsuario);


?>