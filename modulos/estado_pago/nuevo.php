<?php  
require_once "../../js/validacion_nombre.js";
$mensaje = "";

$idUsuario = $_GET['id_usuario'];

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'descripcion':
			$mensaje = "El nombre no debe estar vacio y debe tener minimo 3 caracteres";
			break;
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
    <link rel="shortcut icon" href="../../imagenes/logo/logoo.png">
    <link rel="STYLESHEET" type="text/css" href="../../css/menu.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/FormularioNuevoSexo.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/body.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/mensaje.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">
</head>
<body>

	<header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

	<div>

		<?php require_once "../../menu.php";?>

	</div>
	
	<br><br>

	<div id="Principal">

	<div class="Nombre">

		<?php echo "Nuevo Estado Pago"?>

	</div>

	<br><br>

	<div class="mensaje">

		<?php echo $mensaje; ?>

	</div>

	<br><br>

	<div class="Form">

		<form method="POST" action= "procesar.php" class="Formulario"> 

			<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

			<label for="Nuevo Estado Pago">Nuevo Estado Pago:</label>
			<input type="text" name= "txtNombre" id="txtNombre">
			<br><br>	
			
			<input class="Guardar" type="submit" value="Guardar" onclick="validarNombre();">
		</form>

	</div>

</div>

	<div  id="Pie">

		<?php require_once "../../pie.php";?>

	</div>
</body>
</html>