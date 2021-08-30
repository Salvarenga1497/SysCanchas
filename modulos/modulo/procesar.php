<?php

require_once "../../clases/Modulo.php";

$descripcion = $_POST['txtNombre'];
$directorio = $_POST['txtDirectorio'];

$modulo = new Modulo();

$modulo->setDescipcion($descripcion);
$modulo->setDirectorio($directorio);


$modulo->guardar();

header("location: listado.php");


?>