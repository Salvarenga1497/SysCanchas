<?php

require_once "../../clases/Factura.php";
require_once "../../clases/Turno.php";
require_once "../../clases/Cancha.php";

$idEntidad = $_GET['id_usuario'];

$cancha = Cancha::ObtenerPorIdEntidad($idEntidad);

$idCancha = $cancha->getIdCanchas();

$listadoFactura = Factura::obtenerTodosPorIdCanchas($idCancha);



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
    <link rel="STYLESHEET" type="text/css" href="../../css/listadoSexo.css">
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

		<a href= "nuevo.php"> Nueva Factura </a>

	</div>

	<br>
	<br>

	<div class="Tabla">
		<table class="Lista">
			<caption class="titulo">Listado de Factura</caption>
				<tr class="Fila1">
						
						<th>Fecha Turno</th>
						<th>Hora Inicio del Turno</th>
						<th>Hora Fin del Turno</th>
						<th>Tipo de Pago</th>
						<th>Fecha De Emision</th>
						<th>Acciones</th>
					</tr>

					<?php foreach  ($listadoFactura as $factura): ?>

						<tr>
							<td><?php echo $factura->turno->getFecha(); ?></td>
							<td><?php echo $factura->turno->getHoraInicio(); ?></td>
							<td><?php echo $factura->turno->getHoraFin(); ?></td>
							<td><?php echo $factura->tipoPago->getDescripcion(); ?></td>
							<td><?php echo $factura->getFechaEmision(); ?></td>
							<td>
								<a href="modificar.php?id_factura=<?php echo $factura->getidFactura(); ?>&id_usuario=<?php echo $idUsuario?>"> Modificar </a>
								<a href="factura.php?id_turno=<?php echo $factura->getRelaTurnos(); ?>"> Comprobante </a>

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
