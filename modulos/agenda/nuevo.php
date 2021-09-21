<?php 
$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'fechaInicio':
			$mensaje = "La fecha de Inicio no debe estar vacio debe elegir una opcion";
			break;
	}

	switch ($_GET["error"]) {
		case 'fechaFin':
			$mensaje = "La Fecha de Fin no debe estar vacio debe elegir una opcion";
			break;
	}

	switch ($_GET["error"]) {
		case 'horaInicio':
			$mensaje = "La Hora de Inicio no debe estar vacio debe elegir una opcion";
			break;
	}

	switch ($_GET["error"]) {
		case 'horaFin':
			$mensaje = "La Hora de Fin no debe estar vacio debe elegir una opcion";
			break;
	}

	switch ($_GET["error"]) {
		case 'duracion':
			$mensaje = "La Duracion no debe estar vacio debe elegir una opcion";
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

			Fecha Inicio: <input type="date" name= "dateFechaInicio">
			<br><br>	

			Fecha Fin: <input type="date" name= "dateFechaFin">
			<br><br>

			Hora Inicio: <input type="time" name= "timeHoraInicio">
			<br><br>

			Hora Fin: <input type="time" name= "timeHoraFin">
			<br><br>

			Duracion: <input type="time" name= "timeDuracion">
		
			<br><br>
			<input type="submit" name="Guardar" value="Guardar">


		</form>
</body>
</html>