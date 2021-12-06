<?php

require_once "../../clases/TipoPago.php";

$idUsuario= $_POST['txtIdUsuario'];
$descripcion = $_POST['txtTipoPago'];

$tipoPago = new TipoPago();

$tipoPago->setDescripcion($descripcion);

$tipoPago->guardar();

header("location: listado.php?id_usuario=" . $idUsuario);


?>