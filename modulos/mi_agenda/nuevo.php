<?php 
require_once "../../clases/Cancha.php";

$id_cancha = $_GET['id_cancha'];

$cancha = Cancha::obtenerPorId($id_cancha);

$idUsuario = $_GET['id_usuario'];

$listadoCanchas = Cancha::obtenerTodasLasCanchasPorId($id_cancha);

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
	<link rel="shortcut icon" href="../../imagenes/logo/logoo.png">
	<link rel="STYLESHEET" type="text/css" href="../../css/menu.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/formularioNuevoAgenda.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/body.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/mensaje.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">
</head>
<body>

	<header>
		<img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
	</header>

	<div>

		<?php require_once "../../menu.php";?>

	</div>
	
	<br>

	<div id="Principal">

		<div class="Nombre">

			<?php echo "Nueva Agenda para la Cancha: " . $nombre?>

		</div>

		<br>

		

		<br>

		<div class="Form">

			<form method="POST" action= "procesar.php" class="Formulario">  

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

				<input type="hidden" name="txtIdCancha" value="<?php echo $id_cancha; ?>">

				<label for="Fecha Inicio">Fecha Inicio:</label>
				<input type="date" name= "dateFechaInicio">
				<br><br>

				<label for="Fecha Fin">Fecha Fin:</label>
				<input type="date" name= "dateFechaFin">
				<br><br>

				<label for="Hora Inicio">Hora Inicio:</label>
				<input type="time" name= "timeHoraInicio">
				<br><br>

				<label for="Hora Fin">Hora Fin:</label>
				<input type="time" name= "timeHoraFin">
				<br><br>

				<label for="Duracion">Duracion:</label>
				<input type="time" name= "timeDuracion">

				<br><br>

				<label for="Canchas">Canchas:</label> 
				<select name="cboCanchas" id="cboCanchas">
					<option value="NULL">--Seleccionar--</option>

					<?php foreach ($listadoCanchas as $cancha): ?>

						<option value="<?php echo $cancha->getIdCanchas(); ?>">
							<?php echo $cancha->getNombre(); ?>
						</option>

					<?php endforeach?>
				</select>
				<br><br>

				<input class="Guardar" type="submit" name="Guardar" value="Guardar">

			</form>
		</div>
	</div>
	
	<div id="Pie">

		<?php require_once "../../pie.php";?>

	</div>

</body>
</html>