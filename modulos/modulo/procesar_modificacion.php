<?php

require_once "../../clases/Modulo.php";


$id_modulo = $_POST["txtIdModulo"];
$descripcion = $_POST['txtNombre'];
$directorio = $_POST['txtDirectorio'];



$modulo = Modulo::obtenerPorId($id_modulo);

$modulo->setDescipcion($descripcion);
$modulo->setDirectorio($directorio);


$modulo->actualizar();

header("location: listado.php");



?>