<?php
require_once "../../clases/Cancha.php";

$idUsuario = $_GET["id_usuario"];

if (isset($_GET["cboFiltro"])){
	$filtroEstado = $_GET["cboFiltro"];
}else {
	$filtroEstado = "";
}
$listadoCanchas = Cancha::obtenerTodoss();







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
    <link rel="STYLESHEET" type="text/css" href="../../css/listadoSexo.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/body.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/nuevo.css">
    <script type="text/javascript" src="jquery.3.6.js"></script>
    <script type="text/javascript">

		function cargarLista() {
            var fechaInicio = $("#fechaInicio").val();
            var fechaFin = $("#fechaFin").val();
            var cboFiltro = $("#cboFiltro").val();


            $.ajax({
                url:'cargarLista.php',
                type:'GET',
                dataType:'html',
                data :{fechaInicio:fechaInicio, fechaFin:fechaFin, cboFiltro:cboFiltro},
            })
            .done(function(resultado){
                $("#tabla_busqueda").html(resultado);
            })
        }
			
</script>
</head>
<body>

	<header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

	<div>

		<?php require_once "../../menu.php";?>

	</div>


	<section class="Filtar">
			<form method="GET">

				<input type="hidden" name="id_usuario" value="<?php echo $idUsuario; ?>">

				<label id="Buscar">Cancha</label>
				<select name="cboFiltro" id="cboFiltro">
					<option value="NULL">--Seleccionar--</option>

					<?php foreach ($listadoCanchas as $cancha): ?>

						<option value="<?php echo $cancha->getIdCanchas(); ?>">
							<?php echo $cancha->getNombre(); ?>
						</option>

					<?php endforeach?>
				</select>

				<label for="Fecha">Fecha de Inicio:</label>
				<input type="date" name= "fechaInicio" id="fechaInicio">

				<label for="Fecha">Fecha de Fin:</label>
				<input type="date" name= "fechaFin" id="fechaFin">

				<button type="button" onclick="cargarLista();">Filtrar</button> 
			</form>
		</section>

	<br>
	<br>

	<div id="tabla_busqueda">


			
		
	</div>

	<div  id="Pie">

        <?php require_once "../../pie.php";?>

    </div>

</body>
</html>