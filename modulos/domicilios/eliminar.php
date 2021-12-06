<?php

require_once "../../clases/Domicilio.php";

$idEntidad = $_GET["id_entidad"];
$idUsuario = $_GET["id_usuario"];
$idDomicilio = $_GET["id_domicilio"];

$domicilio = Domicilio::obtenerPorId($idDomicilio);

$domicilio->eliminar();

header("location: listado.php?id_entidad=" . $idEntidad ."&id_usuario=" . $idUsuario. "&modulo=usuarios");


?>