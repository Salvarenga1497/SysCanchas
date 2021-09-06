<?php


$idProvincia = $_GET['id'];

$respuesta = "";

$respuesta = "<option value='0'>Seleccionar</option>";

if ($idProvincia == 1) {
	$respuesta .= "<option value='1'>Formosa</option>";
	$respuesta .= "<option value='2'>Clorinda</option>";
} else if ($idProvincia == 2) {
	$respuesta .= "<option value='5'>Resistencia</option>";
	$respuesta .= "<option value='6'>Roque S. P.</option>";
}

echo $respuesta;


?>