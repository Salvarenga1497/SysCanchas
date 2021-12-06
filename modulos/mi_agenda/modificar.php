<?php
require_once "../../clases/Agenda.php";
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

$id_agenda = $_GET["id_agenda"];

$id_cancha = $_GET['id_cancha'];

$id_usuario = $_GET['id_usuario'];


$agenda = Agenda::obtenerPorId($id_agenda);
$listadoCanchas = Cancha::obtenerTodasLasCanchasPorId($id_cancha);


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
    <link rel="STYLESHEET" type="text/css" href="../../css/body.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/modificarAgenda.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/mensaje.css">
</head>
<body>

	<header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

	<div>

		<?php require_once "../../menu.php";?>

	</div>
	
	<br><br>

	<div id="Principal">

	<div class="Nombre">

		<?php echo "Modificar Agenda"?>

	</div>

	<br><br>

	<div class="mensaje">

		<?php echo $mensaje; ?>

	</div>

	<br><br>

	<div class="Form">

		<form method="POST" action= "procesar_modificacion.php" class="Formulario">  
			
			<input type="hidden" name="txtIdAgenda" value="<?php echo $id_agenda; ?>">

			<input type="hidden" name="txtIdUsuario" value="<?php echo $id_usuario; ?>">

			<label for="Fecha Inicio">Fecha Inicio:</label>
			<input type="date" name= "dateFechaInicio" value="<?php echo $agenda->getFechaInicio(); ?>">
			<br><br>	

			<label for="Fecha Fin">Fecha Fin:</label>
			<input type="date" name= "dateFechaFin" value="<?php echo $agenda->getFechaFin(); ?>">
			<br><br>

			<label for="Hora Inicio">Hora Inicio:</label>
			<input type="time" name= "timeHoraInicio" value="<?php echo $agenda->getHoraInicio(); ?>" >
			<br><br>

			<label for="Hora Fin">Hora Fin:</label>
			<input type="time" name= "timeHoraFin" value="<?php echo $agenda->getHoraFin(); ?>">
			<br><br>

			<label for="Duracion">Duracion:</label>
			<input type="time" name= "timeDuracion" value="<?php echo $agenda->getDuracion(); ?>">
			<br><br>

			<label for="Canchas">Canchas:</label> 
			<select name="cboCanchas">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoCanchas as $cancha): ?>

					<?php 

					$selected = "";

						if ($cancha->getIdCanchas() == $agenda->getRelaCancha()) {
							$selected = "SELECTED";
						}
					?>
					<option <?php echo $selected; ?> value="<?php echo $cancha->getIdCanchas(); ?>">
						<?php echo $cancha->getNombre(); ?>
					</option>

				<?php endforeach?>
			</select>

			<br><br>
			
			<input class="Guardar" type="submit" name="Guardar" value="Actualizar">

		</form>

	</div>

</div>


	<div id="Pie">

		<?php require_once "../../pie.php";?>

	</div>
</body>
</html>