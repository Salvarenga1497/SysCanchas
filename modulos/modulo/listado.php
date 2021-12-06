<?php

require_once "../../clases/Modulo.php";

$lista = Modulo::obtenerTodos();
$idUsuario = $_GET['id_usuario'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>FUTLINE</title>
	<meta charset="UTF-8">
	<meta name="Author" content="Alvarenga Sebastian" >
	<meta name="description" content="Alquilar canchas de futbol">
	<meta name="keywords" content="futbol, alquilar, cancha, futbol5, formosa">
	<link rel="shortcut icon"  href="../../imagenes/logo/logoo.png">
	<link rel="STYLESHEET" type="text/css" href="../../css/menu.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/body.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/nuevo.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/listadoModulo.css">
</head>
<body>

	<header>
		<img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
	</header>

	<section>

		<?php require_once "../../menu.php";?>

	</section>

	<br>

	<div class="Nuevo">

		<a href= "nuevo.php?&id_usuario=<?php echo $idUsuario?>"> Nuevo Modulo </a>

	</div>

	<br>

	<div id="Principal">
		
		<div class="Tabla">

			<table class="Lista">
				<caption class="titulo">Listado de Modulos</caption>
				<tr class="Fila1">
					
					<th>Nombre</th>
					<th>Directorio</th>
					<th>Acciones</th>
				</tr>

				<?php foreach  ($lista as $modulo): ?>

					<tr>
						
						
						<td><?php echo $modulo->getDescripcion(); ?></td>
						<td><?php echo $modulo->getDirectorio(); ?></td>
						<td>
							<a href="modificar.php?id_modulo=<?php echo $modulo->getIdModulo(); ?>&id_usuario=<?php echo $idUsuario?>"> Modificar </a>
							<a href="eliminar.php?id_modulo=<?php echo $modulo->getIdModulo(); ?>&id_usuario=<?php echo $idUsuario?>"> Eliminar </a>
						</td>

					</tr>

				<?php endforeach ?>

			</table>

		</div>

	</div>

	<div id="Pie">

		<?php require_once "../../pie.php";?>

	</div>

</body>
</html>

