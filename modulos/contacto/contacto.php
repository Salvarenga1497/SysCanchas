<?php

require_once "../../clases/Contacto.php";
require_once "../../clases/TipoContacto.php";

$idEntidad = $_GET["id_entidad"];

$idUsuario = $_GET["id_usuario"];

$listadoContactos = Contacto::obtenerPorIdEntidad($idEntidad);


$listadoTipoContactos = TipoContacto::obtenerTodos();

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
	<link rel="STYLESHEET" type="text/css" href="../../css/body.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/nuevo.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/listadoContacto.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/formularioNuevoContacto.css">
</head>
<body>

	<header>
		<img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
	</header>


	<section>

		<?php require_once "../../menu.php";?>

	</section>

	<br>
	<br>

	<div id="Principal">

		<div class="Nuevo">

			<a href="../tipo_contacto/listado.php?id_usuario=<?php echo $idUsuario?>">Nuevo Tipo de Contacto</a>

		</div>

		<br><br>

		<div class="Form">

			<form method="POST" action="procesar_alta.php" class="Formulario">

				<input type="hidden" name="txtIdEntidad" value="<?php echo $idEntidad; ?>">

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

				<label for="Tipo Contacto">Tipo Contacto:</label>
				<select name="cboTipoContacto">
					<option value=0>--Seleccionar--</option>
					<?php foreach ($listadoTipoContactos as $tipoContacto): ?>
						<option value="<?php echo $tipoContacto->getIdTipoContacto(); ?>">
							<?php echo $tipoContacto->getDescripcion(); ?>
						</option>
					<?php endforeach?>

				</select>

				<br>

				<label for="Valor">Valor:</label>
				<input type="text" name="txtValor">

				<br>

				<input type="submit" value="Agregar" class="Guardar">

			</form>


		</div>
		
		
		<br>
		<br>

		<div class="Tabla">
			<table class="Lista">
				<caption class="titulo">Listado de Contacto</caption>
				<tr class="Fila1">
					<th>Descripcion</th>
					<th>Valor</th>
					<th>Accion</th>		
				</tr>

				<?php foreach  ($listadoContactos as $contacto): ?>
					<tr>	
						<td><?php echo $contacto->getDescripcion(); ?></td>
						<td><?php echo $contacto->getValor(); ?></td>
						<td>
							<a href="eliminar.php?id_entidad_contacto=<?php echo $contacto->getIdEntidadContacto(); ?>&id_entidad=<?php echo $contacto->getRelaEntidad();?>&id_usuario=<?php echo $idUsuario?>">Eliminar
							</a>
						</td>
					</tr>
				<?php endforeach ?>

			</table>

		</div>

	</div>

	<div  id="Pie">
		
		<?php require_once "../../pie.php";?>

	</div>

</body>
</html>

