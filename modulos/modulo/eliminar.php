<?php

require_once "../../clases/Modulo.php";

$idModulo = $_GET['id_modulo'];

$modulo = Modulo::obtenerPorId($idModulo);
$modulo->eliminar();

header("location: listado.php");


?>
