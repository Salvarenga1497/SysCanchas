<?php

require_once "../../clases/Perfil.php";

$lista = Perfil::obtenerTodos();
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
	<link rel="STYLESHEET" type="text/css" href="../../css/listadoPerfil.css">

</head>
<body>

	<header>
		<img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
	</header>

	<section>

		<?php require_once "../../menu.php";?>

	</section>

	<br>

	<div id="Principal">

		<div class="Nuevo">

			<a href= "nuevo.php?&id_usuario=<?php echo $idUsuario?>"> Nuevo Perfil </a>

		</div>

		<br>

		<div class="Tabla">
			<table class="Lista">
				<caption class="titulo">Listado de Perfiles</caption>
				<tr class="Fila1">
					
					<th>Nombre</th>
					<th>Acciones</th>
				</tr>

				<?php foreach  ($lista as $perfil): ?>

					<tr>
						
						
						<td><?php echo $perfil->getDescripcion(); ?></td>
						<td>
							<a href="modificar.php?id_perfil=<?php echo $perfil->getIdPerfil(); ?>&id_usuario=<?php echo $idUsuario?>"> Modificar </a>
							<a href="eliminar.php?id_perfil=<?php echo $perfil->getIdPerfil(); ?>&id_usuario=<?php echo $idUsuario?>"> Eliminar </a>
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

