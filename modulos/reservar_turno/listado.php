<?php

require_once "../../clases/Cancha.php";


$listadoCancha = Cancha::obtenerTodoss();

$idUsuario = $_GET['id_usuario'];

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
    <link rel="STYLESHEET" type="text/css" href="../../css/formularioNuevoDomicilio.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">

</head>
<body>

	<header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>


	<section>

		<?php require_once "../../menu2.php";?>

	</section>
	
	<br><br>

	<div id="Principal">

		<div class="Nombre">

			<?php echo "Elegi la cancha"?>

		</div>

		<br><br>

		<div class="Form">

			<form method="GET" action= "listado_turno.php"  class="Formulario"> 

			

				<label for="Cancha">Canchas:</label>
				<select name="cboCancha" id="cboCancha" >
					<option value=0>--Seleccionar--</option>

					<?php foreach ($listadoCancha as $cancha): ?>

						<option value="<?php echo $cancha->getIdCanchas(); ?>">
							<?php echo $cancha->getNombre(); ?>
						</option>

					<?php endforeach?>
				</select>
				<br>

				<input type="hidden" name="id_usuario" value="<?php echo $idUsuario; ?>">

				</table>

				
				
				<br><br>
				<input type="submit" name="Guardar" class="Guardar">


			</form>
		</div>

	</div>	

	<div  id="Pie">

        <?php require_once "../../pie.php";?>

    </div>
    	
</body>
</html>

