<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        function validarNombre() {
            var nombre = document.getElementById("txtApellido").value;

            if (nombre.trim() == "") {
                alert("Debe completar el campo apellido");
            } 
            
            if (nombre.length < 3) {
                alert("El apellido debe contener mas de 3 carácteres");
            } 
        }
    </script>
</head>
<body>
</body>
</html>