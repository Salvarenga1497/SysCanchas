<?php

require_once "../../clases/Tarifa.php";

$idUsuario = $_GET['id_usuario'];

$cancha = Cancha::ObtenerPorIdEntidad($idUsuario);

$id_cancha=$cancha->getIdCanchas(); 

$nombre = $cancha->getNombre();

$listadoTarifa = Tarifa::obtenerPorIdCancha($id_cancha);


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

		<a href= "nuevo.php?id_cancha=<?php echo $id_cancha?>&id_usuario=<?php echo $idUsuario; ?>"> Nueva Tarifa </a>

	</div>

	<br>
	<br>

	<div class="Tabla">
		<table class="Lista">
			<caption class="titulo">Tarifas de la cancha: <?php echo $nombre?></caption>
				<tr class="Fila1">
						<th>Hora Inicio</th>
						<th>Hora Fin</th>
						<th>Tipo</th>
						<th>Monto</th>
						<th>Ultima Modificacion</th>
						<th>Acciones</th>
					</tr>

					<?php foreach  ($listadoTarifa as $tarifa): ?>

						<tr>
							<td><?php echo $tarifa->getHoraInicio(); ?></td>
							<td><?php echo $tarifa->getHoraFin(); ?></td>
							<td><?php echo $tarifa->tipo->getDescripcion();?></td>
							<td><?php echo $tarifa->getMonto(); ?></td>
							<td><?php echo $tarifa->getUltimaModificacion(); ?></td>
							<td>
								<a href="modificar.php?id_tarifa=<?php echo $tarifa->getIdTarifa();?>&id_cancha=<?php echo $id_cancha?>&id_usuario=<?php echo $idUsuario?>"> Modificar </a>
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