<?php

require_once "../../clases/Tarifa.php";

$lista = Tarifa::obtenerTodos();

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

<a href= "nuevo.php"> Nueva Tarifa </a>
<br>
<br>

<table border="1">
	<tr>
		<th>ID CANCHA</th>
		<th>Hora Inicio</th>
		<th>Hora Fin</th>
		<th>Tipo</th>
		<th>Monto</th>
		<th>Cancha</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $tarifa): ?>

		<tr>
			
			<td><?php echo $tarifa->getIdTarifa(); ?></td>
			<td><?php echo $tarifa->getHoraInicio(); ?></td>
			<td><?php echo $tarifa->getHoraFin(); ?></td>
			<td><?php echo $tarifa->getTipo(); ?></td>
			<td><?php echo $tarifa->getMonto(); ?></td>
			<td><?php echo $tarifa->getRelaCanchas(); ?></td>
			<td>
				<a href="modificar.php?id_tarifa=<?php echo $tarifa->getIdTarifa(); ?>"> Modificar </a>
				<a href="eliminar.php?id_tarifa=<?php echo $tarifa->getIdTarifa(); ?>"> Eliminar </a>
			</td>

		</tr>

	<?php endforeach ?>

</table>

</body>
</html>

