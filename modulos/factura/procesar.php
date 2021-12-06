<?php

require_once "../../clases/Factura.php";
require_once "../../clases/Turno.php";


$idCancha = $_POST['txtIdCancha'];
$idUsuario = $_POST['txtIdUsuario'];


$modoPago = $_POST['cboModoPago'];
$turno = $_POST['txtIdTurno'];



$factura = new Factura();

$factura->setRelaCanchas($idCancha);

$factura->setRelaTurnos($turno);
$factura->setRelaTipoPago($modoPago);

$factura->guardar();

$turno = Turno::obtenerPorId($turno);
$turno->pagar();

$fecha = $_POST['txtIdFecha'];

header("location:../turno/listado.php?id_cancha=".$idCancha ."&id_usuario=".$idUsuario."&DateFecha=". $fecha );

?>