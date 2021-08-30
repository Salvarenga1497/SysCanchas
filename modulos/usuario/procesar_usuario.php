<?php

require_once "../../clases/Usuario.php";

$documento = trim($_POST['txtDocumento']);
$nombre = trim($_POST['txtNombre']);
$apellido = trim($_POST['txtApellido']);
$username = trim($_POST['txtUserName']);
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$sexo = $_POST['cboSexo'];
$tipo = $_POST['cboTipo'];
$contrasena = trim($_POST['txtPassword']);

if (strlen($nombre) < 3) {
	header("location: nuevo.php?error=nombre");
	exit;
}

if (strlen($apellido) < 3) {
	header("location: nuevo.php?error=apellido");
	exit;
}

if (strlen($username) < 3) {
	header("location: nuevo.php?error=username");
	exit;
}

if (strlen($contrasena) < 8) {
	header("location: nuevo.php?error=contrasena");
	exit;
}


$usuario = new Usuario();

$usuario->setDocumento($documento);
$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setUserName($username);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setRelaSexo($sexo);
$usuario->setRelaTipo($tipo);
$usuario->setContrasena($contrasena);


$usuario->guardar();

header("location: listado.php");


?>