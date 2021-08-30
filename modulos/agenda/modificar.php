<?php
require_once "../../clases/Agenda.php";

$id_agenda = $_GET["id_agenda"];


$agenda = Agenda::obtenerPorId($id_agenda);

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
			
			<input type="hidden" name="txtIdAgenda" value="<?php echo $id_agenda; ?>">

			Fecha Inicio: <input type="date" name= "dateFechaInicio" value="<?php echo $agenda->getFechaInicio(); ?>">
			<br><br>	

			Fecha Fin: <input type="date" name= "dateFechaFin" value="<?php echo $agenda->getFechaFin(); ?>">
			<br><br>

			Hora Inicio: <input type="time" name= "timeHoraInicio" value="<?php echo $agenda->getHoraInicio(); ?>" >
			<br><br>

			Hora Fin: <input type="time" name= "timeHoraFin" value="<?php echo $agenda->getHoraFin(); ?>">
			<br><br>

			Duracion: <input type="time" name= "timeDuracion" value="<?php echo $agenda->getDuracion(); ?>">
			<br><br>
			
			<input type="submit" name="Guardar" value="Actualizar">


		</form>
</body>
</html>