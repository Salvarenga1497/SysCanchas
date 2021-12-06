<?php

require_once "../../clases/TipoContacto.php";

$lista = TipoContacto::obtenerTodos();
$idUsuario = $_GET["id_usuario"];
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
    <link rel="STYLESHEET" type="text/css" href="../../css/listadoTipoContacto.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/body.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/nuevo.css">
</head>
<body>

	<header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

	<div>

		<?php require_once "../../menu.php";?>

	</div>

	<br>
	<br>

	<div class="Nuevo">

		<a href= "nuevo.php?id_usuario=<?php echo $idUsuario?>"> Nuevo Tipo de Contacto </a>

	</div>

	<br>
	<br>

	<div id="Principal">

		<div class="Tabla">
			<table class="Lista">
				<caption class="titulo">Listado de Tipo de Contacto</caption>
					<tr class="Fila1">
							<th>ID</th>
							<th>Descripcion</th>
							<th>Acciones</th>
						</tr>

						<?php foreach  ($lista as $tipoContacto): ?>

							<tr>
								
								<td><?php echo $tipoContacto->getIdTipoContacto(); ?></td>
								<td><?php echo $tipoContacto->getDescripcion(); ?></td>
								<td>
									<a href="eliminar.php?id_tipo_contacto=<?php echo $tipoContacto->getIdTipoContacto();?>&id_usuario=<?php echo $idUsuario?>"> Eliminar </a>
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
