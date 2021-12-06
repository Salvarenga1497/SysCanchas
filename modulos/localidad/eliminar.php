<?php

require_once "../../clases/Localidad.php";

$idUsuario = $_GET["id_usuario"];
$idLocalidad = $_GET['id_localidad'];

$localidad = Localidad::obtenerPorId($idLocalidad);
$localidad->eliminar();

header("location: listado.php?id_usuario=".$idUsuario);


?>