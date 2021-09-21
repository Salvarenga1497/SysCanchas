<?php

require_once "../../clases/Domicilio.php";
require_once "../../clases/Usuario.php";

$idEntidad = $_GET['id_entidad'];
$modulo = $_GET['modulo'];


switch ($modulo) {
	case 'usuarios':
		$usuarios = Usuario::obtenerPorIdEntidad($idEntidad);
		break;

	case 'clientes':
		echo "viene de clientes";
		exit;
		break;
	
	default:
		echo "modulo no valido";
		exit;
}


$listadoDomicilios = Domicilio::obtenerPorIdEntidad($idEntidad);


?>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

<?php require_once "../../menu.php";?>


<h2><?php echo $usuarios; ?></h2>

<a href= "nuevo.php?id_entidad=<?php echo $idEntidad;?>&modulo=usuarios "> Nuevo Domicilio </a>
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
				<a href="modificar.php?id_domicilio=<?php echo $domicilio->getIdDomicilio(); ?>&id_entidad=<?php echo $domicilio->getRelaEntidad(); ?>"> Modificar </a>
				<a href="eliminar.php?id_domicilio=<?php echo $domicilio->getIdDomicilio(); ?>&id_entidad=<?php echo $domicilio->getRelaEntidad(); ?>"> Eliminar </a>
			</td>
		</tr>
	<?php endforeach ?>

</table>

</body>
</html>



