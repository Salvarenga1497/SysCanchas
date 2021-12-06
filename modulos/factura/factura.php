<?php  

require_once "../../clases/Turno.php";
require_once "../../clases/Tarifa.php";
require_once "../../clases/Factura.php";
require_once "../../clases/EstadoPago.php";
require_once "../../clases/TipoPago.php";;

$idTurno = $_GET["id_turno"];

$turnos = Turno::obtenerPorId($idTurno);

$horaFin = $turnos->getHoraFin();

$factura = Factura::obtenerPorIdTurno($idTurno);

$idCancha = $turnos->getRelaCancha();

$listaTarifa = Tarifa::obtenerPorIdCancha($idCancha);


$tarifaDia = $listaTarifa[0];
$tarifaNoche = $listaTarifa[1];

$horaInicioTurno =  $factura->turno->getHoraInicio();

$tarifa = 0;

if ($horaInicioTurno <= $tarifaDia->getHoraFin() ) {
    $tarifa = $tarifaDia->getMonto();
} else {
	$tarifa = $tarifaNoche->getMonto();
}


ob_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<table>
				<caption>Comprobante de Pago</caption>

					<tr>
						<td>Fecha Emision: <?php echo $factura->getFechaEmision(); ?></td>
					</tr>
					<tr>
						<td>Nro: <?php echo $factura->getIdFactura(); ?></td>
					</tr>
					<tr>
						<td>Fecha del Turno: <?php echo $factura->turno->getFecha(); ?></td>
					</tr>
					<tr>
						<td>Hora de Inicio: <?php echo $factura->turno->getHoraInicio(); ?></td>
					</tr>
					<tr>
						<td>Hora de Fin: <?php echo $factura->turno->getHoraFin(); ?></td>
					</tr>
					<tr>
						<td>Estado Del pago: <?php echo $factura->estadoPago->getDescripcion(); ?></td>
					</tr>
					<tr>
						<td>Modo Pago: <?php echo $factura->tipoPago->getDescripcion(); ?></td>
					</tr>
					<tr>
						<td>Monto: <?php echo "$" . $tarifa ?></td>
					</tr>

				</table>
				
</table>
</body>
</html>

<?php 
$html=ob_get_clean();


require_once "../../dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('c7');

$dompdf->render();

$dompdf->stream("archivo_.php", array("Attachment" => true));
?>