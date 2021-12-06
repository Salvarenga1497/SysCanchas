<?php
require_once "../../clases/EstadoPago.php";
require_once "../../clases/TipoPago.php";
require_once "../../clases/Turno.php";
require_once "../../clases/Factura.php";

$idFactura = $_GET["id_factura"];

$idUsuario = $_GET["id_usuario"];

$listadoEstadoPago = EstadoPago::obtenerTodos();
$listadoTipoPago = TipoPago::obtenerTodos();


$listadoTurno = Turno::ObtenerTurnosReservadosDelDia();

$factura = Factura::obtenerPorId($idFactura);
$idTurno = $factura->getRelaTurnos();

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

		<?php echo "Modificar Factura"?>

	</div>


	<br><br>

	<div class="Form">

			<form method="POST" action= "procesar_modificacion.php" class="Formulario"> 

				<input type="hidden" name="txtIdFactura" value="<?php echo $idFactura; ?>">

				<input type="hidden" name="txtIdTurno" value="<?php echo $idTurno; ?>">

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

				<label for="Modo del Pago">Modo del Pago:</label>
				<select name="cboModoPago" id="cboModoPago">
					<option value="NULL">--Seleccionar--</option>

					<?php foreach ($listadoTipoPago as $tipoPago): ?>

						<?php 

						$selected = "";

							if ($tipoPago->getIdTipoPago() == $factura->getRelaTipoPago()) {
								$selected = "SELECTED";
							}
						?>
						<option <?php echo $selected; ?> value="<?php echo $tipoPago->getIdTipoPago(); ?>">
							<?php echo $tipoPago->getDescripcion(); ?>				
						</option>

					<?php endforeach?>
				</select>	

				<br><br>

				<label for="Estado del Pago">Estado del Pago:</label>
				<select name="cboEstadoPago" id="cboEstadoPago">
					<option value="NULL">--Seleccionar--</option>

					<?php foreach ($listadoEstadoPago as $estadoPago): ?>

						<?php 

						$selected = "";

							if ($estadoPago->getIdEstadoPago() == $factura->getRelaEstadoPago()) {
								$selected = "SELECTED";
							}
						?>
						<option <?php echo $selected; ?> value="<?php echo $estadoPago->getIdEstadoPago(); ?>">
							<?php echo $estadoPago->getDescripcion(); ?>				
						</option>

					<?php endforeach?>
				</select>	

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