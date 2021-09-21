<?php
require_once "../../clases/Canchas.php";
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
	<title></title>
</head>
<body>


	<?php require_once "../../menu.php";?>
	
	<br><br>

	<?php echo $mensaje; ?>	
	
	<br><br>

		<form method="POST" action= "procesar.php">  

			Hora Inicio: <input type="time" name= "timeHoraInicio" id="timeHoraInicio">
			<br><br>

			Hora Fin: <input type="time" name= "timeHoraFin">
			<br><br>

			Tipo: 
			<select name="cboTipo" id= "cboTipo">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoTipo as $tipo): ?>

					<option value="<?php echo $tipo->getIdTipoTarifa(); ?>">
						<?php echo $tipo->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>
			<br><br>
			
			Monto: <input type="number" name= "numMonto" id="numMonto">
			<br><br>

			Canchas: 
			<select name="cboCanchas" id= "cboCanchas">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoCanchas as $cancha): ?>

					<option value="<?php echo $cancha->getIdCanchas(); ?>">
						<?php echo $cancha->getNombre(); ?>
					</option>

				<?php endforeach?>
			</select>
			
			<br><br>
			<input type="submit" name="Guardar" onclick="validarComboTipo(); validarComboCancha(); validarMonto();">


		</form>
</body>
</html>