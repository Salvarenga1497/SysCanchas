<?php

require_once "../../clases/Agenda.php";

$idAgenda = $_GET['id_agenda'];
$idUsuario = $_GET['id_usuario'];

$agenda = Agenda::obtenerPorId($idAgenda);
$agenda->eliminar();



header("location: listado.php?id_usuario=" . $idUsuario);


?>