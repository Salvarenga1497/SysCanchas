<?php

require_once "../../clases/Usuario.php";
require_once "../../clases/Turno.php";

$id_turno = $_POST["txtIdTurno"];
$cancha = $_POST['txtIdCancha'];
$idUsuario = $_POST['txtIdUsuario'];
$fecha = $_POST['dateFecha'];
$horaInicio = $_POST['timeHoraInicio'];
$horaFin = $_POST['timeHoraFin'];

$turno = Turno::obtenerPorId($id_turno);
$usuario = Usuario::obtenerPoridEntidad($idUsuario);

$turno->setIdTurno($id_turno);
$turno->setRelaCancha($cancha);
$turno->setRelaEntidad($usuario->getRelaEntidades());
$turno->setFecha($fecha);
$turno->setHoraInicio($horaInicio);
$turno->setHoraFin($horaFin);

$turno->actualizar();

header("location: listado_turno.php?id_usuario=" . $idUsuario ."&cboCancha=" . $cancha);



?>