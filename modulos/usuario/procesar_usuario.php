<?php

require_once "../../clases/Usuario.php";
$idUsuario = $_POST['txtIdUsuario'];
$documento = $_POST['txtDocumento'];
$nombre = trim($_POST['txtNombre']);
$apellido = trim($_POST['txtApellido']);
$username = trim($_POST['txtUserName']);
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$sexo = $_POST['cboSexo'];
$perfil = $_POST['cboPerfil'];

if (strlen($nombre) < 3) {
	header("location: nuevo.php?error=nombre&id_usuario=" .$idUsuario);
	exit;
}

if (strlen($apellido) < 3) {
	header("location: nuevo.php?error=apellido&id_usuario=" .$idUsuario);
	exit;
}

if (strlen($username) < 3) {
	header("location: nuevo.php?error=username&id_usuario=" .$idUsuario);
	exit;
}


if ($perfil == "NULL") {
	header("location: nuevo.php?error=perfil&id_usuario=" .$idUsuario);
	exit;
}


$usuario = new Usuario();

$usuario->setDocumento($documento);
$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setUserName($username);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setRelaSexo($sexo);
$usuario->setRelaPerfil($perfil);


$usuario->guardar();

header("location: listado.php?id_usuario=" . $idUsuario);


?>