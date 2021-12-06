<?php

require_once "../../clases/Cancha.php";

$idCancha = $_GET['id_cancha'];
$idUsuario = $_GET['id_usuario'];

$cancha = Cancha::obtenerPorId($idCancha);
$cancha->eliminar();

header("location: listado.php?id_usuario=" . $idUsuario);


?>