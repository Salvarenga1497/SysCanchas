<?php

require_once "../../clases/Modulo.php";

$idModulo = $_GET['id_modulo'];
$idUsuario = $_GET['id_usuario'];

$modulo = Modulo::obtenerPorId($idModulo);
$modulo->eliminar();

header("location: listado.php?id_usuario=".$idUsuario);


?>
