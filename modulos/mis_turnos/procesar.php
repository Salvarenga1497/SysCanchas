<?php
require_once "../../clases/Agenda.php";
require_once "../../clases/Dia.php";
require_once "../../clases/Turno.php";

$id_agenda = $_GET['id_agenda'];

$id_usuario = $_GET['id_usuario'];

$agendas = Agenda::obtenerPorId($id_agenda);

$agendas->actualizarGenerado();


$idCancha = $_GET['id_cancha'];

$agenda = Agenda::obtenerPorId($id_agenda);

$idAgenda=$agenda->getIdAgenda();
$fechaInicio=$agenda->getFechaInicio(); 
$fechaFin=$agenda->getFechaFin(); 
$horaInicioInicial=$agenda->getHoraInicio(); 
$horaFin=$agenda->getHoraFin();
$duracion=$agenda->getDuracion();

$diasAtencion = Dia::obtenerPorIdAgenda($idAgenda);

$d= [$diasAtencion->getLunes(),$diasAtencion->getMartes(),$diasAtencion->getMiercoles(),$diasAtencion->getJueves(),$diasAtencion->getViernes(),$diasAtencion->getSabado(),$diasAtencion->getDomingo()
];


$fechaInicio = new DateTime($fechaInicio);
$fechaFin = new DateTime($fechaFin);

$horaInicio = new DateTime($horaInicioInicial);
$horaFin = new DateTime($horaFin);
$duracion = new DateTime($duracion);

$intervalo = $fechaInicio->diff($fechaFin);
$dias = $intervalo->format('%a');

$intervalo = $horaInicio->diff($horaFin);
$horas = $intervalo->format('%h');


$interval = new DateInterval("P1D");
$addhoraInicio = new DateInterval("PT1H");
$addhoraInicioFin = new DateInterval("PT1H");

for ($i = 0; $i <= $dias; $i++) {
		if ($horaInicio == $horaFin) {
			$horaInicio = new DateTime($horaInicioInicial);
		}
		$numeroDia = $fechaInicio->format("N");
		if ($d[$numeroDia-1] == 1) {
			for ($ii= 0; $ii < $horas; $ii++) {

				

						$fechaInicio->format("Y-m-D");
					
						$fechaInicioCargar = $fechaInicio->format('Y-m-d');
						
						$horaInicio->format("H");
						$horaFin->format("H");

						$horaInicioCargar = $horaInicio->format('H:i');

						$horaInicioF = new DateTime($horaInicioCargar);;
						$horaInicioF->format("H");

						$horaFinCargarF= $horaInicioF->add(new DateInterval("PT1H"));
						
						$horaFinCargar = $horaFinCargarF->format('H:i');

						$turno = new Turno();
						$turno->setRelaCancha($idCancha);
						$turno->setRelaAgenda($idAgenda);
						$turno->setFecha($fechaInicioCargar); 
						$turno->setHoraInicio($horaInicioCargar);
						$turno->setHoraFin($horaFinCargar);
						$turno->guardar();
						$horaInicio->add($addhoraInicio);
						
				
		}
	}
	
	$fechaInicio->add($interval);
}		
header("location: listado.php?id_usuario=" . $id_usuario);






?>