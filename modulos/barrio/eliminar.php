<?php

require_once "../../clases/Barrio.php";

$idBarrio = $_GET['id_barrio'];
$idUsuario = $_GET["id_usuario"];

$barrio = Barrio::obtenerPorId($idBarrio);
$barrio->eliminar();

header("location: listado.php?id_usuario=".$idUsuario);


?>