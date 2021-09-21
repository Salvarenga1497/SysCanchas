<?php
require_once "../../clases/Barrio.php";

$id_barrio = $_POST['id'];

$listadoBarrio = Barrio::obtenerPorIdLocalidad($id_barrio);

$respuesta = "";

$respuesta = "<option value='0'>Seleccionar</option>";

if(count($listadoBarrio) > 0){
	foreach ($listadoBarrio as $barrio) {
		$respuesta .= "<option value=" . $barrio->getIdBarrio() . ">" .  $barrio->getDescripcion() . "</option>";
	}
}else{
	print "<option value='0'>-- SELECCIONE --</option>";
}

echo $respuesta;

?>