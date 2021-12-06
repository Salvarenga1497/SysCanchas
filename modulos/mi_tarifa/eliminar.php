<?php

require_once "../../clases/Tarifa.php";

$idTarifa = $_GET['id_tarifa'];
$idUsuario = $_GET['id_usuario'];


$tarifa = Tarifa::obtenerPorId($idTarifa);
$tarifa->eliminar();

header("location: listado.php?id_usuario=" . $idUsuario);


?>