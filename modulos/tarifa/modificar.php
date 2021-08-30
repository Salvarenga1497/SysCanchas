<?php

require_once "../../clases/Canchas.php";
require_once "../../clases/Tarifa.php";

$listadoCanchas = Cancha::obtenerTodos();

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

		<form method="POST" action= "procesar_modificacion.php">  

			<input type="hidden" name="txtIdTarifa" value="<?php echo $id_tarifa; ?>">

			Hora Inicio: <input type="text" name= "timeHoraInicio" value="<?php echo $tarifa->getHoraInicio(); ?>">
			<br><br>

			Hora Fin: <input type="text" name= "timeHoraFin" value="<?php echo $tarifa->getHoraFin(); ?>">
			<br><br>

			Tipo: <input type="text" name= "txtTipo" value="<?php echo $tarifa->getTipo(); ?>">
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