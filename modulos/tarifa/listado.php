<?php

require_once "../../clases/Tarifa.php";

$lista = Tarifa::obtenerTodos();

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
    <link rel="STYLESHEET" type="text/css" href="../../css/listadoTarifa.css">
</head>
<body>

	<header>
	        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
	</header>

	<section>

		<?php require_once "../../menu.php";?>

	</section>

	<br>
	<br>

	<div id="Principal">

	<div class="Nuevo">

		<a href= "nuevo.php"> Nueva Tarifa </a>

	</div>

	<br>
	<br>

	<div class="Tabla">
		<table class="Lista">
			<caption class="titulo">Listado de Tarifas</caption>
				<tr class="Fila1">
						<th>CANCHA</th>
						<th>Hora Inicio</th>
						<th>Hora Fin</th>
						<th>Tipo</th>
						<th>Monto</th>
						<th>Cancha</th>
						<th>Acciones</th>
					</tr>

					<?php foreach  ($lista as $tarifa): ?>

						<tr>
							
							<td><?php echo $tarifa->cancha->getNombre(); ?></td>
							<td><?php echo $tarifa->getHoraInicio(); ?></td>
							<td><?php echo $tarifa->getHoraFin(); ?></td>
							<td><?php echo $tarifa->tipo->getDescripcion(); ?></td>
							<td><?php echo $tarifa->getMonto(); ?></td>
							<td><?php echo $tarifa->getRelaCanchas(); ?></td>
							<td>
								<a href="modificar.php?id_tarifa=<?php echo $tarifa->getIdTarifa(); ?>"> Modificar </a>
								<a href="eliminar.php?id_tarifa=<?php echo $tarifa->getIdTarifa(); ?>"> Eliminar </a>
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

