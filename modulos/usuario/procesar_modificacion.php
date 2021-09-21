<?php

require_once "../../clases/Usuario.php";


$id_usuario = $_POST["txtIdUsuario"];
$documento = trim($_POST['txtDocumento']);
$nombre = trim($_POST['txtNombre']);
$apellido = trim($_POST['txtApellido']);
$username = trim($_POST['txtUserName']);
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$sexo = $_POST['cboSexo'];
$tipo = $_POST['cboTipo'];
$contrasena = trim($_POST['txtPassword']);

if (strlen($nombre) < 3) {
	header("location: modificar.php?error=nombre&id_usuario=" . $id_usuario);
	exit;
}

if (strlen($apellido) < 3) {
	header("location: modificar.php?error=apellido&id_usuario=" . $id_usuario);
	exit;
}

if (strlen($username) < 3) {
	header("location: modificar.php?error=username&id_usuario=" . $id_usuario);
	exit;
}

if (strlen($contrasena) < 6) {
	header("location: modificar.php?error=contrasena&id_usuario=" . $id_usuario);
	exit;
}

if ($sexo == "NULL") {
	header("location: modificar.php?error=sexo&id_usuario=" . $id_usuario);
	exit;
}

if ($tipo == "NULL") {
	header("location: modificar.php?error=tipo&id_usuario=" . $id_usuario);
	exit;
}




$usuario = Usuario::obtenerPorId($id_usuario);

$usuario->setDocumento($documento);
$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setUserName($username);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setRelaSexo($sexo);
$usuario->setRelaTipo($tipo);
$usuario->setContrasena($contrasena);


$usuario->actualizar();

header("location: listado.php");



?>