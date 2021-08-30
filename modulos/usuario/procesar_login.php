<?php

require_once "../../clases/Usuario.php";
require_once "../../configs.php";

$username = $_POST['txtUsuario'];
$contrasena = $_POST['txtContrasena'];

$usuario = Usuario::login($username, $contrasena);



if ($usuario->estaLogueado()) {

	session_start();
	$_SESSION['usuario'] = $usuario;
	header("location: ../../inicio.php");

} else {
	//echo "login incorrecto";
	header("location: ../../form_login.php?error=" . ERROR_LOGIN_CODE);
}


?>