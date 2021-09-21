<?php

require_once "../../clases/Sexo.php";

$lista = Sexo::obtenerTodos();

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

<a href= "nuevo.php"> Nuevo Sexo </a>
<br>
<br>

<table border="1">
	<tr>
		<th>ID</th>
		<th>Descripcion</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $sexo): ?>

		<tr>
			
			<td><?php echo $sexo->getIdSexo(); ?></td>
			<td><?php echo $sexo->getDescripcion(); ?></td>
			<td>
				<a href="eliminar.php?id_sexo=<?php echo $sexo->getIdSexo(); ?>"> Eliminar </a>
			</td>

		</tr>

	<?php endforeach ?>

</table>

</body>
</html>
