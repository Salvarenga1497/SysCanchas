<?php

require_once "../../clases/Perfil.php";

$idPerfil = $_GET['id_perfil'];

$perfil = Perfil::obtenerPorId($idPerfil);
$perfil->eliminar();

header("location: listado.php");


?>
