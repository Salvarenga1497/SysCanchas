<?php
require_once "../../js/validacion_nombre.js";
require_once "../../js/provincia/validacion_combo.js";
require_once "../../clases/Localidad.php";
require_once "../../clases/Barrio.php";
$idUsuario = $_GET["id_usuario"];
$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'descripcion':
			$mensaje = "El nombre no debe estar vacio y debe tener minimo 3 caracteres";
			break;

		case 'localidad':
			$mensaje = "El campo de localidad no debe estar vacio";
			break;
	}

}


$listaLocalidades = Localidad::obtenerTodos();
$listaBarrios = Barrio::obtenerTodos();

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
    <link rel="STYLESHEET" type="text/css" href="../../css/nuevo.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/listadoContacto.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/formularioNuevoProvincia.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/mensaje.css">
</head>
<body>

	<header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

	<section>

		<?php require_once "../../menu.php";?>

	</section>
	
	<br><br>

	<div class="mensaje">

		<?php echo $mensaje; ?>	
		
	</div>


	<br><br>

	<div class="Form">

		<form method="POST" action= "procesar.php" class="Formulario">  

			<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">
 

			<label for="Nuevo Barrio">Nuevo Barrio:</label>
			<input type="text" name= "txtBarrio" id="txtNombre">
			<br>

			<label for="Localidad">Localidad:</label>
			<select name="cboLocalidad" id="cboLocalidad">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listaLocalidades as $localidad): ?>

					<option value="<?php echo $localidad->getIdLocalidad(); ?>">
						<?php echo $localidad->getDescripcion(); ?>
					</option>

				<?php endforeach?>
			</select>

			<br>	
			
			<input class="Guardar" type="submit" value="Guardar" onclick="validarNombre(); validarCombo();">
		</form>

	</div>

</body>
</html>

<br>
<br>


	<div class="Tabla">
			<table class="Lista">
				<caption class="titulo">Listado de Barrios</caption>
					<tr class="Fila1">
						
						<th>Localidad</th>
						<th>Barrio</th>
						<th>Acciones</th>
					</tr>

					<?php foreach  ($listaBarrios as $barrio): ?>

					<tr>
							
							<td><?php echo $barrio->localidad->getDescripcion(); ?></td>
							<td><?php echo $barrio->getDescripcion(); ?></td>
							
							<td>
								<a href="eliminar.php?id_barrio=<?php echo $barrio->getIdBarrio(); ?>&id_usuario=<?php echo $idUsuario?>"> Eliminar </a>
							</td>

					</tr>

					<?php endforeach ?>

			</table>
	</div>

	<div>

        <?php require_once "../../pie.php";?>

    </div>

</body>
</html>