<?php
require_once "../../clases/Cancha.php";
require_once "../../clases/Turno.php";

$id_turno = $_GET["id_turno"];
$id_cancha = $_GET["id_cancha"];
$id_usuario = $_GET["id_usuario"];

$dateFecha = $_GET["DateFecha"];

$cancha = Cancha::obtenerPorId($id_cancha);

$nombre = $cancha->getNombre(); 
$turno = Turno::obtenerPorId($id_turno);

$listadoTurnos = Turno::obtenerTodosLosTurnosLibres($id_cancha);


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
    <link rel="STYLESHEET" type="text/css" href="../../css/pie.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/body.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/mensaje.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/asignarTurno.css">
	<script type="text/javascript" src="jquery.3.6.js"></script>
	<script type="text/javascript">

   


		function cargarHorariosLibres() {
				
				var cboFechas = $("#cboFechas");
				var cboFechas = cboFechas.val();
		
				$.ajax({
				method: "POST",
				url:"cargarHorariosLibres.php",
				data: {cboFechas:cboFechas}
				})
				.done(function(respuesta) {
	                   $("#cboHorarios").html(respuesta);
				})
				.fail(function() {
				   		alert("ERROR");
				});
			}
</script>
</head>

<body>

	

	<header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

	<div>

		<?php require_once "../../menu.php";?>

	</div>

	<br><br>

	<div class="Nombre">

		<?php echo "Reprogramar Turno para la cancha: " . $nombre?>

	</div>
	
	<br><br>

	<div id="Principal">

		<div class="Form">

			<form method="POST" action= "procesar_reprogramacion.php" class="Formulario">  
			
				<input type="hidden" name="txtIdTurno" value="<?php echo $id_turno; ?>">

				<input type="hidden" name= "txtUsuario" value="<?php echo $id_usuario; ?>">

				<input type="hidden" name= "txtCancha" value="<?php echo $id_cancha; ?>">
				<input type="hidden" name= "DateFecha" value="<?php echo $dateFecha; ?>">
				

				<label for="Fecha">Fecha:</label>
				<input type="date" name= "dateFecha" value="<?php echo $turno->getFecha(); ?>" readonly>
				<br><br>

				<label for="Hora Inicio">Hora Inicio:</label>
				<input type="time" name= "timeHoraInicio" value="<?php echo $turno->getHoraInicio(); ?>" readonly>
				<br><br>

				<label for="Hora Fin">Hora Fin:</label>
				<input type="time" name= "timeHoraFin" value="<?php echo $turno->getHoraFin(); ?>" readonly>
				<br><br>

				<label for="Fechas">Fechas Libres:</label>  
				<select name="cboFechas" id="cboFechas" onchange="cargarHorariosLibres();">
					<option value="NULL">--Seleccionar--</option>

						<?php foreach ($listadoTurnos as $turno): ?>

							<option value="<?php echo $turno->getIdTurno()?>">
								<?php echo $turno->getFecha(); ?>
							</option>

						<?php endforeach?>
					</select>

				<label for="Horarios">Horarios Libres:</label>
				<select name="cboHorarios" id="cboHorarios">
					<option value=0>--Seleccionar--</option>
				</select>

				<input class="Guardar" type="submit" name="Guardar" value="Actualizar">


			</form>

		</div>

	</div>

	<div  id="Pie">

		<?php require_once "../../pie.php";?>

	</div>
</body>
</html>