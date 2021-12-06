<?php

require_once "../../clases/Agenda.php";


$idUsuario = $_POST['txtIdUsuario'];


$fechaInicio = trim($_POST['dateFechaInicio']);
$fechaFin = trim($_POST['dateFechaFin']);
$horaInicio = trim($_POST['timeHoraInicio']);
$horaFin = trim($_POST['timeHoraFin']);
$duracion = trim($_POST['timeDuracion']);
$idCancha = $_POST['cboCanchas'];

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

header("location: ../dias/nuevo.php?id_agenda=" . $idAgenda . "&id_usuario=" . $idUsuario);

?>