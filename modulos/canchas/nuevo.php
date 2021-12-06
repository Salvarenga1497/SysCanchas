<?php

require_once "../../clases/Usuario.php";

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

$listadoUsuarios = Usuario::obtenerTodoss();
$idUsuario = $_GET['id_usuario'];

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
    <link rel="STYLESHEET" type="text/css" href="../../css/formularioNuevaCancha.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/body.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/mensaje.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">
    <script type="text/javascript" src="../../js/cancha/validacion_nombre.js"></script>
    <script type="text/javascript" src = "../../js/usuario/sweetalert.js " > </script>
</head>
<body>

	<header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

	<div>

		<?php require_once "../../menu.php";?>

	</div>

	<br><br>

<div id="Principal">

	<div class="Nombre">

		<?php echo "Nueva Cancha"?>

	</div>

	<br><br>

	<div class="mensaje">

		<?php echo $mensaje; ?>	
		
	</div>
	
	
	<br><br>

	<div class="Form">

		<form method="POST" action= "procesar.php" class="Formulario" id="FormularioCancha"> 

			<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

			<label for="Nombre">Nombre:</label>
			<input type="text" name= "txtNombre" id="txtNombre">
			<br><br>

			<label for="Usuario">Usuario:</label> 
			<select name="cboUsuario" id="cboUsuario">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listadoUsuarios as $user): ?>

					<option value="<?php echo $user->getIdUsuario(); ?>">
						<?php echo $user->getUserName(); ?>
					</option>

				<?php endforeach?>
			</select>
			
			<br><br>
			<input class="Guardar" type="submit" value="Guardar" onclick="validarNombre(); ">


		</form>

	</div>

</div>

	<div id="Pie">

        <?php require_once "../../pie.php";?>

    </div>
    
</body>
</html>