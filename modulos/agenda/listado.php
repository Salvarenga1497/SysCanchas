<?php

require_once "../../clases/Agenda.php";

$lista = Agenda::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php require_once "../../menu.php";?>

<br>
<br>

<a href= "nuevo.php"> Nueva Agenda </a>
<br>
<br>

<table border="1">
	<tr>
		<th>ID Agenda</th>
		<th>Fecha Inicio</th>
		<th>Fecha Fin</th>
		<th>Hora Inicio</th>
		<th>Hora Fin</th>
		<th>Duracion</th>
		<th>Dias</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $agenda): ?>

		<tr>
			
			<td><?php echo $agenda->getIdAgenda(); ?></td>
			<td><?php echo $agenda->getFechaInicio(); ?></td>
			<td><?php echo $agenda->getFechaFin(); ?></td>
			<td><?php echo $agenda->getHoraInicio(); ?></td>
			<td><?php echo $agenda->getHoraFin(); ?></td>
			<td><?php echo $agenda->getDuracion(); ?></td>
			<td>
				<a href="../dia/nuevo.php?id_agenda=<?php echo $agenda->getIdAgenda(); ?>"> Ver </a>
			</td>
			<td>
				<a href="modificar.php?id_agenda=<?php echo $agenda->getIdAgenda(); ?>"> Modificar </a>
				<a href="eliminar.php?id_agenda=<?php echo $agenda->getIdAgenda(); ?>"> Eliminar </a>
			</td>

		</tr>

	<?php endforeach ?>

</table>


</body>
</html>

