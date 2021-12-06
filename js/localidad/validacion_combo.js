<!DOCTYPE html>
<html lang="en">
<head>
    <script>
    	function validarCombo(){
			var usuario=document.getElementById('cboProvincia');
			if(usuario.value=="--Seleccionar--"||usuario.value == "NULL") {
   				alert("Selecciona Una opción en campo Provincia");
    			 usuario.focus();
  			}
}
  
    </script>
</head>
<body>
</body>
</html>