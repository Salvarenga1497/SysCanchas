<?php
require_once "../../clases/Modulo.php";
require_once "../../js/validacion_nombre.js";
$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'descripcion':
			$mensaje = "El nombre no debe estar vacio y debe tener minimo 3 caracteres";
			break;
		}

}

$listadoModulos = Modulo::obtenerTodos();

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

		<form method="POST" action= "procesar.php">  

			Nombre: <input type="text" name= "txtNombre" id="txtNombre">	
			<br><br>

			<select  name="cboModulos[]" multiple>

				<?php foreach ($listadoModulos as $modulo): ?>

				<option value="<?php echo $modulo->getIdModulo(); ?>">
					<?php echo $modulo->getDescripcion(); ?>
				</option>
			
			<?php endforeach ?>
		
			</select>

			<br><br>
			
			<input type="submit" value="Guardar" onclick="validarNombre();">


		</form>
</body>
</html>