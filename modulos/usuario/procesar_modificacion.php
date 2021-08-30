<?php

require_once "../../clases/Usuario.php";


$id_usuario = $_POST["txtIdUsuario"];
$documento = $_POST['txtDocumento'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$username = $_POST['txtUserName'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$sexo = $_POST['cboSexo'];
$tipo = $_POST['cboTipo'];
$contrasena = $_POST['txtPassword'];



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