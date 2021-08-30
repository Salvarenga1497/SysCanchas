<?php

require_once "../../clases/Perfil.php";

$descripcion = $_POST['txtNombre'];

$perfil = new Perfil();

$perfil->setDescipcion($descripcion);

$perfil->guardar();

header("location: listado.php");


?>