<?php

require_once "../../clases/Canchas.php";

$idCancha = $_GET['id_cancha'];

$cancha = Cancha::obtenerPorId($idCancha);
$cancha->eliminar();

header("location: listado.php");


?>