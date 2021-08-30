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


$domicilio = Domicilio::obtenerPorId($id_domicilio);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php require_once "../../menu.php";?>
	
	<br><br>

		<form method="POST" action= "procesar_modificacion.php">  
			
			<input type="hidden" name="txtIdEntidad" value="<?php echo $idEntidad; ?>">

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
			<select name="cboProvincia">
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

			<br><br>

			Localidad: 
			<select name="cboLocalidad">
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

			Barrio: 
			<select name="cboBarrio">
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
			
			<input type="submit" name="Guardar" value="Actualizar">


		</form>
</body>
</html>