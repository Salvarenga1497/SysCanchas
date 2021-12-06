<?php
require_once "../../clases/Turno.php";
require_once "../../clases/Cancha.php";
require_once "../../clases/Usuario.php";

$idCancha = $_GET['id_cancha'];

$idUsuario = $_GET['id_usuario'];

if (isset($_GET["DateFecha"])){
	$filtroFecha = $_GET["DateFecha"];
}else {
	$filtroFecha = "";
}

$listadoTurno = Turno::obtenerPorIdCanchas($idCancha,$filtroFecha);


$cancha = Cancha::obtenerPorId($idCancha);

$idUsuario = $cancha->getRelaEntidades();

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
    <link rel="STYLESHEET" type="text/css" href="../../css/listadoTurno.css">
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


	<section class="Filtar">
		<form method="GET">

			<input type="hidden" name="id_cancha" value="<?php echo $idCancha; ?>">
			<input type="hidden" name="id_usuario" value="<?php echo $idUsuario; ?>">

			<label for="Fecha" id="Buscar">Buscar por Fecha:</label>
				<input type="date" name= "DateFecha" id="Input">

			<input type="submit" value="Filtrar" id="Boton">
		</form>
	</section>
	<br>

	
	<br>

	<div id="Principal">

		<div class="Tabla">
			<table class="Lista">
				<caption class="titulo">Agenda de Turnos de la cancha <?php echo $nombre?></caption>
					<tr class="Fila1">
						<th>Cliente</th>
						<th>Fecha</th>
						<th>Hora Inicio</th>
						<th>Hora Fin</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>

					<?php foreach  ($listadoTurno as $turno): ?>

						<tr>
							<?php if (!is_null($turno->usuario)): ?>	
								<td><?php echo $turno->usuario->getNombre()?> <?php echo $turno->usuario->getApellido()?></td>
							<?php else:?>
								<td> </td>
							<?php endif ?>
							<td><?php echo $turno->getFecha(); ?></td>
							<td><?php echo $turno->getHoraInicio(); ?></td>
							<td><?php echo $turno->getHoraFin(); ?></td>
							<td><?php echo $turno->getEstado(); ?></td>
							<td>
								<?php $turno->getEstado(); ?>
								<?php if ($turno->getEstado() == 'Libre') {?>
								<a href="/programacion3/FutNet/backend/gestion_usuario/modulos/turno/asignar.php?id_turno=<?php echo $turno->getIdTurno();?>&id_usuario=<?php echo $idUsuario ?>&id_cancha=<?php echo $idCancha ?>"> Asignar Turno </a>
								<?php } ?>
								<?php $turno->getEstado(); ?>
								<?php if ($turno->getEstado() == 'Reservado') {?>
								<a href="/programacion3/FutNet/backend/gestion_usuario/modulos/turno/reprogramar.php?id_turno=<?php echo $turno->getIdTurno();?>&id_cancha=<?php echo $turno->getRelaCancha(); ?>&id_usuario=<?php echo $turno->getRelaEntidad();?>&DateFecha=<?php echo $turno->getFecha();?>"> Reprogramar Turno </a>
								<a href="/programacion3/FutNet/backend/gestion_usuario/modulos/turno/eliminar.php?id_turno=<?php echo $turno->getIdTurno(); ?>&id_cancha=<?php echo $turno->getRelaCancha(); ?>&id_usuario=<?php echo $turno->getRelaEntidad();?>&DateFecha=<?php echo $turno->getFecha();?>"> Cancelar Turno </a>
								<a href="/programacion3/FutNet/backend/gestion_usuario/modulos/factura/nuevo.php?id_turno=<?php echo $turno->getIdTurno();?>&id_cancha=<?php echo $turno->getRelaCancha(); ?>&id_usuario=<?php echo $turno->getRelaEntidad(); ?>&DateFecha=<?php echo $turno->getFecha();?>"> Pagar </a>
								<?php } ?>
								<?php $turno->getEstado(); ?>
								<?php if ($turno->getEstado() == 'Pagado') {?>
									<a href="/programacion3/FutNet/backend/gestion_usuario/modulos/factura/factura.php?id_turno=<?php echo $turno->getIdTurno();?>&id_cancha=<?php echo $turno->getRelaCancha(); ?>"> Comprobante </a>
								<?php } ?>
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