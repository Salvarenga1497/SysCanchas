<?php

require_once "../../clases/Usuario.php";
require_once "../../clases/Sexo.php";
require_once "../../clases/Perfil.php";

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

		case 'tipo':
			$mensaje = "Seleccione una opcion en tipo";
			break;
		
	}
}

$listadoSexo = Sexo::obtenerTodos();
$listadoPerfil = Perfil::obtenerTodos();

$id_usuario = $_GET["idUsuario"];

$idUsuario = $_GET["id_usuario"];


$user = Usuario::obtenerPorId($id_usuario);

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
    <link rel="STYLESHEET" type="text/css" href="../../css/mensaje.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/modificarUsuario.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">
    <script type="text/javascript" src="../../js/usuario/validacion_apellido.js"></script>
	<script type="text/javascript" src = "../../js/usuario/sweetalert.js " > </script>
</head>
<body>

	<header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>


	<div>

		<?php require_once "../../menu.php";?>

	</div>

	<br>

	<div id="Principal">

		<div class="Nombre">

			<?php echo "Modificar Usuario"?>

		</div>
		
		<br>

		<div class="mensaje">

			<?php echo $mensaje; ?>	
			
		</div>
		
		<br>

		<div class="Form">

			<form method="POST" action= "procesar_modificacion.php" class="Formulario" id="FormularioUsuario">  

				<input type="hidden" name="txtIdUsuario" value="<?php echo $id_usuario; ?>">

				<input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">

				<label for="Documento:">Documento:</label>
				<input type="text" name= "txtDocumento" id="txtDocumento" value="<?php echo $user->getDocumento(); ?>">
				<br><br>

				<label for="Nombre">Nombre:</label>
				<input type="text" name= "txtNombre" value="<?php echo $user->getNombre(); ?>" id="txtNombre">
				<br><br>

				<label for="Apellido">Apellido:</label>
				<input type="text" name= "txtApellido" value="<?php echo $user->getApellido(); ?>" id="txtApellido">
				<br><br>
				
				<label for="UserName">UserName:</label>
				<input type="text" name= "txtUserName" value="<?php echo $user->getUserName(); ?>" id="txtUserName">
				<br><br>

				<label for="Password">Password:</label>
				<input type="text" name= "txtPassword" value="<?php echo $user->getContrasena(); ?>" id="txtPassword">
				<br><br>			

				<label for="Fecha Nacimiento">Fecha Nacimiento:</label>
				<input type="date" name= "txtFechaNacimiento" value="<?php echo $user->getFechaNacimiento(); ?>">
				<br><br>

				<label for="Sexo:">Sexo:</label>
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
				
				<label for="Perfil:">Perfil:</label>
				<select name="cboPerfil" id="cboPerfil">
					<option value="NULL">--Seleccionar--</option>

					<?php foreach ($listadoPerfil as $perfil): ?>

						<?php 

						$selected = "";

							if ($perfil->getIdPerfil() == $user->getRelaPerfil()) {
								$selected = "SELECTED";
							}
						?>
						<option <?php echo $selected; ?> value="<?php echo $perfil->getIdPerfil(); ?>">
							<?php echo $perfil->getDescripcion(); ?>
						</option>

					<?php endforeach?>
				</select>
				
				<br><br>
				<input class="Guardar" type="submit" name="Guardar" value="Actualizar" onclick="validarTodo(); ">


			</form>

		</div>

	</div>	

	<div  id="Pie">

		<?php require_once "../../pie.php";?>

	</div>

</body>
</html>