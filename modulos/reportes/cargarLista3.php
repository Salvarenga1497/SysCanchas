<?php

require_once "../../clases/turno.php";

$fechaInicio=$_GET["fechaInicio"];
$fechaFin = $_GET["fechaFin"];


$respuesta = "";


$lista = Turno::obtenerLasCanchasMasAlquiladas($fechaInicio,$fechaFin);

if(sizeof($lista) > 0){
    $respuesta .= "
        <table class='Lista'>
            <thead>
                <tr class='Fila1'>
                    <th>Cancha</th>
                    <th>Cantidad de turnos Alquilados</th>
                </tr>
            </thead>
            ";
        foreach ($lista as $turno):
            $respuesta.="<tr class='tr'> "

                            ."<td>".$turno->cancha->getNombre()."</td> "
                            ."<td>".$turno->getCantidad()."</td> "
                        ."</tr>";

        endforeach;
        $respuesta.="
                
            </table>";
}
else{
    $respuesta = "No hay coincidencias";
}




echo $respuesta;

?>