<?php

require_once "../../clases/Domicilio.php";
require_once "../../clases/Usuario.php";

$idEntidad = $_GET['id_entidad'];
$idUsuario = $_GET['id_usuario'];
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
	<title>FUTLINE</title>
	<meta charset="UTF-8">
	<meta name="Author" content="Alvarenga Sebastian" >
	<meta name="description" content="Alquilar canchas de futbol">
	<meta name="keywords" content="futbol, alquilar, cancha, futbol5, formosa">
	<link rel="shortcut icon"  href="../../imagenes/logo/logoo.png">
	<link rel="STYLESHEET" type="text/css" href="../../css/menu.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/body.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/nuevo.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/listadoDomicilioUsuario.css">
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

			<?php echo "Usuario: " . $usuarios; ?>

		</div>

		
		<div class="Nuevo">
			<a href= "nuevo.php?id_entidad=<?php echo $idEntidad;?>&id_usuario=<?php echo $idUsuario?>&modulo=usuarios "> Nuevo Domicilio </a>
		</div>

		<br>
		<br>

		<div class="Tabla">
			<table class="Lista">
				<caption class="titulo">Listado de Domicilio</caption>
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

				<?php foreach  ($listadoDomicilios as $domicilio): ?>
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
							<a href="modificar.php?id_domicilio=<?php echo $domicilio->getIdDomicilio(); ?>&id_entidad=<?php echo $domicilio->getRelaEntidad(); ?>&id_usuario=<?php echo $idUsuario?>"> Modificar </a>
							<a href="eliminar.php?id_domicilio=<?php echo $domicilio->getIdDomicilio(); ?>&id_entidad=<?php echo $domicilio->getRelaEntidad(); ?>&id_usuario=<?php echo $idUsuario?>"> Eliminar </a>
						</td>
					</tr>
				<?php endforeach ?>

			</table>
			
		</div>

	</div>

	<div  id="Pie">

		<?php require_once "../../pie.php";?>

	</div>

</body>
</html>



