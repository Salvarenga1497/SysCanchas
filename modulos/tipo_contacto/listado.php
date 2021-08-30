<?php

require_once "../../clases/TipoContacto.php";

$lista = TipoContacto::obtenerTodos();

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

<a href= "nuevo.php"> Nuevo Tipo de Contacto </a>
<br>
<br>

<table border="1">
	<tr>
		<th>ID</th>
		<th>Descripcion</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $tipoContacto): ?>

		<tr>
			
			<td><?php echo $tipoContacto->getIdTipoContacto(); ?></td>
			<td><?php echo $tipoContacto->getDescripcion(); ?></td>
			<td>
				<a href="eliminar.php?id_tipo_contacto=<?php echo $tipoContacto->getIdTipoContacto(); ?>"> Eliminar </a>
			</td>

		</tr>

	<?php endforeach ?>

</table>

</body>
</html>
