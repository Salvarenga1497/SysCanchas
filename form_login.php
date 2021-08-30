<?php

require_once "configs.php";

$mensaje = "";

if (isset($_GET['error'])) {
	$error = $_GET['error'];

	if ($error == ERROR_LOGIN_CODE) {
		$mensaje = ERROR_LOGIN_MENSAJE;
	} else if ($error == MENSAJE_CODE) {
		$mensaje = MENSAJE_NECESITA_LOGIN;	
}


}

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h3><?php echo $mensaje; ?></h3>

	<br>
	<br>

	<form method="POST" action="modulos/usuario/procesar_login.php">
		Usuario: <input type="text" name="txtUsuario">
		<br><br>
		Contraseña: <input type="text" name="txtContrasena">
		<br><br>
		<input type="submit" value="Iniciar sesion">
	</form>

</body>
</html>