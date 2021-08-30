<?php

require_once "../../clases/Canchas.php";

$lista = Cancha::obtenerTodos();

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

<a href= "nuevo.php"> Nueva Cancha </a>
<br>
<br>

<table border="1">
	<tr>
		<th>ID Canchas</th>
		<th>Nombre</th>
		<th>Estado</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $cancha): ?>

		<tr>
			
			<td><?php echo $cancha->getIdCanchas(); ?></td>
			<td><?php echo $cancha->getNombre(); ?></td>
			<td><?php echo $cancha->getEstado(); ?></td>
			<td>
				<a href="/programacion3/gestion_usuario/modulos/canchas/modificar.php?id_cancha=<?php echo $cancha->getIdCanchas(); ?>"> Modificar </a>
				<a href="/programacion3/gestion_usuario/modulos/canchas/eliminar.php?id_cancha=<?php echo $cancha->getIdCanchas(); ?>"> Eliminar </a>
			</td>

		</tr>

	<?php endforeach ?>

</table>

</body>
</html>

