

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php require_once "../../menu.php";?>
	
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