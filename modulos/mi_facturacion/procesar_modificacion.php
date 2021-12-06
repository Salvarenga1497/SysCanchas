<?php

require_once "../../clases/Factura.php";

$idUsuario = $_POST["txtIdUsuario"];
$idFactura = $_POST["txtIdFactura"];
$estadoPago = $_POST['cboEstadoPago'];
$modoPago = $_POST['cboModoPago'];
$turno = $_POST['txtIdTurno'];


$factura = Factura::obtenerPorId($idFactura);

$factura->setRelaEstadoPago($estadoPago);
$factura->setRelaTurnos($turno);
$factura->setRelaTipoPago($modoPago);

$factura->actualizar();

header("location: listado.php?id_usuario=".$idUsuario);


