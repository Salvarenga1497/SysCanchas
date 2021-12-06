<?php

require_once "../../clases/Domicilio.php";

$idCancha = $_GET["id_cancha"];
$idDomicilio = $_GET["id_domicilio"];
$idUsuario = $_GET["id_domicilio"];

$domicilio = Domicilio::obtenerPorId($idDomicilio);
$domicilio->eliminar();

header("location: listado.php?id_cancha=" . $idCancha . "&id_usuario=" . $idUsuario);


?>