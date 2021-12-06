<?php

require_once "../../clases/Usuario.php";
require_once "../../configs.php";

$username = $_POST['txtUsuario'];
$contrasena = $_POST['txtContrasena'];

$usuario = Usuario::login($username, $contrasena);

$perfil = $usuario->getRelaPerfil();

$id=$usuario->getRelaEntidades();

if ($perfil != 64 ) {
if ($usuario->estaLogueado()) {

	session_start();
	$_SESSION['usuario'] = $usuario;
	header("location: ../../inicio.php?id_usuario=" . $id );
}else {
	header("location: ../../form_login.php?error=" . ERROR_LOGIN_CODE);
}
}else {
	session_start();
	$_SESSION['usuario'] = $usuario;
	header("location: ../../inicio2.php?id_usuario=" . $id );
} 


?>