<?php

require_once "../../clases/Turno.php";

$fecha =  $_POST["DateFecha"];
$id_turno = $_POST["txtIdTurno"];
$cancha = $_POST["txtCancha"];
$id_usuario = $_POST["txtUsuario"];
$id_turno_nuevo = $_POST['cboHorarios'];

$turno = Turno::obtenerPorId($id_turno);
$turno->eliminar();

$turno = Turno::obtenerPorId($id_turno_nuevo);


$turno->setRelaEntidad($id_usuario);


$turno->reprogramar($id_usuario,$id_turno_nuevo);

header("location: listado.php?id_cancha=" . $cancha ."&DateFecha=" . $fecha ."&id_usuario=" . $id_usuario);


