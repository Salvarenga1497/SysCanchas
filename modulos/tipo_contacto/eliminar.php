<?php

require_once "../../clases/TipoContacto.php";

$idTipoContacto = $_GET['id_tipo_contacto'];

$tipoContacto = TipoContacto::obtenerPorId($idTipoContacto);
$tipoContacto->eliminar();

header("location: listado.php");


?>