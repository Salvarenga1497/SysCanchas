<?php
require_once "../../clases/Localidad.php";

$id_provincia = $_POST['id'];

$listadoLocalidades = Localidad::obtenerPorIdProvincia($id_provincia);


$respuesta = "";

$respuesta = "<option value='0'>Seleccionar</option>";

if(count($listadoLocalidades) > 0){
	foreach ($listadoLocalidades as $localidad) {
		$respuesta .= "<option value=" . $localidad->getIdLocalidad() . ">" .  $localidad->getDescripcion() . "</option>";
	}
}else{
	print "<option value='0'>-- SELECCIONE --</option>";
}

echo $respuesta;

?>