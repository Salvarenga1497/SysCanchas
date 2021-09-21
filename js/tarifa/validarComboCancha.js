<!DOCTYPE html>
<html lang="en">
<head>
    <script>
    	function validarComboCancha(){
			var cancha=document.getElementById('cboCanchas');
			if(cancha.value=="--Seleccionar--"||cancha.value == "NULL") {
   				alert("Selecciona Una opción en  el campo Cancha");
    			 cancha.focus();
  			}
}
  
    </script>
</head>
<body>
</body>
</html>