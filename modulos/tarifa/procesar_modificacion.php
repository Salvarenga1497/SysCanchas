<?php

require_once "../../clases/Tarifa.php";

$id_tarifa = $_POST["txtIdTarifa"];
$horaInicio = $_POST['timeHoraInicio'];
$horaFin = $_POST['timeHoraFin'];
$tipo = $_POST['txtTipo'];
$monto = $_POST['numMonto'];
$cancha = $_POST['cboCanchas'];

$tarifa = Tarifa::obtenerPorId($id_tarifa);

$tarifa->setHoraInicio($horaInicio);
$tarifa->setHoraFin($horaFin);
$tarifa->setTipo($tipo);
$tarifa->setMonto($monto);
$tarifa->setRelaCanchas($cancha);


$tarifa->actualizar();

header("location: listado.php");



?>