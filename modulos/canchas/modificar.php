<?php
require_once "../../clases/Usuario.php";
require_once "../../clases/Canchas.php";

$listadoUsuarios = Usuario::obtenerTodos();

$id_cancha = $_GET["id_cancha"];


$cancha = Cancha::obtenerPorId($id_cancha);

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
			
			<input type="hidden" name="txtIdCancha" value="<?php echo $id_cancha; ?>">

			Nombre: <input type="text" name= "txtNombre" value="<?php echo $cancha->getNombre(); ?>">
			<br><br>

			Usuario: 
			<select name="cboUsuario">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoUsuarios as $user): ?>

					<?php 

					$selected = "";

							echo $user->getRelaEntidades();
							echo "<br>";
							echo $cancha->getRelaEntidades();
							echo "<br>";

						if ($user->getRelaEntidades() == $cancha->getRelaEntidades()) {
							$selected = "SELECTED";
						}
					    ?>
					<option <?php echo $selected; ?> value="<?php echo $user->getIdUsuario(); ?>">
						<?php echo $user->getUserName(); ?>
					</option>

				<?php endforeach?>
			</select>

			<br><br>

			Estado: <input type="text" name= "txtEstado" value="<?php echo $cancha->getEstado(); ?>">
			<br><br>

			<input type="submit" name="Guardar" value="Actualizar">


		</form>
</body>
</html>