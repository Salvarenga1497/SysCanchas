<?php
require_once "../../js/validacion_nombre.js";
require_once "../../js/modulo/validacion_directorio.js";
$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'nombre':
			$mensaje = "El nombre no debe estar vacio y debe tener minimo 3 caracteres";
			break;

		case 'directorio':
			$mensaje = "El directorio no debe estar vacio y debe tener minimo 3 caracteres";
			break;
		}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php require_once "../../menu.php";?>
	
	<br><br>

	<?php echo $mensaje; ?>	
	
	<br><br>

		<form method="POST" action= "procesar.php">  

			Nombre: <input type="text" name= "txtNombre" id="txtNombre">	
			<br><br>
			Directorio: <input type="text" name= "txtDirectorio" id="txtDirectorio">	
			<br><br>
			<input type="submit" value="Guardar" onclick="validarNombre();validarDirectorio();">


		</form>
</body>
</html>