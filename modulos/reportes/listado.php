<?php

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

	<div id="Principal">

		<div class="Nuevo">

			<a href= "turnos_cancha_alquilada.php?id_usuario=<?php echo $idUsuario?>"> Reporte de las Canchas mas alquiladas</a>

			<br><br>

			<a href= "turnos_hora.php?id_usuario=<?php echo $idUsuario?>"> Reporte de las Horas mas Alquiladas por cancha</a>

			<br><br>

			<a href= "turnos_cancha.php?id_usuario=<?php echo $idUsuario?>"> Reporte de Cantidad de turnos reservados por cancha</a>
			
		</div>

	</div>

	<div  id="Pie">

        <?php require_once "../../pie.php";?>

    </div>

</body>
</html>
