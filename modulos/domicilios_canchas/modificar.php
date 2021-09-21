<?php
require_once "../../clases/Domicilio.php";
require_once "../../clases/Barrio.php";
require_once "../../clases/Localidad.php";
require_once "../../clases/Provincia.php";


$listadoBarrio = Barrio::obtenerTodos();
$listadoLocalidad = Localidad::obtenerTodos();
$listadoProvincia = Provincia::obtenerTodos();

$idCancha = $_GET['id_cancha'];
$id_domicilio = $_GET["id_domicilio"];


$domicilio = Domicilio::obtenerPorId($id_domicilio);

?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery.3.6.js"></script>

	<script type="text/javascript">

	function cargarLocalidades() {
			var cboProvincias = $("#cboProvincias");
			var idProvincia = cboProvincias.val();
			$.ajax({
			method: "POST",
			url:"cargarLocalidades.php",
			data: {id: idProvincia}
			})
			.done(function(respuesta) {
                   $("#cboLocalidades").html(respuesta);
			})
			.fail(function() {
			   		alert("ERROR");
			});
		}


	function cargarBarrio() {
			var cboLocalidades = $("#cboLocalidades");
			var idLocalidad = cboLocalidades.val();
			$.ajax({
			method: "POST",
			url:"cargarBarrio.php",
			data: {id: idLocalidad}
			})
			.done(function(respuesta) {
                   $("#cboBarrio").html(respuesta);
			})
			.fail(function() {
			   		alert("ERROR");
			});
		}
</script>
</head>
<body>


	<?php require_once "../../menu.php";?>
	
	<br><br>

		<form method="POST" action= "procesar_modificacion.php">  
			
			<input type="hidden" name="txtIdCancha" value="<?php echo $idCancha; ?>">

			<input type="hidden" name="txtIdDomicilio" value="<?php echo $id_domicilio; ?>">

			Calle: <input type="text" name= "txtCalle" value="<?php echo $domicilio->getCalle(); ?>">
			<br><br>	

			Altura: <input type="text" name= "txtAltura" value="<?php echo $domicilio->getAltura(); ?>">
			<br><br>

			Sector: <input type="text" name= "txtSector" value="<?php echo $domicilio->getSector(); ?>" >
			<br><br>

			Manzana: <input type="text" name= "txtManzana" value="<?php echo $domicilio->getManzana(); ?>">
			<br><br>

			Casa: <input type="text" name= "txtCasa" value="<?php echo $domicilio->getCasa(); ?>">
			<br><br>

			Torre: <input type="text" name= "txtTorre" value="<?php echo $domicilio->getTorre(); ?>">
			<br><br>

			Piso: <input type="text" name= "txtPiso" value="<?php echo $domicilio->getPiso(); ?>">
			<br><br>

			Departamento: <input type="text" name= "txtDepartamento" value="<?php echo $domicilio->getDepartamento(); ?>">
			<br><br>

			Provincia: 
			<select name="cboProvincia" id="cboProvincias" onchange="cargarLocalidades();">
				<option value="0">--Seleccionar--</option>

				<?php foreach ($listadoProvincia as $provincia): ?>

					<?php 

					$selected = "";

						if ($provincia->getIdProvincia() == $domicilio->getRelaProvincia()) {
							$selected = "SELECTED";
						}
					?>
					<option <?php echo $selected; ?> value="<?php echo $provincia->getIdProvincia(); ?>">
						<?php echo $provincia->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>

			<br><br>

			Localidad: 
			<select name="cboLocalidad" id="cboLocalidades" onchange="cargarBarrio();">
				<option value="0">--Seleccionar--</option>

				<?php foreach ($listadoLocalidad as $localidad): ?>

					<?php 

					$selected = "";

						if ($localidad->getIdLocalidad() == $domicilio->getRelaLocalidad()) {
							$selected = "SELECTED";
						}
					?>
					<option <?php echo $selected; ?> value="<?php echo $localidad->getIdLocalidad(); ?>">
						<?php echo $localidad->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>

			<br><br>

			Barrio: 
			<select name="cboBarrio" id="cboBarrio">
				<option value="0">--Seleccionar--</option>

				<?php foreach ($listadoBarrio as $barrio): ?>

					<?php 

					$selected = "";

						if ($barrio->getIdBarrio() == $domicilio->getRelaBarrio()) {
							$selected = "SELECTED";
						}
					?>
					<option <?php echo $selected; ?> value="<?php echo $barrio->getIdBarrio(); ?>">
						<?php echo $barrio->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>

			<br><br>
			
			<input type="submit" name="Guardar" value="Actualizar">


		</form>
</body>
</html>