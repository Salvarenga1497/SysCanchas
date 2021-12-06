<?php
require_once "../../clases/Cancha.php";
require_once "../../clases/TipoTarifa.php";
require_once "../../js/tarifa/validarComboTipo.js";
require_once "../../js/tarifa/validarComboCancha.js";
require_once "../../js/tarifa/validarMonto.js";
$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'tipo':
			$mensaje = "El tipo no debe estar vacio debe elegir una opcion";
			break;
	}

	switch ($_GET["error"]) {
		case 'cancha':
			$mensaje = "La cancha no debe estar vacio debe elegir una opcion";
			break;
	}

	switch ($_GET["error"]) {
		case 'monto':
			$mensaje = "La monto no debe estar vacio y debe tener un numero de 3 cifras";
			break;
	}

	switch ($_GET["error"]) {
		case 'horaInicio':
			$mensaje = "La Hora de Inicio no debe estar vacio";
			break;
	}

	switch ($_GET["error"]) {
		case 'horaFin':
			$mensaje = "La Hora de Fin no debe estar vacio";
			break;
	}

}


$listadoCanchas = Cancha::obtenerTodos();
$listadoTipo = TipoTarifa::obtenerTodos();

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
    <link rel="STYLESHEET" type="text/css" href="../../css/formularioNuevoTarifa.css">
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
	
	<br>

	<div id="Principal">

	<div class="Nombre">

		<?php echo "Nueva Tarifa"?>

	</div>

	<br>

	<div class="mensaje">

		<?php echo $mensaje; ?>	
		
	</div>
	
	<br>

	<div class="Form">

		<form method="POST" action= "procesar.php" class="Formulario">  

			<label for="Hora Inicio">Hora Inicio:</label>
			<input type="time" name= "timeHoraInicio">
			<br><br>

			<label for="Hora Fin">Hora Fin:</label>
			<input type="time" name= "timeHoraFin">
			<br><br>

			<label for="Tipo">Tipo:</label>
			<select name="cboTipo" id= "cboTipo">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoTipo as $tipo): ?>

					<option value="<?php echo $tipo->getIdTipoTarifa(); ?>">
						<?php echo $tipo->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>
			<br><br>
			
			<label for="Monto">Monto:</label>
			<input type="number" name= "numMonto" id="numMonto">
			<br><br>

			<label for="Canchas">Canchas:</label>
			<select name="cboCanchas" id= "cboCanchas">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoCanchas as $cancha): ?>

					<option value="<?php echo $cancha->getIdCanchas(); ?>">
						<?php echo $cancha->getNombre(); ?>
					</option>

				<?php endforeach?>
			</select>
			
			<br><br>
			<input class="Guardar" type="submit" name="Guardar" onclick="validarComboTipo(); validarComboCancha(); validarMonto();">


		</form>

	</div>

</div>

	<div id="Pie">

		<?php require_once "../../pie.php";?>

	</div>
	
</body>
</html>