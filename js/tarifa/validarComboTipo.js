<!DOCTYPE html>
<html lang="en">
<head>
    <script>
    	function validarComboTipo(){
			var tipo=document.getElementById('cboTipo');
			if(tipo.value=="--Seleccionar--"||tipo.value == "NULL") {
   				alert("Selecciona Una opción en  el campo Tipo");
    			 tipo.focus();
  			}
}
  
    </script>
</head>
<body>
</body>
</html>