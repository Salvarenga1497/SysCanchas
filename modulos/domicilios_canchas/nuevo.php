<?php

require_once "../../clases/Provincia.php";
require_once "../../clases/Localidad.php";
require_once "../../clases/Barrio.php";
require_once "../../clases/Canchas.php";

$idCanchas = $_GET['id_cancha'];

$listadoProvincia = Provincia::obtenerTodos();
$listadoLocalidad = Localidad::obtenerTodos();
$listadoBarrio = Barrio::obtenerTodos();

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php require_once "../../menu.php";?>
	
	<br><br>


		<form method="POST" action= "procesar.php">  

			
			<input type="hidden" name="txtIdCanchas" value="<?php echo $idCanchas; ?>">


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
			<select name="cboProvincia">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoProvincia as $provincia): ?>

					<option value="<?php echo $provincia->getIdProvincia(); ?>">
						<?php echo $provincia->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>

			<br><br>

			Localidad:
			<select name="cboLocalidad">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoLocalidad as $localidad): ?>

					<option value="<?php echo $localidad->getIdLocalidad(); ?>">
						<?php echo $localidad->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>

			<br><br>

			Barrio: 
			<select name="cboBarrio">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoBarrio as $barrio): ?>

					<option value="<?php echo $barrio->getIdBarrio(); ?>">
						<?php echo $barrio->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>
			
			
			<br><br>
			<input type="submit" name="Guardar">


		</form>
</body>
</html>