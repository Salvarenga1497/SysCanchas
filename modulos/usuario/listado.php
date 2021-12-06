<?php

require_once "../../clases/Usuario.php";

if (isset($_GET["cboFiltro"])){
	$filtroEstado = $_GET["cboFiltro"];
}else {
	$filtroEstado = "";
}

if (isset($_GET["txtNombre"])){
	$filtroNombre= $_GET["txtNombre"];
}else {
	$filtroNombre = "";
}

if (isset($_GET["txtApellido"])){
	$filtroApellido= $_GET["txtApellido"];
}else {
	$filtroApellido = "";
}

if (isset($_GET["txtApellido"])){
	$filtroApellido= $_GET["txtApellido"];
}else {
	$filtroApellido = "";
}

if (isset($_GET["numDni"])){
	$filtroDni= $_GET["numDni"];
}else {
	$filtroDni = "";
}

$lista = Usuario::obtenerTodos($filtroEstado,$filtroNombre, $filtroApellido, $filtroDni);

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
    <link rel="STYLESHEET" type="text/css" href="../../css/listadoUsuario.css">
    
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

	<div class="Nuevo">

		<a href= "nuevo.php"> Nuevo Usuario </a>

	</div>

	<section class="Filtar">
			<form method="GET">

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

				<label id="Buscar">Estado</label>
				<select name="cboFiltro">
					<option value="0">Todos</option>
					<option value="1">Activos</option>
					<option value="2">Inactivos</option>
				</select>

				<label id="Buscar">Nombre</label>
				
				<input  type="text" name="txtNombre" id="Input">

				<label id="Buscar">Apellido:</label>
				
				<input  type="text" name="txtApellido" id="Input">

				<label id="Buscar">DNI:</label>
				
				<input  type="number" name="numDni" id="Input">

				<input type="submit" name="Filtrar" value="Filtrar" id="Boton">
			</form>
		</section>

	<br>
	<br>

	<div id="Principal">

		<div class="Tabla">
				<table class="Lista">
					<caption class="titulo">Listado de Usuarios</caption>
						<tr class="Fila1">
							
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Username</th>
							<th>Fecha Nacimiento</th>
							<th>Documento</th>
							<th>Perfil</th>
							<th>Estado</th>
							<th>Contacto</th>
							<th>Domicilios</th>
							<th>Acciones</th>
						</tr>

						<?php foreach  ($lista as $usuario): ?>

							<tr>
								
								
								<td><?php echo $usuario->getNombre(); ?></td>
								<td><?php echo $usuario->getApellido(); ?></td>
								<td><?php echo $usuario->getUserName(); ?></td>
								<td><?php echo $usuario->getFechaNacimiento(); ?></td>
								<td><?php echo $usuario->getDocumento(); ?></td>
								<td><?php echo $usuario->perfil->getDescripcion(); ?></td>
								<?php $usuario->getEstado(); ?>
								<?php if ($usuario->getEstado() == 1) {?>
								<td> Alta</td>
								<?php }else{ ?>
								<td> Baja</td>
								<?php } ?>
								<td>
									<a href="../contacto/contacto.php?id_entidad=<?php echo $usuario->getRelaEntidades();?>"> Ver </a>
								</td>
								<td>
									<a href="../domicilios/listado.php?id_entidad=<?php echo $usuario->getRelaEntidades(); ?>">
										Ver
									</a>
								</td>			
								<td>
									<a href="modificar.php?idUsuario=<?php echo $usuario->getIdUsuario(); ?>"> Modificar </a>
									<?php $usuario->getEstado(); ?>
								<?php if ($usuario->getEstado() == 1) {?>
									<a href="eliminar.php?idUsuario=<?php echo $usuario->getIdUsuario();?>&id_entidad=<?php echo $usuario->getRelaEntidades();?>"> Eliminar </a>
								</td>
								<?php } ?>

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

