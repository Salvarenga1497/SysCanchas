<?php

require_once "../../clases/Sexo.php";
require_once "../../clases/Perfil.php";
$mensaje = "";

if (isset($_GET["error"])) {

	switch ($_GET["error"]) {
		case 'nombre':
		$mensaje = "El nombre no debe estar vacio y debe tener minimo 3 caracteres";
		break;

		case 'apellido':
		$mensaje = "El apellido no debe estar vacio y debe tener minimo 3 caracteres";
		break;

		case 'username':
		$mensaje = "El username no debe estar vacio y debe tener minimo 3 caracteres";
		break;
		
		case 'contrasena':
		$mensaje = "El contrasena no debe estar vacio y debe tener minimo 8 caracteres";
		break;

		case 'tipo':
		$mensaje = "Seleccione una opcion en tipo";
		break;
		
	}

}

$listadoSexo = Sexo::obtenerTodos();
$listadoPerfil = Perfil::obtenerTodos();
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
	<link rel="shortcut icon"  href="../../imagenes/logo/logoo.png">
	<link rel="STYLESHEET" type="text/css" href="../../css/menu.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/body.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/mensaje.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/formularioNuevoUsuario.css">
	<link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">
	<script type="text/javascript" src="../../js/usuario/inicio.js"></script>
	<script type="text/javascript" src="../../js/usuario/validacion_apellido.js"></script>
	<script type="text/javascript" src = "../../js/usuario/sweetalert.js " > </script>
</head>
<body>


	<header>
		<img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
	</header>

	<section>

		<?php require_once "../../menu.php";?>

	</section>

	<br>

	<div  id="Principal">


		<div class="Nombre">

			<?php echo "Nuevo Usuario"?>

		</div>

		<br>

		<div class="mensaje">

			<?php echo $mensaje; ?>	
			
		</div>
		
		<br>

		<div class="Titulos">
			<h2 id="Primero">Parte 1</h2>
			<h2 id="Segundo">Parte 2</h2>
			<h2 id="Tercero">Parte 3</h2>
			<h2 id="Detalles">Detalle</h2>
		</div>
		
		<div class="Form">
			
			<form name="formulario" method="POST" action= "procesar_usuario.php" class="Formulario" id="FormularioUsuario"> 

				<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>"> 

				<div id="PrimerPantalla"> 

					<label for="Documento">*Documento:</label>
					<input type="int" name= "txtDocumento" id="txtDocumento" >
					<br><br>

					<label for="Nombre">*Nombre:</label>
					<input type="text" name= "txtNombre" id="txtNombre">
					<br><br>

					<label for="Apellido">*Apellido:</label>
					<input type="text" name= "txtApellido" id="txtApellido">
					<br><br>

					<div id="Siguiente">
						<button class="PrimerSiguiente" type="button" onclick="Mostrar2(); ";> Siguiente</button>
					</div>

				</div>
				
				<div id="SegundaPantalla"> 

					<label for="UserName">*UserName:</label>
					<input type="text" name= "txtUserName" id="txtUserName">
					<br><br>

					<div id="Siguiente2">
						<button class="PrimerAtras" type="button" onclick="Mostrar()";> Atras</button>
						<button class="SegundoSiguiente" type="button" onclick="Mostrar3(); ";> Siguiente</button>
					</div>

				</div>


				<div id="TercerPantalla">  

					<label for="Fecha Nacimiento">Fecha Nacimiento:</label>
					<input type="date" name= "txtFechaNacimiento" id="txtFechaNacimiento">
					<br><br>

					<label for="Sexo:">Sexo:</label>
					<select name="cboSexo" id="cboSexo">
						<option value="NULL">--Seleccionar--</option>

						<?php foreach ($listadoSexo as $sexo): ?>

							<option value="<?php echo $sexo->getIdSexo(); ?>">
								<?php echo $sexo->getDescripcion(); ?>
							</option>

						<?php endforeach?>
					</select>

					<label for="Perfil:">*Perfil:</label>
					<select name="cboPerfil" id="cboPerfil">
						<option value="NULL">--Seleccionar--</option>

						<?php foreach ($listadoPerfil as $perfil): ?>

							<option value="<?php echo $perfil->getIdPerfil(); ?>">
								<?php echo $perfil->getDescripcion(); ?>
							</option>

						<?php endforeach?>
					</select>

					<div id="Atras2">
						<button class="SegundoAtras" type="button" onclick="Mostrar2()";> Atras</button>
						<button class="Terminar" type="button" onclick="Terminar();";> Terminar</button>
					</div>

				</div>

				<div id="CuartaPantalla"> 

					<ul>
						<li>Documento: <span id="ListaDocumento"></span></li>
						<li>Nombre: <span id="ListaNombre"></span></li>
						<li>Apellido: <span id="ListaApellido"></span></li>
						<li>Username: <span id="ListaUserName"></span></li>
						<li>FechaNacimiento: <span id="ListaFechaNacimiento"></span></li>
						<li>Sexo: <span id="ListaSexo"></span></li>
						<li>Perfil: <span id="ListaPerfil"></span></li>
					</ul>

				</div>

				<div id="Guardar">
					<input class="Guardar" type="submit" value="Guardar" onclick="validarTodo(); ">

					<button class="TercerAtras" type="button" onclick="Mostrar3()";> Atras</button>
				</div>	

				
			</form>


		</div>

		<div id="Referencia">
			<p>
				* Campos obligatorios
			</p>				
		</div>

	</div>


	<div  id="Pie">

		<?php require_once "../../pie.php";?>

	</div>

</body>
</html>