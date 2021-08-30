<?php

require_once "../../clases/TipoContacto.php";

$descripcion = $_POST['txtTipoContacto'];

$tipoContacto = new TipoContacto();

$tipoContacto->setDescripcion($descripcion);

$tipoContacto->guardar();

header("location: listado.php");


?>