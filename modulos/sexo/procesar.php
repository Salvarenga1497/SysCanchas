<?php

require_once "../../clases/Sexo.php";

$descripcion = trim($_POST['txtNombre']);

if (strlen($descripcion) < 3) {
	header("location: nuevo.php?error=descripcion");
	exit;
}

$sexo = new Sexo();

$sexo->setDescripcion($descripcion);

$sexo->guardar();

header("location: listado.php");


?>