<?php

require_once "../../clases/Usuario.php";
require_once "../../js/validacion_nombre.js";
require_once "../../js/cancha/validar_combo_usuario_cancha.js";
$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'nombre':
			$mensaje = "El nombre no debe estar vacio y debe tener minimo 3 caracteres";
			break;
		}

	switch ($_GET["error"]) {
		case 'iduser':
			$mensaje = "Seleccione una opcion";
			break;
		}


}

$listadoUsuarios = Usuario::obtenerTodos();


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php require_once "../../menu.php";?>

	<br><br>

	<?php echo $mensaje; ?>	
	
	<br><br>

		<form method="POST" action= "procesar.php" id="form"> 

			Nombre: <input type="text" name= "txtNombre" id="txtNombre">
			<br><br>

			Usuario: 
			<select name="cboUsuario" id="cboUsuario">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoUsuarios as $user): ?>

					<option value="<?php echo $user->getIdUsuario(); ?>">
						<?php echo $user->getUserName(); ?>
					</option>

				<?php endforeach?>
			</select>
			
			<br><br>
			<input type="submit" value="Guardar" onclick="validarNombre();validarCombo();">


		</form>
</body>
</html>