<?php 
require_once "../../clases/Cancha.php";
$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'fechaInicio':
		$mensaje = "La fecha de Inicio no debe estar vacio debe elegir una opcion";
		break;
	}

	switch ($_GET["error"]) {
		case 'fechaFin':
		$mensaje = "La Fecha de Fin no debe estar vacio debe elegir una opcion";
		break;
	}

	switch ($_GET["error"]) {
		case 'horaInicio':
		$mensaje = "La Hora de Inicio no debe estar vacio debe elegir una opcion";
		break;
	}

	switch ($_GET["error"]) {
		case 'horaFin':
		$mensaje = "La Hora de Fin no debe estar vacio debe elegir una opcion";
		break;
	}

	switch ($_GET["error"]) {
		case 'duracion':
		$mensaje = "La Duracion no debe estar vacio debe elegir una opcion";
		break;
	}

}

$idUsuario = $_GET["id_usuario"];
$listadoCanchas = Cancha::obtenerTodoss();


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
	<script type="text/javascript" src="../../js/agenda/validar_agenda.js"></script>
	<script type="text/javascript" src = "../../js/usuario/sweetalert.js " > </script>
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

			<?php echo "Nueva Agenda"?>

		</div>

		<br>

		<div class="mensaje">

			<?php echo $mensaje; ?>	

		</div>

		<br>

		<div class="Form">

			<form method="POST" action= "procesar.php" class="Formulario" id="FormularioAgenda"> 

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>"> 

				<label for="Fecha Inicio">Fecha Inicio:</label>
				<input type="date" name= "dateFechaInicio" id="dateFechaInicio">
				<br><br>

				<label for="Fecha Fin">Fecha Fin:</label>
				<input type="date" name= "dateFechaFin" id="dateFechaFin">
				<br><br>

				<label for="Hora Inicio">Hora Inicio:</label>
				<input type="time" name= "timeHoraInicio" id="timeHoraInicio">
				<br><br>

				<label for="Hora Fin">Hora Fin:</label>
				<input type="time" name= "timeHoraFin" id="timeHoraFin">
				<br><br>

				<label for="Duracion">Duracion:</label>
				<input type="time" name= "timeDuracion" id="timeDuracion">

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

				<input class="Guardar" type="submit" value="Guardar" onclick="validarAgenda('dateFechaInicio','dateFechaFin','timeHoraInicio','timeHoraFin') ">

			</form>
		</div>
	</div>
	
	<div id="Pie">

		<?php require_once "../../pie.php";?>

	</div>

</body>
</html>