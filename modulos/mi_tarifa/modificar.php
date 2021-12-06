<?php

require_once "../../clases/Cancha.php";
require_once "../../clases/Tarifa.php";
require_once "../../clases/TipoTarifa.php";
require_once "../../js/tarifa/validarComboTipo.js";
require_once "../../js/tarifa/validarComboCancha.js";
require_once "../../js/tarifa/validarMonto.js";
$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'tipo':
			$mensaje = "El tipo no debe estar vacio debe elegir una opcion";
			break;
	}

	switch ($_GET["error"]) {
		case 'cancha':
			$mensaje = "La cancha no debe estar vacio debe elegir una opcion";
			break;
	}

	switch ($_GET["error"]) {
		case 'monto':
			$mensaje = "La monto no debe estar vacio y debe tener un numero de 3 cifras";
			break;
	}

	switch ($_GET["error"]) {
		case 'horaInicio':
			$mensaje = "La Hora de Inicio no debe estar vacio";
			break;
	}

	switch ($_GET["error"]) {
		case 'horaFin':
			$mensaje = "La Hora de Fin no debe estar vacio";
			break;
	}

}

$listadoTipo = TipoTarifa::obtenerTodos();

$id_tarifa = $_GET["id_tarifa"];

$idCancha = $_GET["id_cancha"];

$cancha = Cancha::obtenerPorId($idCancha);

$nombre = $cancha->getNombre();


$idUsuario = $_GET["id_usuario"];


$tarifa = Tarifa::obtenerPorId($id_tarifa);


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
    <link rel="STYLESHEET" type="text/css" href="../../css/modificarTarifa.css">
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

		<?php echo "Modificar Tarifa de la Cancha: " . $nombre?>

	</div>

	<br><br>

	<?php echo $mensaje; ?>	
	
	<br><br>

	<div class="Form">

		<form method="POST" action= "procesar_modificacion.php" class="Formulario">  

			<input type="hidden" name="txtIdTarifa" value="<?php echo $id_tarifa; ?>">

			<input type="hidden" name="txtIdCancha" value="<?php echo $idCancha; ?>">

			<input type="hidden" name="txtUsuario" value="<?php echo $idUsuario; ?>">

			<label for="Hora Inicio">Hora Inicio:</label>
			<input type="text" name= "timeHoraInicio" value="<?php echo $tarifa->getHoraInicio(); ?>">
			<br><br>

			<label for="Hora Fin">Hora Fin:</label>
			<input type="text" name= "timeHoraFin" value="<?php echo $tarifa->getHoraFin(); ?>">
			<br><br>

			<label for="Tipo">Tipo</label>
			<select name="cboTipo" id= "cboTipo">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoTipo as $tipo): ?>

					<?php 

					$selected = "";

						if ($tipo->getIdTipoTarifa() == $tarifa->getRelaTipoTarifa()) {
							$selected = "SELECTED";
						}
					?>
					<option <?php echo $selected; ?> value="<?php echo $tipo->getIdTipoTarifa(); ?>">
						<?php echo $tipo->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>
			<br><br>

			<label for="Monto">Monto</label>
			<input type="text" name= "numMonto" value="<?php echo $tarifa->getMonto(); ?>" id="numMonto">
			<br><br>

			<input class="Guardar" type="submit" name="Guardar" value="Actualizar" onclick="validarComboTipo(); validarComboCancha(); validarMonto();">


		</form>

	</div>

</div>

	<div id="Pie">

		<?php require_once "../../pie.php";?>

	</div>
	
</body>
</html>