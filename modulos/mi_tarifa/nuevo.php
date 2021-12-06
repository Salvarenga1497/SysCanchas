<?php
require_once "../../clases/Cancha.php";
require_once "../../clases/TipoTarifa.php";

$idCancha = $_GET['id_cancha'];

$cancha = Cancha::obtenerPorId($idCancha);

$nombre = $cancha->getNombre();

$idUsuario = $_GET['id_usuario'];


$listadoTipo = TipoTarifa::obtenerTodos();

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
    <link rel="STYLESHEET" type="text/css" href="../../css/formularioNuevoTarifa.css">
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

		<?php echo "Nueva Tarifa para la cancha: " . $nombre?>

	</div>

	<br>

	


	<div class="Form">

		<form method="POST" action= "procesar.php" class="Formulario">  

			<input type="hidden" name="txtIdCancha" value="<?php echo $idCancha; ?>">

			<input type="hidden" name="txtUsuario" value="<?php echo $idUsuario; ?>">

			<label for="Hora Inicio">Hora Inicio:</label>
			<input type="time" name= "timeHoraInicio">
			<br><br>

			<label for="Hora Fin">Hora Fin:</label>
			<input type="time" name= "timeHoraFin">
			<br><br>

			<label for="Tipo">Tipo:</label>
			<select name="cboTipo" id= "cboTipo">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoTipo as $tipo): ?>

					<option value="<?php echo $tipo->getIdTipoTarifa(); ?>">
						<?php echo $tipo->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>
			<br><br>
			
			<label for="Monto">Monto:</label>
			<input type="number" name= "numMonto" id="numMonto">
			<br><br>

		
			<input class="Guardar" type="submit" name="Guardar" onclick="validarComboTipo(); validarComboCancha(); validarMonto();">


		</form>

	</div>

</div>

	<div id="Pie">

		<?php require_once "../../pie.php";?>

	</div>
	
</body>
</html>