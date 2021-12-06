<?php

require_once "../../clases/Factura.php";

$idTurno = $_GET['id_factura'];

$factura = Factura::obtenerPorId($idTurno);
$factura->eliminar();

header("location: listado.php");


?>