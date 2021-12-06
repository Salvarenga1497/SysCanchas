<?php

require_once "../../clases/Contacto.php";

$idUsuario = $_POST["txtIdUsuario"];
$idEntidad = $_POST["txtIdEntidad"];
$idTipoContacto = $_POST["cboTipoContacto"];
$valor = $_POST["txtValor"];

$contacto = new Contacto();

$contacto->setRelaEntidad($idEntidad);
$contacto->setRelaTipoContacto($idTipoContacto);
$contacto->setValor($valor);

$contacto->guardar();

header("location: contacto.php?id_entidad=" . $idEntidad . "&id_usuario=" . $idUsuario);

?>