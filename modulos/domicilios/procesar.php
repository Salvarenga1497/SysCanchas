<?php

require_once "../../clases/Domicilio.php";
require_once "../../clases/Usuario.php";

$idEntidad = $_POST["txtIdEntidad"];


$calle = $_POST['txtCalle'];
$altura = $_POST['txtAltura'];
$sector = $_POST['txtSector'];
$manzana = $_POST['txtManzana'];
$casa = $_POST['txtCasa'];
$torre = $_POST['txtTorre'];
$piso = $_POST['txtPiso'];
$departamento = $_POST['txtDepartamento'];
$provincia = $_POST['cboProvincia'];
$localidad = $_POST['cboLocalidad'];
$barrio = $_POST['cboBarrio'];

$domicilio = new Domicilio();

$domicilio->setRelaEntidad($idEntidad);
$domicilio->setCalle($calle);
$domicilio->setAltura($altura);
$domicilio->setSector($sector);
$domicilio->setManzana($manzana);
$domicilio->setCasa($casa);
$domicilio->setTorre($torre);
$domicilio->setPiso($piso);
$domicilio->setDepartamento($departamento);
$domicilio->setRelaBarrio($barrio);


$domicilio->guardar();

header("location: listado.php?id_entidad=" . $idEntidad . "&modulo=usuarios");


?>