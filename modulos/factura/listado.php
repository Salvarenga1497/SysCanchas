<?php

require_once "../../clases/Factura.php";
$idUsuario = $_GET["id_usuario"];
$lista = Factura::obtenerTodos();

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
	

	<br>
	<br>

	<div class="Tabla">
		<table class="Lista">
			<caption class="titulo">Listado de Factura</caption>
				<tr class="Fila1">
						
						<th>Cancha</th>
						<th>Fecha Turno</th>
						<th>Hora Inicio del Turno</th>
						<th>Hora Fin del Turno</th>
						<th>Tipo de Pago</th>
						<th>Fecha De Emision</th>
						<th>Acciones</th>
					</tr>

					<?php foreach  ($lista as $factura): ?>

						<tr>
							<td><?php echo $factura->cancha->getNombre(); ?></td>
							<td><?php echo $factura->turno->getFecha(); ?></td>
							<td><?php echo $factura->turno->getHoraInicio(); ?></td>
							<td><?php echo $factura->turno->getHoraFin(); ?></td>
							<td><?php echo $factura->tipoPago->getDescripcion(); ?></td>
							<td><?php echo $factura->getFechaEmision(); ?></td>
							<td>
								<a href="modificar.php?id_factura=<?php echo $factura->getidFactura(); ?>&id_usuario=<?php echo $idUsuario?>"> Modificar </a>
								<a href="factura.php?id_turno=<?php echo $factura->getRelaTurnos(); ?>"> Comprobante </a>
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
