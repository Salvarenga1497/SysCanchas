<?php

require_once "../../clases/Agenda.php";
require_once "../../clases/Dia.php";

$idAgenda = $_GET["id_agenda"];

$dia= Dia::obtenerPorIdAgenda($idAgenda);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php require_once "../../menu.php";?>
	
	<br><br>

		<form method="POST" action= "procesar.php">  


        <label>Dias:</label><br>
       		<input type="hidden" name="txtIdAgenda" value="<?php echo $idAgenda; ?>">
            Lunes: <input type="checkbox" name="chkLunes" value="1" <?php if($dia->getLunes() == "1") echo "checked"?>>
            Martes: <input type="checkbox" name="chkMartes" value="1" <?php if($dia->getMartes() == "1") echo "checked"?>>
            Miercoles: <input type="checkbox" name="chkMiercoles" value="1" <?php if($dia->getMiercoles() == "1") echo "checked"?>>
            Jueves: <input type="checkbox" name="chkJueves" value="1" <?php if($dia->getJueves() == "1") echo "checked"?>>
            Viernes: <input type="checkbox" name="chkViernes" value="1" <?php if($dia->getViernes() == "1") echo "checked"?>>
            Sabado: <input type="checkbox" name="chkSabado" value="1" <?php if($dia->getSabado() == "1") echo "checked"?>>
            Domingo: <input type="checkbox" name="chkDomingo" value="1" <?php if($dia->getDomingo() == "1") echo "checked"?>>
            <br><br>

     <input type="submit" value="Guardar">

</form>
</div>
</body>
</html>
