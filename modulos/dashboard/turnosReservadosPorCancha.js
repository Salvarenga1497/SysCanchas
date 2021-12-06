<?php
require_once "clases/Turno.php";

$lista = Turno::obtenerLaCanchasMasAlquilada();

$dataPoints = [];

foreach ($lista as $CantidadTurnos){
    $dataPoints[] = array('label' =>$CantidadTurnos['0'] , 'y' => $CantidadTurnos['1']);
}

?>
<script>


window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Cantidad de turnos Reservados por cancha"
    },
    axisY:{
        includeZero: true
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        //indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        indexLabelPlacement: "outside",   
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}

</script>

<div id="chartContainer" style="height: 300px; width: 40%; float: left; display: inline-block">
</div>

