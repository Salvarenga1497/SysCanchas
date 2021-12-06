<?php

require_once "../../clases/Agenda.php";
require_once "../../clases/Dia.php";

$idAgenda = $_GET["id_agenda"];
$idUsuario = $_GET["id_usuario"];

$dia= Dia::obtenerPorIdAgenda($idAgenda);

?>
<!DOCTYPE html>
<html>
<head>
    <title>FUTLINE</title>
    <meta charset="UTF-8">
    <meta name="Author" content="Alvarenga Sebastian" >
    <meta name="description" content="Alquilar canchas de futbol">
    <meta name="keywords" content="futbol, alquilar, cancha, futbol5, formosa">
    <link rel="shortcut icon" href="../../imagenes/logo/logoo.png">
    <link rel="STYLESHEET" type="text/css" href="../../css/menu.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/pie.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/body.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/dia.css">
    <link rel="STYLESHEET" type="text/css" href="../../css/nombre.css">
</head>
<body>  

    <header>
        <img src="../../imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

	<div>

        <?php require_once "../../menu.php";?>

    </div>
	
	<br><br>


    <div id="Principal">

         <div class="Nombre">

            <?php echo "Dias de Atencion"?>

        </div>

    <div class="Form">

		<form method="POST" action= "procesar.php" class="Formulario">  

        <input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">

        <label>Dias:</label><br>
       		<input type="hidden" name="txtIdAgenda" value="<?php echo $idAgenda; ?>">
            <input type="hidden" name="txtIdUsario" value="<?php echo $idUsuario; ?>">
            Lunes: <input type="checkbox" name="chkLunes" value="1" <?php if($dia->getLunes() == "1") echo "checked"?>>
            Martes: <input type="checkbox" name="chkMartes" value="1" <?php if($dia->getMartes() == "1") echo "checked"?>>
            Miercoles: <input type="checkbox" name="chkMiercoles" value="1" <?php if($dia->getMiercoles() == "1") echo "checked"?>>
            Jueves: <input type="checkbox" name="chkJueves" value="1" <?php if($dia->getJueves() == "1") echo "checked"?>>
            Viernes: <input type="checkbox" name="chkViernes" value="1" <?php if($dia->getViernes() == "1") echo "checked"?>>
            Sabado: <input type="checkbox" name="chkSabado" value="1" <?php if($dia->getSabado() == "1") echo "checked"?>>
            Domingo: <input type="checkbox" name="chkDomingo" value="1" <?php if($dia->getDomingo() == "1") echo "checked"?>>
            <br>

     <input class="Guardar" type="submit" value="Guardar">

</form>
</div>
</div>
<div id="Pie">

        <?php require_once "../../pie.php";?>

    </div>
</body>
</html>
