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
	<title>FUTLINE</title>
    <meta charset="UTF-8">
    <meta name="Author" content="Alvarenga Sebastian" >
    <meta name="description" content="Alquilar canchas de futbol">
    <meta name="keywords" content="futbol, alquilar, cancha, futbol5, formosa">
    <link rel="shortcut icon"  href="imagenes/logo/logoo.png">
    <link rel="STYLESHEET" type="text/css" href="css/login.css">
</head>

<body>

	<div id="Principal">

		<section class="Mensaje">

			<h3><?php echo $mensaje; ?></h3>

		</section>

		<form method="POST" action="modulos/usuario/procesar_login.php" autocomplete="on" class="Login">

			<fieldset: none>

				<label class="nombre" for="Usuario">Usuario:</label>
				<input type="text" name="txtUsuario">
				<br><br>
				<label class="nombre" for="Contraseña">Contraseña:</label>
				<input  type="text" name="txtContrasena">
				<br><br>
				<input class="Iniciar" type="submit" value="Iniciar sesion">
			</fieldset>

		</form>

		<br>
		<br>
		<br>

		<div>
			<img src="imagenes/logo/logoPrincipal.png">
		</div>
  </div>

		<div id="Pie">

	        <?php require_once "pie.php";?>

	    </div>

  

</body>
</html>