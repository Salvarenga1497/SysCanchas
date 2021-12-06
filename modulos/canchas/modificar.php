<?php
require_once "../../clases/Usuario.php";
require_once "../../clases/Cancha.php";
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

$id_cancha = $_GET["id_cancha"];
$idUsuario = $_GET["id_usuario"];


$cancha = Cancha::obtenerPorId($id_cancha);


?>
<!DOCTYPE html>
<html>
<head>
	<title>FUTLINE</title>
    <meta charset="UTF-8">
    <meta name="Author" content="Alvarenga Sebastian" >
    <meta name="description" content="Alquilar canchas de futbol">
    <meta name="keywords" content="futbol, alquilar, cancha, futbol5, formosa">
    <link rel="shortcut icon" href="../../imagenes/logo/logoo.png">
    <link rel="STYLESHEET" type="text/css" href="../../css/menu.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/pie.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/body.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/modificarCancha.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/mensaje.css">

</head>

<body>

	<header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

	<div>

		<?php require_once "../../menu.php";?>

	</div>

	<br><br>

	<div class="Nombre">

		<?php echo "Modificar Cancha"?>

	</div>
	
	<br><br>

<div id="Principal">

	<div class="mensaje">

		<?php echo $mensaje; ?>	
		
	</div>
	
	<br><br>

	<div class="Form">

		<form method="POST" action= "procesar_modificacion.php" class="Formulario">  
			
			<input type="hidden" name="txtIdCancha" value="<?php echo $id_cancha; ?>">

			<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">


			<label for="Nombre:">Nombre:</label>
			<input type="text" name= "txtNombre" value="<?php echo $cancha->getNombre(); ?>" id="txtNombre">
			<br><br>

			<label for="Usuario:">Usuario:</label>  
			<select name="cboUsuario" id="cboUsuario">
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

			<input class="Guardar" type="submit" name="Guardar" value="Actualizar" onclick="validarNombre();validarCombo();">


		</form>

	</div>

</div>

	<div  id="Pie">

		<?php require_once "../../pie.php";?>

	</div>
</body>
</html>