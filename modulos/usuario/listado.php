<?php

require_once "../../clases/Usuario.php";

$lista = Usuario::obtenerTodos();

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

<a href= "nuevo.php"> Nuevo Usuario </a>
<br>
<br>

<table border="1">
	<tr>
		<th>ID Usuario</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Username</th>
		<th>Fecha Nacimiento</th>
		<th>Documento</th>
		<th>Tipo</th>
		<th>Contacto</th>
		<th>Domicilios</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $usuario): ?>

		<tr>
			
			<td><?php echo $usuario->getIdUsuario(); ?></td>
			<td><?php echo $usuario->getNombre(); ?></td>
			<td><?php echo $usuario->getApellido(); ?></td>
			<td><?php echo $usuario->getUserName(); ?></td>
			<td><?php echo $usuario->getFechaNacimiento(); ?></td>
			<td><?php echo $usuario->getDocumento(); ?></td>
			<td><?php echo $usuario->getRelaTipo(); ?></td>
			<td>
				<a href="../contacto/contacto.php?id_entidad=<?php echo $usuario->getRelaEntidades(); ?>"> Ver </a>
			</td>
			<td>
				<a href="../domicilios/listado.php?id_entidad=<?php echo $usuario->getRelaEntidades(); ?>&modulo=usuarios">
					Ver
				</a>
			</td>			
			<td>
				<a href="modificar.php?id_usuario=<?php echo $usuario->getIdUsuario(); ?>"> Modificar </a>
				<a href="eliminar.php?id_usuario=<?php echo $usuario->getIdUsuario(); ?>"> Eliminar </a>
			</td>

		</tr>

	<?php endforeach ?>

</table>

</body>
</html>

