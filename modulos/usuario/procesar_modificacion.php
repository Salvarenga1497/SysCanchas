<?php

require_once "../../clases/Usuario.php";

$idUsuario = $_POST["idUsuario"];
$id_usuario = $_POST["txtIdUsuario"];
$documento = trim($_POST['txtDocumento']);
$nombre = trim($_POST['txtNombre']);
$apellido = trim($_POST['txtApellido']);
$username = trim($_POST['txtUserName']);
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$sexo = $_POST['cboSexo'];
$perfil = $_POST['cboPerfil'];
$contrasena = trim($_POST['txtPassword']);

if (strlen($nombre) < 3) {
	header("location: modificar.php?error=nombre&idUsuario=" . $id_usuario. "&id_usuario=" . $idUsuario);
	exit;
}

if (strlen($apellido) < 3) {
	header("location: modificar.php?error=apellido&idUsuario=" . $id_usuario. "&id_usuario=" . $idUsuario);
	exit;
}

if (strlen($username) < 3) {
	header("location: modificar.php?error=username&idUsuario=" . $id_usuario. "&id_usuario=" . $idUsuario);
	exit;
}

if (strlen($contrasena) < 6) {
	header("location: modificar.php?error=contrasena&idUsuario=" . $id_usuario. "&id_usuario=" . $idUsuario);
	exit;
}


if ($perfil == "NULL") {
	header("location: modificar.php?error=perfil&idUsuario=" . $id_usuario. "&id_usuario=" . $idUsuario);
	exit;
}




$usuario = Usuario::obtenerPorId($id_usuario);

$usuario->setDocumento($documento);
$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setUserName($username);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setRelaSexo($sexo);
$usuario->setRelaPerfil($perfil);
$usuario->setContrasena($contrasena);


$usuario->actualizar();

header("location: listado.php?id_usuario=" . $idUsuario);



?>