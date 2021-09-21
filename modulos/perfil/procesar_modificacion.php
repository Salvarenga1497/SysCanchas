<?php

require_once "../../clases/Perfil.php";


$id_perfil = $_POST["txtIdPerfil"];
$descripcion = trim($_POST['txtNombre']);

if (strlen($descripcion) < 3) {
	header("location: modificar.php?error=descripcion&id_perfil=" . $id_perfil);
	exit;
}

$perfil = Perfil::obtenerXId($id_perfil);

$perfil->setDescipcion($descripcion);


$perfil->actualizar();

header("location: listado.php");



?>