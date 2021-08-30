<?php

require_once "../../clases/Canchas.php";


$id_cancha = $_POST["txtIdCancha"];
$nombre = $_POST['txtNombre'];
$usuario = $_POST['cboUsuario'];
$estado = $_POST['txtEstado'];

$usuario = Usuario::obtenerPorid($usuario);

$cancha = Cancha::obtenerPorId($id_cancha);

$cancha->setRelaEntidades($usuario->getRelaEntidades());
$cancha->setNombre($nombre);
$cancha->setEstado($estado);

$cancha->actualizar();

header("location: listado.php");



?>