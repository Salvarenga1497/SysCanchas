<?php

require_once "../../clases/Canchas.php";
require_once "../../clases/Tarifa.php";
require_once "../../clases/TipoTarifa.php";
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

$id_tarifa = $_GET["id_tarifa"];

$tarifa = Tarifa::obtenerPorId($id_tarifa);

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

			<input type="hidden" name="txtIdTarifa" value="<?php echo $id_tarifa; ?>">

			Hora Inicio: <input type="text" name= "timeHoraInicio" value="<?php echo $tarifa->getHoraInicio(); ?>">
			<br><br>

			Hora Fin: <input type="text" name= "timeHoraFin" value="<?php echo $tarifa->getHoraFin(); ?>">
			<br><br>

			Tipo: 
			<select name="cboTipo">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoTipo as $tipo): ?>

					<?php 

					$selected = "";

						if ($tipo->getIdTipoTarifa() == $tarifa->getRelaTipoTarifa()) {
							$selected = "SELECTED";
						}
					?>
					<option <?php echo $selected; ?> value="<?php echo $tipo->getIdTipoTarifa(); ?>">
						<?php echo $tipo->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>
			<br><br>

			Monto: <input type="text" name= "numMonto" value="<?php echo $tarifa->getMonto(); ?>">
			<br><br>

			Cancha: 
			<select name="cboCanchas">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoCanchas as $cancha): ?>

					<?php 

					$selected = "";

						if ($cancha->getIdCanchas() == $tarifa->getRelaCanchas()) {
							$selected = "SELECTED";
						}
					?>
					<option <?php echo $selected; ?> value="<?php echo $cancha->getIdCanchas(); ?>">
						<?php echo $cancha->getNombre(); ?>
					</option>

				<?php endforeach?>
			</select>

			<br><br>
			<input type="submit" name="Guardar" value="Actualizar">


		</form>
</body>
</html>