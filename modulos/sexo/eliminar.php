<?php

require_once "../../clases/Sexo.php";

$idSexo = $_GET['id_sexo'];

$sexo = Sexo::obtenerPorId($idSexo);
$sexo->eliminar();

header("location: listado.php");


?>