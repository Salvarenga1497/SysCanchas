<?php

require_once "../../clases/Usuario.php";

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

		<form method="POST" action= "procesar.php"> 

			Nombre: <input type="text" name= "txtNombre">
			<br><br>

			Usuario: 
			<select name="cboUsuario">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoUsuarios as $user): ?>

					<option value="<?php echo $user->getIdUsuario(); ?>">
						<?php echo $user->getUserName(); ?>
					</option>

				<?php endforeach?>
			</select>
			
			<br><br>
			<input type="submit" value="Guardar">


		</form>
</body>
</html>