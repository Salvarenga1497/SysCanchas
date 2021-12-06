<?php
require_once "../../js/validacion_nombre.js";
require_once "../../clases/Provincia.php";

$idUsuario = $_GET["id_usuario"];
$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'descripcion':
			$mensaje = "El nombre no debe estar vacio y debe tener minimo 3 caracteres";
			break;
	}

}


$lista = Provincia::obtenerTodos();

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

			<label for="Nueva Provincia">Nueva Provincia:</label>
			<input type="text" name= "txtProvincia" id="txtNombre">
			<br><br>	
			
			<input class="Guardar" type="submit" value="Guardar" onclick="validarNombre();">
		</form>

	</div>

</body>
</html>



<br>
<br>


<div class="Tabla">
			<table class="Lista">
				<caption class="titulo">Listado de Provincias</caption>
					<tr class="Fila1">
						
						<th>Descripcion</th>
						<th>Acciones</th>
					</tr>

					<?php foreach  ($lista as $provincia): ?>

						<tr>
							
							<td><?php echo $provincia->getDescripcion(); ?></td>
							<td>
								<a href="eliminar.php?id_provincia=<?php echo $provincia->getIdProvincia();?>&id_usuario=<?php echo $idUsuario?>"> Eliminar </a>
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