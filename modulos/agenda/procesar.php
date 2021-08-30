<?php

require_once "../../clases/Agenda.php";


$fechaInicio = $_POST['dateFechaInicio'];
$fechaFin = $_POST['dateFechaFin'];
$horaInicio = $_POST['timeHoraInicio'];
$horaFin = $_POST['timeHoraFin'];
$duracion = $_POST['timeDuracion'];


$agenda = new Agenda();

$agenda->setFechaInicio($fechaInicio);
$agenda->setFechaFin($fechaFin);
$agenda->setHoraInicio($horaInicio);
$agenda->setHoraFin($horaFin);
$agenda->setDuracion($duracion);


$agenda->guardar();

header("location: listado.php");


?>