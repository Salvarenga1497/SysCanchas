<?php
require_once "../../clases/Usuario.php";
require_once "../../clases/Cancha.php";
require_once "../../clases/Turno.php";

$id_turno = $_GET["id_turno"];

$idUsuario = $_GET["id_usuario"];



$turno = Turno::obtenerPorId($id_turno);
$idCancha = $turno->getRelaCancha();
$cancha = Cancha::Obtenerporid($idCancha);
$nombreCancha = $cancha->getNombre();


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
</head>

<body>

	<header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

	<div>

		<?php require_once "../../menu2.php";?>

	</div>

	<br><br>

	<div class="Nombre">

		<?php echo "Confirmar Turno en la cancha: " . $nombreCancha?>

	</div>
	
	<br><br>

	<div id="Principal">

		<div class="Form">

			<form method="POST" action= "procesar_reserva.php" class="Formulario">  
			
				<input type="hidden" name="txtIdTurno" value="<?php echo $id_turno; ?>">

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

				<input type="hidden" name="txtIdCancha" value="<?php echo $idCancha; ?>">

				<label for="Fecha">Fecha:</label>
				<input type="date" name= "dateFecha" value="<?php echo $turno->getFecha(); ?>" readonly>
				<br><br>

				<label for="Hora Inicio">Hora Inicio:</label>
				<input type="time" name= "timeHoraInicio" value="<?php echo $turno->getHoraInicio(); ?>" readonly>
				<br><br>

				<label for="Hora Fin">Hora Fin:</label>
				<input type="time" name= "timeHoraFin" value="<?php echo $turno->getHoraFin(); ?>" readonly>
				<br><br>

				<input class="Guardar" type="submit" name="Guardar" value="Reservar">


			</form>

		</div>

	</div>

	<div  id="Pie">

		<?php require_once "../../pie.php";?>

	</div>
</body>
</html>