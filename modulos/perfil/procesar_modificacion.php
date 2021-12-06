<?php

require_once "../../clases/Perfil.php";
require_once "../../clases/PerfilModulo.php";

$idUsuario = $_POST["txtIdUsuario"];
$id_perfil = $_POST["txtIdPerfil"];
$descripcion = trim($_POST['txtNombre']);
$modulos = $_POST['cboModulos'];

if (strlen($descripcion) < 3) {
	header("location: modificar.php?error=descripcion&id_perfil=" . $id_perfil."&id_usuario=".$idUsuario);
	exit;
}

$perfil = Perfil::obtenerXId($id_perfil);

$perfil->setDescipcion($descripcion);


$perfil->actualizar();

$perfilModulo= PerfilModulo::eliminar($id_perfil);

foreach ($modulos as $moduloId) {
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setRelaModulo($moduloId);
	$perfilModulo->setRelaPerfil($id_perfil);
	$perfilModulo->guardar();
}


header("location: listado.php?id_usuario=".$idUsuario);



?>