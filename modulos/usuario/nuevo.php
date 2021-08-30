<?php

require_once "../../clases/Sexo.php";
require_once "../../clases/Tipo.php";

$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'nombre':
			$mensaje = "El nombre no debe estar vacio y debe tener minimo 3 caracteres";
			break;

		case 'apellido':
				$mensaje = "El apellido no debe estar vacio y debe tener minimo 3 caracteres";
			break;

		case 'username':
				$mensaje = "El username no debe estar vacio y debe tener minimo 3 caracteres";
			break;
		
		case 'contrasena':
				$mensaje = "El contrasena no debe estar vacio y debe tener minimo 8 caracteres";
			break;
		
	}

}

$listadoSexo = Sexo::obtenerTodos();
$listadoTipo = Tipo::obtenerTodos();

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

		<form method="POST" action= "procesar_usuario.php">  

			Documento: <input type="int" name= "txtDocumento">
			<br><br>

			Nombre: <input type="text" name= "txtNombre">
			<br><br>

			Apellido: <input type="text" name= "txtApellido">
			<br><br>
			
			UserName: <input type="text" name= "txtUserName">
			<br><br>

			Password: <input type="text" name= "txtPassword">
			<br><br>

			Fecha Nacimiento: <input type="date" name= "txtFechaNacimiento">
			<br><br>

			Sexo: 
			<select name="cboSexo">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoSexo as $sexo): ?>

					<option value="<?php echo $sexo->getIdSexo(); ?>">
						<?php echo $sexo->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>

			<br><br>
			
			Tipo:
			<select name="cboTipo">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoTipo as $tipo): ?>

					<option value="<?php echo $tipo->getIdTipo(); ?>">
						<?php echo $tipo->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>
			
			<br><br>
			<input type="submit" name="Guardar">


		</form>
</body>
</html>