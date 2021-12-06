<?php

require_once "../../clases/Contacto.php";

$idUsuario = $_GET["id_usuario"];
$idEntidad = $_GET["id_entidad"];
$idEntidadContacto = $_GET["id_entidad_contacto"];


$contacto = Contacto::obtenerPorId($idEntidadContacto);


$contacto->eliminar();

header("location: contacto.php?id_entidad=" . $idEntidad . "&id_usuario=" . $idUsuario);

?>