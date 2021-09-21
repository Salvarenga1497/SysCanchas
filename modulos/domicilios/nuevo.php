<?php

require_once "../../clases/Provincia.php";
require_once "../../clases/Usuario.php";

$idEntidad = $_GET['id_entidad'];

$listadoProvincia = Provincia::obtenerTodos();



?>



<!DOCTYPE html>
<html>
<head>
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


		<form method="POST" action= "procesar.php">  

			
			<input type="hidden" name="txtIdEntidad" value="<?php echo $idEntidad; ?>">


			Calle: <input type="text" name= "txtCalle">
			<br><br>

			Altura: <input type="text" name= "txtAltura">
			<br><br>

			Sector: <input type="text" name= "txtSector">
			<br><br>
			
			Manzana: <input type="text" name= "txtManzana">
			<br><br>

			Casa: <input type="text" name= "txtCasa">
			<br><br>

			Torre: <input type="text" name= "txtTorre">
			<br><br>

			Piso: <input type="text" name= "txtPiso">
			<br><br>

			Departamento: <input type="text" name= "txtDepartamento">
			<br><br>

			Provincia:
			<select name="cboProvincias" id="cboProvincias" onchange="cargarLocalidades();">
				<option value=0>--Seleccionar--</option>

				<?php foreach ($listadoProvincia as $provincia): ?>

					<option value="<?php echo $provincia->getIdProvincia(); ?>">
						<?php echo $provincia->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>

			<br><br>

			Localidad:
			<select name="cboLocalidades" id="cboLocalidades" onchange="cargarBarrio();">
				<option value=0>--Seleccionar--</option>
			</select>

			<br><br>

			Barrio: 
			<select name="cboBarrio"  id="cboBarrio">
				<option value=0>--Seleccionar--</option>
			</select>
			
			
			<br><br>
			<input type="submit" name="Guardar">


		</form>
</body>
</html>

