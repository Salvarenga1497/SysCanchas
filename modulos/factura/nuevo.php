<?php  
require_once "../../clases/EstadoPago.php";
require_once "../../clases/TipoPago.php";
require_once "../../clases/Turno.php";

$idTurno = $_GET['id_turno'];

$idCancha = $_GET['id_cancha'];

$fecha = $_GET['DateFecha'];


$idUsuario = $_GET['id_usuario'];


$listadoEstadoPago = EstadoPago::obtenerTodos();
$listadoTipoPago = TipoPago::obtenerTodos();


$turno = Turno::obtenerPorId($idTurno);

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
	<link rel="STYLESHEET" type="text/css" href="../../css/FormularioNuevoSexo.css">
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
	
	<br><br>

	<div id="Principal">

		<div class="Nombre">

			<?php echo "Nueva Factura"?>

		</div>

		<br><br>

		<div class="Form">

			<form method="POST" action= "procesar.php" class="Formulario"> 

				<input type="hidden" name="txtIdTurno" value="<?php echo $idTurno; ?>">

				<input type="hidden" name="txtIdCancha" value="<?php echo $idCancha; ?>">

				<input type="hidden" name="txtIdFecha" value="<?php echo $fecha; ?>">

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

				<label for="Turno">Turno:</label>
				<input type="date" name= "dateFecha" value="<?php echo $turno->getFecha();?>" readonly>
				<br><br>

				<label for="Hora Inicio">Hora Inicio:</label>
				<input type="dateTime" name= "timeHoraInicio" value="<?php echo $turno->getHoraInicio();?>" readonly>
				<br><br>

				<label for="Hora Inicio">Hora Fin:</label>
				<input type="dateTime" name= "timeHoraFin" value="<?php echo $turno->getHoraFin();?>" readonly>
				<br><br>

				<label for="Modo del Pago">Modo del Pago:</label>
				<select name="cboModoPago" id="cboModoPago">
					<option value="NULL">--Seleccionar--</option>

					<?php foreach ($listadoTipoPago as $tipoPago): ?>

						<option value="<?php echo $tipoPago->getIdTipoPago(); ?>">
							<?php echo $tipoPago->getDescripcion(); ?>
						</option>

					<?php endforeach?>
				</select>	

				<br><br>


				<br><br>

				<input class="Guardar" type="submit" value="Guardar">
			</form>

		</div>

	</div>

	<div  id="Pie">

		<?php require_once "../../pie.php";?>

	</div>
</body>
</html>