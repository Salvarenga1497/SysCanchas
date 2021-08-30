<?php

require_once "../../clases/Canchas.php";

$listadoCanchas = Cancha::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php require_once "../../menu.php";?>
	
	<br><br>

		<form method="POST" action= "procesar.php">  

			Hora Inicio: <input type="time" name= "timeHoraInicio">
			<br><br>

			Hora Fin: <input type="time" name= "timeHoraFin">
			<br><br>

			Tipo: <input type="text" name= "txtTipo">
			<br><br>
			
			Monto: <input type="number" name= "numMonto">
			<br><br>

			Canchas: 
			<select name="cboCanchas">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoCanchas as $cancha): ?>

					<option value="<?php echo $cancha->getIdCanchas(); ?>">
						<?php echo $cancha->getNombre(); ?>
					</option>

				<?php endforeach?>
			</select>
			
			<br><br>
			<input type="submit" name="Guardar">


		</form>
</body>
</html>