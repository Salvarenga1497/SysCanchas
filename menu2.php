<?php

require_once "clases/Usuario.php";
require_once "configs.php";
require_once "clases/Modulo.php";
require_once "clases/Usuario.php";


$idUsuario= $_GET['id_usuario'];

$usuario = Usuario::obtenerPorIdEntidad($idUsuario);




session_start();

if(isset($_SESSION['usuario'])){
	$usuario = $_SESSION['usuario'];
} else {
	header("location: /programacion3/gestion_usuario/form_login.php?error=" . MENSAJE_CODE);
	exit;
}

$listadoModulos = $usuario->perfil->getModulos();
$id=$usuario->getRelaEntidades();
?>

<nav  class="horizontal">

	<ul>

		<li><a href="/programacion3/FutNet/backend/gestion_usuario/inicio2.php?id_usuario=<?php echo $id;?>"> Inicio</a></li>


		<?php foreach ($listadoModulos as $modulo): ?>
			<?php if ($modulo->getNivel() == 1) { ?>

				<li class="dropdown" ><a href="/programacion3/FutNet/backend/gestion_usuario/modulos/<?php echo $modulo->getDirectorio(); ?>/listado.php?id_usuario=<?php echo $id;?>"> <?php echo ucwords($modulo->getDescripcion());?> </a> 
					
					<div class="dropdown-content">
						<ul>
							<?php  foreach ($listadoModulos as $modulo2): ?>

								<?php if ($modulo2->getNivel() == 2) { ?>
									<?php if ($modulo->getIdModulo() == $modulo2->getHijoDe()) { ?>
										<li><a href="/programacio
											n3//FutNet/backend/gestion_usuario/modulos/<?php echo $modulo2->getDirectorio(); ?>/listado.php?id_usuario=<?php echo $id;?>"> <?php echo ucwords($modulo2->getDescripcion());?> </a> </li>

										<?php } ?>
									<?php } ?>
								<?php endforeach?>
							</ul>
						</div>
					</li>
				<?php } ?>
				
			<?php endforeach?>

			<li><a href="/programacion3/FutNet/backend/gestion_usuario/cerrar_sesion.php"> Cerrar Sesion</a></li>
		</ul>
		<br>


    
	</nav>