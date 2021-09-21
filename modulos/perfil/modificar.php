<?php

require_once "../../clases/Perfil.php";
$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'descripcion':
			$mensaje = "El nombre no debe estar vacio y debe tener minimo 3 caracteres";
			break;
		}

}

$id_perfil = $_GET["id_perfil"];

$perfil = Perfil::obtenerXId($id_perfil);

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

			<input type="hidden" name="txtIdPerfil" value="<?php echo $id_perfil; ?>">

			Nombre: <input type="text" name= "txtNombre" value="<?php echo $perfil->getDescripcion(); ?>">
			<br><br>
			
			<input type="submit" name="Guardar" value="Actualizar">


		</form>
</body>
</html>