<?php

require_once "../../clases/Perfil.php";

$idPerfil = $_GET['id_perfil'];
$idUsuario= $_GET['id_usuario'];

$perfil = Perfil::obtenerPorId($idPerfil);
$perfil->eliminar();

header("location: listado.php?id_usuario=".$idUsuario);


?>
