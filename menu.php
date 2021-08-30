<?php

require_once "clases/Usuario.php";
require_once "configs.php";

session_start();

if(isset($_SESSION['usuario'])){
	$usuario = $_SESSION['usuario'];
} else {
	header("location: /programacion3/gestion_usuario/form_login.php?error=" . MENSAJE_CODE);
	exit;
}

$listadoModulos = $usuario->perfil->getModulos();
?>


<a href="/programacion3/gestion_usuario/inicio.php"> Inicio</a>|


<?php foreach ($listadoModulos as $modulo): ?>

	<a href="/programacion3/gestion_usuario/modulos/<?php echo $modulo->getDirectorio(); ?>/listado.php"> <?php echo ucwords($modulo->getDirectorio());?> </a> |

<?php endforeach?>


<a href="/programacion3/gestion_usuario/cerrar_sesion.php"> Cerrar Sesion</a>
