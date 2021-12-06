<?php
require_once "../../clases/Usuario.php";
require_once "../../clases/Cancha.php";
require_once "../../clases/Turno.php";

$listadoUsuarios = Usuario::obtenerTodoss();

$id_turno = $_GET["id_turno"];

$idUsuario = $_GET["id_usuario"];

$idCancha = $_GET["id_cancha"];

$cancha = Cancha::obtenerPorId($idCancha);

$nombre = $cancha->getNombre();


$turno = Turno::obtenerPorId($id_turno);

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

		<?php require_once "../../menu.php";?>

	</div>

	<br><br>

	<div class="Nombre">

		<?php echo "Asignar Turno para la Cancha: " . $nombre?>

	</div>
	
	<br><br>

	<div id="Principal">

		<div class="Form">

			<form method="POST" action= "procesar_modificacion.php" class="Formulario">  
			
				<input type="hidden" name="txtIdTurno" value="<?php echo $id_turno; ?>">

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

				<input type="hidden" name= "txtCancha" value="<?php echo $turno->getRelaCancha(); ?>" readonly>
			

				<label for="Usuario">Usuario:</label>  
				<select name="cboUsuario" id="cboUsuario">
					<option value="NULL">--Seleccionar--</option>

					<?php foreach ($listadoUsuarios as $user): ?>

						<?php 

						$selected = "";

								echo $user->getRelaEntidades();
								echo "<br>";
								echo $turno->getRelaEntidad();
								echo "<br>";

							if ($user->getRelaEntidades() == $turno->getRelaEntidad()) {
								$selected = "SELECTED";
							}
						    ?>
						<option <?php echo $selected; ?> value="<?php echo $user->getIdUsuario(); ?>">
							<?php echo $user->getUserName(); ?>
						</option>

					<?php endforeach?>
				</select>

				<br><br>

				<label for="Fecha">Fecha:</label>
				<input type="date" name= "dateFecha" value="<?php echo $turno->getFecha(); ?>" readonly>
				<br><br>

				<label for="Hora Inicio">Hora Inicio:</label>
				<input type="time" name= "timeHoraInicio" value="<?php echo $turno->getHoraInicio(); ?>" readonly>
				<br><br>

				<label for="Hora Fin">Hora Fin:</label>
				<input type="time" name= "timeHoraFin" value="<?php echo $turno->getHoraFin(); ?>" readonly>
				<br><br>

				<input class="Guardar" type="submit" name="Guardar" value="Asignar">


			</form>

		</div>

	</div>

	<div  id="Pie">

		<?php require_once "../../pie.php";?>

	</div>
</body>
</html>