<?php

require_once "../../clases/Turno.php";


$id = $_POST['cboFechas'];

$turno = Turno::obtenerPorId($id);

$fecha = $turno->getFecha();

$idCancha= $turno->getRelaCancha();

$listadoHorarios = Turno::obtenerTodosLosHorariosLibresPorFecha($idCancha,$fecha);

$respuesta = "";

$respuesta = "<option value='0'>Seleccionar</option>";

if(count($listadoHorarios) > 0){
	foreach ($listadoHorarios as $horarios) {
		$respuesta .= "<option value=" . $horarios->getIdTurno() . ">" .  $horarios->getHoraInicio() . "a" . $horarios->getHoraFin() ."</option>";
	}
}else{
	print "<option value='0'>-- SELECCIONE --</option>";
}

echo $respuesta;

?>