<?php

require_once "../../clases/Modulo.php";

$descripcion = trim($_POST['txtNombre']);
$directorio = trim($_POST['txtDirectorio']);

if (strlen($descripcion) < 3) {
	header("location: nuevo.php?error=nombre");
	exit;
}

if (strlen($directorio) < 3) {
	header("location: nuevo.php?error=directorio");
	exit;
}



$modulo = new Modulo();

$modulo->setDescipcion($descripcion);
$modulo->setDirectorio($directorio);


$modulo->guardar();

header("location: listado.php");


?>