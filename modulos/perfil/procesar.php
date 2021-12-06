<?php

require_once "../../clases/Perfil.php";
require_once "../../clases/PerfilModulo.php";


$idUsuario = $_POST['txtIdUsuario'];
$descripcion = trim($_POST['txtNombre']);
$modulos = $_POST['cboModulos'];


if (strlen($descripcion) < 3) {
	header("location: nuevo.php?error=descripcion&id_usuario=".$idUsuario);
	exit;
}


$perfil = new Perfil();

$perfil->setDescipcion($descripcion);

$perfil->guardar();

foreach ($modulos as $moduloId) {

	$idPerfil =$perfil->getIdPerfil();
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setRelaModulo($moduloId);
	$perfilModulo->setRelaPerfil($idPerfil);
	$perfilModulo->guardar();
}

header("location: listado.php?id_usuario=".$idUsuario);


?>