<?php

require_once "../../clases/Usuario.php";
require_once "../../clases/Turno.php";

$id_usuario= $_POST["txtIdUsuario"];

$fecha= $_POST["dateFecha"];

$id_turno = $_POST["txtIdTurno"];
$cancha = $_POST['txtCancha'];
$usuario = $_POST['cboUsuario'];
$fecha = $_POST['dateFecha'];
$horaInicio = $_POST['timeHoraInicio'];
$horaFin = $_POST['timeHoraFin'];

$turno = Turno::obtenerPorId($id_turno);
$usuario = Usuario::obtenerPorid($usuario);

$turno->setIdTurno($id_turno);
$turno->setRelaCancha($cancha);
$turno->setRelaEntidaD($usuario->getRelaEntidades());
$turno->setFecha($fecha);
$turno->setHoraInicio($horaInicio);
$turno->setHoraFin($horaFin);

$turno->actualizar();

header("location: listado.php?id_cancha=" . $cancha ."&DateFecha=" . $fecha ."&id_usuario=" . $id_usuario);



?>