<?php

$idUsuario = $_GET["id_usuario"];

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
	<link rel="STYLESHEET" type="text/css" href="../../css/formularioNuevoTipoContacto.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/body.css">
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

	<div class="Nombre">

		<?php echo "Nuevo Tipo de Pago"?>

	</div>

	<br><br>

	<div id="Principal">

		<div class="Form">

			<form method="POST" action= "procesar.php" class="Formulario">  

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

				<label for="Tipo Pago">Tipo Pago:</label>
				<input type="text" name= "txtTipoPago">
				<br><br>	
				
				<input type="submit" value="Guardar" class="Guardar">

			</form>

		</div>

	</div>

	<div  id="Pie">

		<?php require_once "../../pie.php";?>

	</div>

</body>
</html>