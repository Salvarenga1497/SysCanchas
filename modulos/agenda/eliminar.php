<?php

require_once "../../clases/Agenda.php";

$idAgenda = $_GET['id_agenda'];

$agenda = Agenda::obtenerPorId($idAgenda);
$agenda->eliminar();

header("location: listado.php");


?>