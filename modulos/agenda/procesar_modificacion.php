<?php

require_once "../../clases/Agenda.php";

$id_agenda = $_POST["txtIdAgenda"];
$fechaInicio = $_POST['dateFechaInicio'];
$fechaFin = $_POST['dateFechaFin'];
$horaInicio = $_POST['timeHoraInicio'];
$horaFin = $_POST['timeHoraFin'];
$duracion = $_POST['timeDuracion'];


$agenda = Agenda::obtenerPorId($id_agenda);

$agenda->setFechaInicio($fechaInicio);
$agenda->setFechaFin($fechaFin);
$agenda->setHoraInicio($horaInicio);
$agenda->setHoraFin($horaFin);
$agenda->setDuracion($duracion);



$agenda->actualizar();

header("location: listado.php");



?>