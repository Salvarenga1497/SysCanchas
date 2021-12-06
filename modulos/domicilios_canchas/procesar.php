<?php

require_once "../../clases/Domicilio.php";
require_once "../../clases/Cancha.php";

$idCancha = $_POST["txtIdCanchas"];
$idUsuario = $_POST["txtIdUsuario"];


$calle = $_POST['txtCalle'];
$altura = $_POST['txtAltura'];
$sector = $_POST['txtSector'];
$manzana = $_POST['txtManzana'];
$casa = $_POST['txtCasa'];
$torre = $_POST['txtTorre'];
$piso = $_POST['txtPiso'];
$departamento = $_POST['txtDepartamento'];
$provincia = $_POST['cboProvincias'];
$localidad = $_POST['cboLocalidades'];
$barrio = $_POST['cboBarrio'];

$domicilio = new Domicilio();

$domicilio->setRelaCanchas($idCancha);
$domicilio->setCalle($calle);
$domicilio->setAltura($altura);
$domicilio->setSector($sector);
$domicilio->setManzana($manzana);
$domicilio->setCasa($casa);
$domicilio->setTorre($torre);
$domicilio->setPiso($piso);
$domicilio->setDepartamento($departamento);
$domicilio->setRelaBarrio($barrio);


$domicilio->guardarCancha();

header("location: listado.php?id_cancha=" . $idCancha . "&id_usuario=" . $idUsuario);


?>