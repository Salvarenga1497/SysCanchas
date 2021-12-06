<?php
require_once "clases/Cancha.php";

$cancha = Cancha::obtenerCantidadCanchasRegistradas();
$cantidad = $cancha->getCantidad();

?>

<div class="cantidad">
	<img src="imagenes/cancha.png">
	<p>Cantidad de canchas Registradas : <?php echo $cantidad?></p>
	
</div>