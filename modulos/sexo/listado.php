<?php

require_once "../../clases/Sexo.php";

$lista = Sexo::obtenerTodos();

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
    <link rel="STYLESHEET" type="text/css" href="../../css/listadoSexo.css">
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

		<a href= "nuevo.php"> Nuevo Sexo </a>

	</div>

	<br>
	<br>

	<div class="Tabla">
		<table class="Lista">
			<caption class="titulo">Listado de Canchas</caption>
				<tr class="Fila1">
						
						<th>Descripcion</th>
						<th>Acciones</th>
					</tr>

					<?php foreach  ($lista as $sexo): ?>

						<tr>
							
							
							<td><?php echo $sexo->getDescripcion(); ?></td>
							<td>
								<a href="eliminar.php?id_sexo=<?php echo $sexo->getIdSexo(); ?>"> Eliminar </a>
							</td>

						</tr>

					<?php endforeach ?>

				</table>
	</div>

</div>

	<div id="Pie">

        <?php require_once "../../pie.php";?>

    </div>

</body>
</html>
