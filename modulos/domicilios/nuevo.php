<?php

require_once "../../clases/Provincia.php";
require_once "../../clases/Usuario.php";

$idEntidad = $_GET['id_entidad'];

$idUsuario= $_GET['id_usuario'];

$listadoProvincia = Provincia::obtenerTodos();

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

			<?php echo "Nuevo Domicilio"?>

		</div>

		<br><br>

		<div class="Form">

			<form method="POST" action= "procesar.php"  class="Formulario">  

				
				<input type="hidden" name="txtIdEntidad" value="<?php echo $idEntidad; ?>">

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

				<label for="Calle">Calle:</label>
				<input type="text" name= "txtCalle">
				
				<label for="Altura">Altura:</label>
				<input type="text" name= "txtAltura">
				<br><br>

				<label for="Sector">Sector:</label>
				<input type="text" name= "txtSector">
				
				<label for="Manzana">Manzana:</label>			
				<input type="text" name= "txtManzana">
				<br><br>

				<label for="Casa">Casa:</label>
				<input type="text" name= "txtCasa">
				
				<label for="Torre">Torre:</label>
				<input type="text" name= "txtTorre">
				<br><br>

				<label for="Piso">Piso:</label>
				<input type="text" name= "txtPiso">
				<br><br>

				<label for="Departamento">Departamento:</label>
				<input type="text" name= "txtDepartamento">
				<br><br>

				<label for="Provincia">Provincia:</label>
				<select name="cboProvincias" id="cboProvincias" onchange="cargarLocalidades();">
					<option value=0>--Seleccionar--</option>

					<?php foreach ($listadoProvincia as $provincia): ?>

						<option value="<?php echo $provincia->getIdProvincia(); ?>">
							<?php echo $provincia->getDescripcion(); ?>
						</option>

					<?php endforeach?>
				</select>

				<label for="Localidad">Localidad:</label>
				<select name="cboLocalidades" id="cboLocalidades" onchange="cargarBarrio();">
					<option value=0>--Seleccionar--</option>
				</select>

				<br><br>

				<label for="Barrio">Barrio</label>:
				<select name="cboBarrio"  id="cboBarrio">
					<option value=0>--Seleccionar--</option>
				</select>
				
				
				<br><br>
				<input type="submit" name="Guardar" class="Guardar">


			</form>
		</div>

	</div>	

	<div  id="Pie">

        <?php require_once "../../pie.php";?>

    </div>
    	
</body>
</html>

