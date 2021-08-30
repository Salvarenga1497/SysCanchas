<?php

require_once "../../clases/Canchas.php";
require_once "../../clases/Usuario.php";

$nombre = $_POST['txtNombre'];
$iduser = $_POST['cboUsuario'];

$usuario = Usuario::obtenerPorid($iduser);

$cancha = new Cancha();

$cancha->setNombre($nombre);
$cancha->setRelaEntidades($usuario->getRelaEntidades());
$cancha->guardar();

header("location: listado.php");


?>