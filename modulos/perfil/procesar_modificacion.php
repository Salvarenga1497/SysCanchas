<?php

require_once "../../clases/Perfil.php";


$id_perfil = $_POST["txtIdPerfil"];
$descripcion = $_POST['txtNombre'];

$perfil = Perfil::obtenerXId($id_perfil);

$perfil->setDescipcion($descripcion);


$perfil->actualizar();

header("location: listado.php");



?>