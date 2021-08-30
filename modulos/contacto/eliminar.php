<?php

require_once "../../clases/Contacto.php";

$idEntidad = $_GET["id_entidad"];
$idEntidadContacto = $_GET["id_entidad_contacto"];


$contacto = Contacto::obtenerPorId($idEntidadContacto);


$contacto->eliminar();

header("location: contacto.php?id_entidad=" . $idEntidad);

?>