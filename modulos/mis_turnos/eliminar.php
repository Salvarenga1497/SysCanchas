<?php

require_once "../../clases/Turno.php";

$idTurno = $_GET['id_turno'];
$idCancha = $_GET['id_cancha'];
$idUsuario = $_GET['id_usuario'];
$fecha = $_GET['DateFecha'];

$turno = Turno::obtenerPorId($idTurno);
$turno->eliminar();

header("location: listado.php?id_usuario=" . $idUsuario ."&DateFecha=" . $fecha);

?>