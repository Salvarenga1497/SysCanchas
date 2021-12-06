<?php
require_once "../../js/validacion_nombre.js";
require_once "../../js/localidad/validacion_combo.js";
require_once "../../clases/Provincia.php";
require_once "../../clases/Localidad.php";

$idUsuario = $_GET["id_usuario"];
$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'descripcion':
			$mensaje = "El nombre no debe estar vacio y debe tener minimo 3 caracteres";
			break;

		case 'provincia':
			$mensaje = "El campo de provincia no debe estar vacio";
			break;
	}

}


$listaProvincias = Provincia::obtenerTodos();
$listaLocalidades = Localidad::obtenerTodos();

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
 
			<label for="Nueva Localidad">Nueva Localidad:</label>
			<input type="text" name= "txtLocalidad" id="txtNombre">
			<br>

			<label for="Provincia">Provincia:</label>
			<select name="cboProvincia" id="cboProvincia">
				<option value="NULL">--Seleccionar--</option>

				<?php foreach ($listaProvincias as $provincia): ?>

					<option value="<?php echo $provincia->getIdProvincia(); ?>">
						<?php echo $provincia->getDescripcion(); ?>
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
				<caption class="titulo">Listado de Localidades</caption>
					<tr class="Fila1">
						
						<th>Provincia</th>
						<th>Localidad</th>
						<th>Acciones</th>
					</tr>

					<?php foreach  ($listaLocalidades as $localidad): ?>

						<tr>
							<td><?php echo $localidad->provincia->getDescripcion(); ?></td>
							<td><?php echo $localidad->getDescripcion(); ?></td>
							<td>
								<a href="eliminar.php?id_localidad=<?php echo $localidad->getIdLocalidad(); ?>&id_usuario=<?php echo $idUsuario?>"> Eliminar </a>
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