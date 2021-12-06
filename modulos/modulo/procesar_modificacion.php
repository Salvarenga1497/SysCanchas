<?php

require_once "../../clases/Modulo.php";

$idUsuario = $_POST['txtIdUsuario'];
$id_modulo = $_POST["txtIdModulo"];
$descripcion = trim($_POST['txtNombre']);
$directorio = trim($_POST['txtDirectorio']);

if (strlen($descripcion) < 3) {
	header("location: modificar.php?error=nombre&id_modulo=" . $id_modulo ."&id_usuario=".$idUsuario);
	exit;
}

if (strlen($directorio) < 3) {
	header("location: modificar.php?error=nombre&id_modulo=" . $id_modulo."&id_usuario=".$idUsuario);
	exit;
}




$modulo = Modulo::obtenerPorId($id_modulo);

$modulo->setDescipcion($descripcion);
$modulo->setDirectorio($directorio);


$modulo->actualizar();

header("location: listado.php?id_usuario=".$idUsuario);



?>