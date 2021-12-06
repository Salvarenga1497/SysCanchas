<?php

require_once "../../clases/TipoContacto.php";

$idUsuario = $_GET['id_usuario'];
$idTipoContacto = $_GET['id_tipo_contacto'];

$tipoContacto = TipoContacto::obtenerPorId($idTipoContacto);
$tipoContacto->eliminar();

header("location: listado.php?id_usuario=" . $idUsuario);


?>