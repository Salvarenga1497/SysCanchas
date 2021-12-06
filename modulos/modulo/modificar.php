<?php
require_once "../../clases/Modulo.php";
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

$id_modulo = $_GET["id_modulo"];
$idUsuario = $_GET['id_usuario'];

$moduloUsuario = Modulo::obtenerPorId($id_modulo);

?>
<!DOCTYPE html>
<html>
<head>
	<title>FUTLINE</title>
	<meta charset="UTF-8">
	<meta name="Author" content="Alvarenga Sebastian" >
	<meta name="description" content="Alquilar canchas de futbol">
	<meta name="keywords" content="futbol, alquilar, cancha, futbol5, formosa">
	<link rel="shortcut icon" href="../../imagenes/logo/logoo.png">
	<link rel="STYLESHEET" type="text/css" href="../../css/menu.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/body.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/modificarModulo.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/mensaje.css">
</head>
<body>

	<header>
		<img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
	</header>

	<div>

		<?php require_once "../../menu.php";?>

	</div>
	
	<br><br>

	<div class="Nombre">

		<?php echo "Modificar Modulo"?>

	</div>

	<br><br>

	<div id="Principal">

		<div class="mensaje">

			<?php echo $mensaje; ?>	

		</div>

		<br><br>

		<div class="Form">

			<form method="POST" action= "procesar_modificacion.php" class="Formulario">  

				<input type="hidden" name="txtIdModulo" value="<?php echo $id_modulo; ?>">

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>"> 

				<label for="Nombre">Nombre:</label>
				<input type="text" name= "txtNombre" value="<?php echo $moduloUsuario->getDescripcion(); ?>"  id="txtNombre">
				<br><br>

				<label for="Directorio">Directorio:</label>
				<input type="text" name= "txtDirectorio" value="<?php echo $moduloUsuario->getDirectorio(); ?>" id="txtDirectorio">
				<br><br>

				<input class="Guardar" type="submit" name="Guardar" value="Actualizar" onclick="validarNombre();validarDirectorio();">


			</form>
		</div>

	</div>

	<div id="Pie">

		<?php require_once "../../pie.php";?>

	</div>

</body>
</html>