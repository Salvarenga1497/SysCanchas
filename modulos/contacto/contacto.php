<?php

require_once "../../clases/Contacto.php";
require_once "../../clases/TipoContacto.php";

$idEntidad = $_GET["id_entidad"];

$listadoContactos = Contacto::obtenerPorIdEntidad($idEntidad);


$listadoTipoContactos = TipoContacto::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php require_once "../../menu.php";?>
<br>
<br>

<form method="POST" action="procesar_alta.php">

	<input type="hidden" name="txtIdEntidad" value="<?php echo $idEntidad; ?>">

	<label>Tipo Contacto</label>
	<select name="cboTipoContacto">
		<option value=0>--Seleccionar--</option>
		<?php foreach ($listadoTipoContactos as $tipoContacto): ?>
			<option value="<?php echo $tipoContacto->getIdTipoContacto(); ?>">
				<?php echo $tipoContacto->getDescripcion(); ?>
			</option>
		<?php endforeach?>

	</select>

	&nbsp;&nbsp;&nbsp;
	<label>Valor</label>
	<input type="text" name="txtValor">
	&nbsp;&nbsp;

	<input type="submit" value="Agregar">

</form>
<br>


<a href="../tipo_contacto/listado.php">Nuevo Tipo de Contacto</a>

<br>
<br>


<table border="1">
	<tr>
		<th>Descripcion</th>
		<th>Valor</th>
		<th>Accion</th>		
	</tr>

	<?php foreach  ($listadoContactos as $contacto): ?>
		<tr>	
			<td><?php echo $contacto->getDescripcion(); ?></td>
			<td><?php echo $contacto->getValor(); ?></td>
			<td>
				<a href="eliminar.php?id_entidad_contacto=<?php echo $contacto->getIdEntidadContacto(); ?>&id_entidad=<?php echo $contacto->getRelaEntidad(); ?>">Eliminar
				</a>
			</td>
		</tr>
	<?php endforeach ?>

</table>

</body>
</html>

