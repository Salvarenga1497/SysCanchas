<?php

require_once "../../clases/TipoPago.php";

$idUsuario = $_GET['id_usuario'];
$idTipoContacto = $_GET['id_tipo_pago'];

$tipoPago = TipoPago::obtenerPorId($idTipoContacto);
$tipoPago->eliminar();

header("location: listado.php?id_usuario=" . $idUsuario);


?>