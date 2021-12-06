<?php

require_once "../../clases/Provincia.php";

$idUsuario = $_GET["id_usuario"];
$idProvincia = $_GET['id_provincia'];

$provincia = Provincia::obtenerPorId($idProvincia);
$provincia->eliminar();

header("location: listado.php?id_usuario=".$idUsuario);


?>