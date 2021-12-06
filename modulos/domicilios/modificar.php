<?php
require_once "../../clases/Domicilio.php";
require_once "../../clases/Barrio.php";
require_once "../../clases/Localidad.php";
require_once "../../clases/Provincia.php";


$listadoBarrio = Barrio::obtenerTodos();
$listadoLocalidad = Localidad::obtenerTodos();
$listadoProvincia = Provincia::obtenerTodos();

$idEntidad = $_GET['id_entidad'];
$id_domicilio = $_GET["id_domicilio"];
$idUsuario = $_GET['id_usuario'];



$domicilio = Domicilio::obtenerPorId($id_domicilio);

?>
<!DOCTYPE html>
<html>
<head>
	<title>FUTLINE</title>
    <meta charset="UTF-8">
    <meta name="Author" content="Alvarenga Sebastian" >
    <meta name="description" content="Alquilar canchas de futbol">
    <meta name="keywords" content="futbol, alquilar, cancha, futbol5, formosa">
    <link rel="shortcut icon"  href="../../imagenes/logo/logoo.png">
    <link rel="STYLESHEET" type="text/css" href="../../css/menu.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/pie.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/body.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/formularioNuevoDomicilio.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">
    
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

	<header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

	<section>

		<?php require_once "../../menu.php";?>

	</section>

	<br><br>

	<div id="Principal">

		<div class="Nombre">

			<?php echo "Modificar domicilio"?>

		</div>
		
		<br><br>

		<div class="Form">

			<form method="POST" action= "procesar_modificacion.php" class="Formulario">  
				
				<input type="hidden" name="txtIdEntidad" value="<?php echo $idEntidad; ?>">

				<input type="hidden" name="txtIdDomicilio" value="<?php echo $id_domicilio; ?>">

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

				<label for="Calle">Calle:</label>
				<input type="text" name= "txtCalle" value="<?php echo $domicilio->getCalle(); ?>">
					

				<label for="Altura:">Altura:</label>
				<input type="text" name= "txtAltura" value="<?php echo $domicilio->getAltura(); ?>">
				<br><br>

				<label for="Sector:">Sector:</label>
				<input type="text" name= "txtSector" value="<?php echo $domicilio->getSector(); ?>" >
				

				<label for="Manzana:">Manzana:</label>
				<input type="text" name= "txtManzana" value="<?php echo $domicilio->getManzana(); ?>">
				<br><br>

				<label for="Casa:">Casa:</label>
				<input type="text" name= "txtCasa" value="<?php echo $domicilio->getCasa(); ?>">
				

				<label for="Torre:">Torre:</label>
				<input type="text" name= "txtTorre" value="<?php echo $domicilio->getTorre(); ?>">
				<br><br>

				<label for="Piso:">Piso:</label>
				<input type="text" name= "txtPiso" value="<?php echo $domicilio->getPiso(); ?>">
				<br><br>

				<label for="Departamento:">Departamento:</label>
				<input type="text" name= "txtDepartamento" value="<?php echo $domicilio->getDepartamento(); ?>">
				<br><br>

				<label for="Provincia:">Provincia:</label>
				<select name="cboProvincia" id="cboProvincias" onchange="cargarLocalidades();">
					<option value="NULL">--Seleccionar--</option>

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

				<label for="Localidad:">Localidad:</label> 
				<select name="cboLocalidad" id="cboLocalidades" onchange="cargarBarrio();">
					<option value="NULL">--Seleccionar--</option>

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

				<label for="Barrio:">Barrio:</label>
				<select name="cboBarrio" id="cboBarrio">
					<option value="NULL">--Seleccionar--</option>

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
				
				<input class="Guardar" type="submit" name="Guardar" value="Actualizar">

			</form>

		</div>
		
	</div>
		
	<div  id="Pie">

        <?php require_once "../../pie.php";?>

    </div>

</body>
</html>