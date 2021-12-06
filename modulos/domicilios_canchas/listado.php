<?php

require_once "../../clases/Domicilio.php";
require_once "../../clases/Cancha.php";

$idCancha = $_GET['id_cancha'];

$idUsuario= $_GET['id_usuario'];


$listadoDomicilios = Domicilio::obtenerPorIdCanchas($idCancha);

$cancha = Cancha::obtenerPorId($idCancha);

$nombre = $cancha->getNombre();


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
	<link rel="STYLESHEET" type="text/css" href="../../css/pie.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/body.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/nuevo.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/listadoDomicilioCancha.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">
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

		<div class="Nombre">

			<?php echo "Domicilio de la Cancha: " . $nombre; ?>

		</div>

		<br>

		<div class="Nuevo">
			<a href= "nuevo.php?id_cancha=<?php echo $idCancha;?>&id_usuario=<?php echo $idUsuario;?>"> Nuevo Domicilio </a>
		</div>

		<br>
		

		<div class="Tabla">
			<table class="Lista">
				<caption class="titulo">Listado de Domicilio</caption>
				<thead>
					<tr class="Fila1">
						<th>Provincia</th>
						<th>Localidad</th>
						<th>Barrio</th>
						<th>Calle</th>
						<th>Altura</th>
						<th>Sector</th>
						<th>Manzana</th>
						<th>Casa</th>
						<th>Torre</th>
						<th>Piso</th>
						<th>Departamento</th>
						<th>Accion</th>		
					</tr>
				</thead>

				<?php foreach  ($listadoDomicilios as $domicilio): ?>

					<tbody>
						<tr>
							<td><?php echo $domicilio->barrio->localidad->provincia->getDescripcion(); ?> </td>
							<td><?php echo $domicilio->barrio->localidad->getDescripcion(); ?> </td>	
							<td><?php echo $domicilio->barrio->getDescripcion(); ?> </td>	
							<td><?php echo $domicilio->getCalle(); ?></td>
							<td><?php echo $domicilio->getAltura(); ?></td>
							<td><?php echo $domicilio->getSector(); ?></td>
							<td><?php echo $domicilio->getManzana(); ?></td>
							<td><?php echo $domicilio->getCasa(); ?></td>
							<td><?php echo $domicilio->getTorre(); ?></td>
							<td><?php echo $domicilio->getPiso(); ?></td>
							<td><?php echo $domicilio->getDepartamento(); ?></td>
							<td>
								<a href="modificar.php?id_domicilio=<?php echo $domicilio->getIdDomicilio(); ?>&id_cancha=<?php echo $domicilio->getRelaCanchas();?>&id_usuario=<?php echo $idUsuario;?>"> Modificar </a>
								<a href="eliminar.php?id_domicilio=<?php echo $domicilio->getIdDomicilio(); ?>&id_cancha=<?php echo $domicilio->getRelaCanchas();?>&id_usuario=<?php echo $idUsuario;?>"> Eliminar </a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>

		</div>

	</div>

	<div  id="Pie">

		<?php require_once "../../pie.php";?>

	</div>

</body>
</html>