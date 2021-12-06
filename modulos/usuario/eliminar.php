<?php

require_once "../../clases/Usuario.php";

$id_usuario = $_GET['idUsuario'];

$idUsuario = $_GET['id_usuario'];

$usuario = Usuario::obtenerPorId($id_usuario);
$usuario->eliminar();

header("location: listado.php?id_usuario=" . $idUsuario);


?>
