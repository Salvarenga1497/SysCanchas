<?php

require_once "../../clases/Domicilio.php";
require_once "../../clases/Canchas.php";

$idCancha = $_GET['id_cancha'];


$listadoDomicilios = Domicilio::obtenerPorIdCanchas($idCancha);

$cancha = Cancha::obtenerPorId($idCancha);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php require_once "../../menu.php";?>


<h2><?php echo $cancha; ?></h2>

<a href= "nuevo.php?id_cancha=<?php echo $idCancha;?>"> Nuevo Domicilio </a>
<br>
<br>

<table border="1">
	<tr>
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

	<?php foreach  ($listadoDomicilios as $domicilio): ?>
		<tr>
			<td><?php echo $domicilio->getRelaBarrio(); ?> </td>	
			<td><?php echo $domicilio->getCalle(); ?></td>
			<td><?php echo $domicilio->getAltura(); ?></td>
			<td><?php echo $domicilio->getSector(); ?></td>
			<td><?php echo $domicilio->getManzana(); ?></td>
			<td><?php echo $domicilio->getCasa(); ?></td>
			<td><?php echo $domicilio->getTorre(); ?></td>
			<td><?php echo $domicilio->getPiso(); ?></td>
			<td><?php echo $domicilio->getDepartamento(); ?></td>
			<td>
				<a href="modificar.php?id_domicilio=<?php echo $domicilio->getIdDomicilio(); ?>&id_cancha=<?php echo $domicilio->getRelaCanchas(); ?>"> Modificar </a>
				<a href="eliminar.php?id_domicilio=<?php echo $domicilio->getIdDomicilio(); ?>&id_cancha=<?php echo $domicilio->getRelaCanchas(); ?>"> Eliminar </a>
			</td>
		</tr>
	<?php endforeach ?>

</table>

</body>
</html>