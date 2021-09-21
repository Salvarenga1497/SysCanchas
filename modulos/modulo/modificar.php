<?php

require_once "../../clases/Modulo.php";
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

$id_modulo = $_GET["id_modulo"];

$moduloUsuario = Modulo::obtenerPorId($id_modulo);

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

		<form method="POST" action= "procesar_modificacion.php">  

			<input type="hidden" name="txtIdModulo" value="<?php echo $id_modulo; ?>">

			Nombre: <input type="text" name= "txtNombre" value="<?php echo $moduloUsuario->getDescripcion(); ?>">
			<br><br>

			Directorio: <input type="text" name= "txtDirectorio" value="<?php echo $moduloUsuario->getDirectorio(); ?>">
			<br><br>
			
			<input type="submit" name="Guardar" value="Actualizar">


		</form>
</body>
</html>