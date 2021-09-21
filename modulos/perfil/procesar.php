<?php

require_once "../../clases/Perfil.php";

$descripcion = trim($_POST['txtNombre']);
$modulos = $_POST['cboModulos'];


if (strlen($descripcion) < 3) {
	header("location: nuevo.php?error=descripcion");
	exit;
}

$perfil = new Perfil();

$perfil->setDescipcion($descripcion);

$perfil->guardar();

foreach ($modulos as $moduloId) {
	// echo $moduloId . "<br>";
	// clase PerfilModulo == tabla intermedia
	$perfilModulo = new PerfilModulo();
	// PerfilModulo guardar()
}

header("location: listado.php");


?>