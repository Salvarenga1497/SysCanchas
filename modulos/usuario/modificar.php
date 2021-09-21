<?php

require_once "../../clases/Usuario.php";
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

		case 'sexo':
			$mensaje = "Seleccione una opcion en sexo";
			break;

		case 'tipo':
			$mensaje = "Seleccione una opcion en tipo";
			break;
		
	}
}

$listadoSexo = Sexo::obtenerTodos();
$listadoTipo = Tipo::obtenerTodos();

$id_usuario = $_GET["id_usuario"];

$user = Usuario::obtenerPorId($id_usuario);

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

		<form method="POST" action= "procesar_modificacion.php">  

			<input type="hidden" name="txtIdUsuario" value="<?php echo $id_usuario; ?>">

			Documento: <input type="text" name= "txtDocumento" value="<?php echo $user->getDocumento(); ?>">
			<br><br>

			Nombre: <input type="text" name= "txtNombre" value="<?php echo $user->getNombre(); ?>">
			<br><br>

			Apellido: <input type="text" name= "txtApellido" value="<?php echo $user->getApellido(); ?>">
			<br><br>
			
			UserName: <input type="text" name= "txtUserName" value="<?php echo $user->getUserName(); ?>">
			<br><br>

			Contrasena: <input type="text" name= "txtPassword" value="<?php echo $user->getContrasena(); ?>">
			<br><br>			

			Fecha Nacimiento: <input type="date" name= "txtFechaNacimiento" value="<?php echo $user->getFechaNacimiento(); ?>">
			<br><br>

			Sexo: 
			<select name="cboSexo">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoSexo as $sexo): ?>

					<?php 

					$selected = "";

						if ($sexo->getIdSexo() == $user->getRelaSexo()) {
							$selected = "SELECTED";
						}
					?>
					<option <?php echo $selected; ?> value="<?php echo $sexo->getIdSexo(); ?>">
						<?php echo $sexo->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>

			<br><br>
			
			Tipo:
			<select name="cboTipo">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoTipo as $tipo): ?>

					<?php 

					$selected = "";

						if ($tipo->getIdTipo() == $user->getRelaTipo()) {
							$selected = "SELECTED";
						}
					?>
					<option <?php echo $selected; ?> value="<?php echo $tipo->getIdTipo(); ?>">
						<?php echo $tipo->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>
			
			<br><br>
			<input type="submit" name="Guardar" value="Actualizar">


		</form>
</body>
</html>