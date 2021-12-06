<?php

require_once "../../clases/Agenda.php";

$idUsuario = $_GET["id_usuario"];
$lista = Agenda::obtenerTodos();



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="Author" content="Alvarenga Sebastian" >
	<meta name="description" content="Alquilar canchas de futbol">
	<meta name="keywords" content="futbol, alquilar, cancha, futbol5, formosa">
	<link rel="shortcut icon"  href="../../imagenes/logo/logoo.png">
	<link rel="STYLESHEET" type="text/css" href="../../css/menu.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/agenda.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/body.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/nuevo.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/listadoAgenda.css">
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

			<a href= "nuevo.php?id_usuario=<?php echo $idUsuario?>"> Nueva Agenda </a>
		</div>
		<br>
		<br>

		<div class="Tabla">

			<table table class="Lista">
				<caption class="titulo">Listado de Canchas</caption>
				<tr class="Fila1">
					<th>Cancha</th>
					<th>Fecha Inicio</th>
					<th>Fecha Fin</th>
					<th>Hora Inicio</th>
					<th>Hora Fin</th>
					<th>Duracion</th>
					<th>Dias</th>
					<th>Turnos</th>
					<th>Acciones</th>
				</tr>

				<?php foreach  ($lista as $agenda): ?>

					<tr>
						<td><?php echo $agenda->cancha->getNombre(); ?></td>
						<td><?php echo $agenda->getFechaInicio(); ?></td>
						<td><?php echo $agenda->getFechaFin(); ?></td>
						<td><?php echo $agenda->getHoraInicio(); ?></td>
						<td><?php echo $agenda->getHoraFin(); ?></td>
						<td><?php echo $agenda->getDuracion(); ?></td>
						<?php $agenda->getGenerado(); ?>
						<?php if ($agenda->getGenerado() == 1) {?>
							<td>
								<a href="../dia/nuevo.php?id_agenda=<?php echo $agenda->getIdAgenda(); ?>&id_usuario=<?php echo $idUsuario?>"> Ver </a>
							</td>				
							<td>
								<a href="../turno/procesar.php?id_cancha=<?php echo $agenda->getRelaCancha();?>&id_agenda=<?php echo $agenda->getIdAgenda(); ?>&id_usuario=<?php echo $idUsuario?>">Generar Turnos</a>
							</td>
							<td>
								<a href="modificar.php?id_agenda=<?php echo $agenda->getIdAgenda(); ?>&id_usuario=<?php echo $idUsuario?>"> Modificar </a>
								<a href="eliminar.php?id_agenda=<?php echo $agenda->getIdAgenda(); ?>&id_usuario=<?php echo $idUsuario?>"> Eliminar </a>
							</td>
						<?php } ?>

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

