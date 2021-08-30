<?php

require_once "../../clases/Tarifa.php";

$idTarifa = $_GET['id_tarifa'];

$tarifa = Tarifa::obtenerPorId($idTarifa);
$tarifa->eliminar();

header("location: listado.php");


?>