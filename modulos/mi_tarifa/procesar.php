<?php

require_once "../../clases/Tarifa.php";


$idUsuario = $_POST['txtUsuario'];


$horaInicio = trim($_POST['timeHoraInicio']);
$horaFin = trim($_POST['timeHoraFin']);
$tipo = $_POST['cboTipo'];
$monto = trim($_POST['numMonto']);
$cancha = $_POST['txtIdCancha'];

$tarifa = new Tarifa();

$tarifa->setHoraInicio($horaInicio);
$tarifa->setHoraFin($horaFin);
$tarifa->setRelaTipoTarifa($tipo);
$tarifa->setMonto($monto);
$tarifa->setRelaCanchas($cancha);

$tarifa->guardar();

header("location: listado.php?id_usuario=" . $idUsuario);


?>