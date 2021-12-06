<?php

require_once "../../clases/Cancha.php";

if (isset($_GET["cboFiltro"])){
	$filtroEstado = $_GET["cboFiltro"];
}else {
	$filtroEstado = "";
}

if (isset($_GET["txtNombre"])){
	$filtroNombre= $_GET["txtNombre"];
}else {
	$filtroNombre = "";
}



$lista = Cancha::obtenerTodos($filtroEstado,$filtroNombre);

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
	<link rel="STYLESHEET" type="text/css" href="../../css/listadoCanchas.css">
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

			<a href= "nuevo.php?id_usuario=<?php echo $idUsuario?>" > Nueva Cancha </a>

		</div>
		<br>

		<section class="Filtar">
			<form method="GET">

				<input type="hidden" name="id_usuario" value="<?php echo $idUsuario; ?>">

				<select name="cboFiltro">
					<option value="0">Todos</option>
					<option value="1">Activos</option>
					<option value="2">Inactivos</option>
				</select>

				<label id="Buscar">Nombre:</label>
				
				<input  type="text" name="txtNombre" id="Input">

				

				<input type="submit" name="Filtrar" value="Filtrar" id="Boton">
			</form>
		</section>

		<br>
		<br>

		<div class="Tabla">

			<table class="Lista">
				<caption class="titulo">Listado de Canchas</caption>
				<thead>
					<tr class="Fila1">
						<th>Nombre</th>
						<th>Estado</th>
						<th>Domicilios</th>
						<th>Turnos</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<?php foreach  ($lista as $cancha): ?>

					<tbody>
						<tr>
							<td><?php echo $cancha->getNombre(); ?></td>
							<?php $cancha->getEstado(); ?>
							<?php if ($cancha->getEstado() == 1) {?>
								<td> Alta</td>
							<?php }else{ ?>
								<td> Baja</td>
								<?php } ?>
							<td>
								<a href="../domicilios_canchas/listado.php?id_cancha=<?php echo $cancha->getIdCanchas();?>&id_usuario=<?php echo $idUsuario?>">
									Ver
								</a>
							</td>
							<td>
								<a href="../turno/listado.php?id_cancha=<?php echo $cancha->getIdCanchas(); ?>&id_usuario=<?php echo $idUsuario?>">
									Ver
								</a>
							</td>
							<td>
								<a href="/programacion3/FutNet/backend/gestion_usuario/modulos/canchas/modificar.php?id_cancha=<?php echo $cancha->getIdCanchas(); ?>&id_usuario=<?php echo $idUsuario?>"> Modificar </a>
								<?php $cancha->getEstado(); ?>
								<?php if ($cancha->getEstado() == 1) {?>
								<a href="/programacion3/FutNet/backend/gestion_usuario/modulos/canchas/eliminar.php?id_cancha=<?php echo $cancha->getIdCanchas(); ?>&id_usuario=<?php echo $idUsuario?>"> Eliminar </a>
								<?php } ?>
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

