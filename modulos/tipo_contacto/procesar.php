<?php

require_once "../../clases/TipoContacto.php";

$idUsuario= $_POST['txtIdUsuario'];
$descripcion = $_POST['txtTipoContacto'];

$tipoContacto = new TipoContacto();

$tipoContacto->setDescripcion($descripcion);

$tipoContacto->guardar();

header("location: listado.php?id_usuario=" . $idUsuario);


?>