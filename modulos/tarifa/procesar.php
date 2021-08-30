<?php

require_once "../../clases/Tarifa.php";

$horaInicio = $_POST['timeHoraInicio'];
$horaFin = $_POST['timeHoraFin'];
$tipo = $_POST['txtTipo'];
$monto = $_POST['numMonto'];
$cancha = $_POST['cboCanchas'];

$tarifa = new Tarifa();

$tarifa->setHoraInicio($horaInicio);
$tarifa->setHoraFin($horaFin);
$tarifa->setTipo($tipo);
$tarifa->setMonto($monto);
$tarifa->setRelaCanchas($cancha);

$tarifa->guardar();

header("location: listado.php");


?>