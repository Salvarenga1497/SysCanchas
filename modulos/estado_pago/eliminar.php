<?php

require_once "../../clases/EstadoPago.php";

$idEstadoPago = $_GET['id_estado_pago'];
$idUsuario = $_GET['id_usuario'];
$estadoPago = EstadoPago::obtenerPorId($idEstadoPago);
$estadoPago->eliminar();

header("location: listado.php?id_usuario=".$idUsuario);


?>