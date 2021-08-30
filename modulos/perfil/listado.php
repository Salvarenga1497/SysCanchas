<?php

require_once "../../clases/Perfil.php";

$lista = Perfil::obtenerTodos();

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

<a href= "nuevo.php"> Nuevo Perfil </a>
<br>
<br>

<table border="1">
	<tr>
		<th>ID Perfil</th>
		<th>Nombre</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $perfil): ?>

		<tr>
			
			<td><?php echo $perfil->getIdPerfil(); ?></td>
			<td><?php echo $perfil->getDescripcion(); ?></td>
			<td>
				<a href="modificar.php?id_perfil=<?php echo $perfil->getIdPerfil(); ?>"> Modificar </a>
				<a href="eliminar.php?id_perfil=<?php echo $perfil->getIdPerfil(); ?>"> Eliminar </a>
			</td>

		</tr>

	<?php endforeach ?>

</table>

</body>
</html>

