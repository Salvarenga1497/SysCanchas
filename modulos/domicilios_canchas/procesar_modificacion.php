<?php

require_once "../../clases/Domicilio.php";

$idCancha = $_POST["txtIdCancha"];
$id_domicilio = $_POST["txtIdDomicilio"];
$idUsuario = $_POST["txtIdUsuario"];
$calle = $_POST['txtCalle'];
$altura = $_POST['txtAltura'];
$sector = $_POST['txtSector'];
$manzana = $_POST['txtManzana'];
$casa = $_POST['txtCasa'];
$torre = $_POST['txtTorre'];
$piso = $_POST['txtPiso'];
$departamento = $_POST['txtDepartamento'];
$barrio = $_POST['cboBarrio'];



$domicilio = Domicilio::obtenerPorId($id_domicilio);

$domicilio->setIdDomicilio($id_domicilio);
$domicilio->setCalle($calle);
$domicilio->setAltura($altura);
$domicilio->setSector($sector);
$domicilio->setManzana($manzana);
$domicilio->setCasa($casa);
$domicilio->setTorre($torre);
$domicilio->setPiso($piso);
$domicilio->setDepartamento($departamento);
$domicilio->setRelaBarrio($barrio);

$domicilio->actualizar();

header("location: listado.php?id_cancha=" . $idCancha. "&id_usuario=" . $idUsuario);


?>