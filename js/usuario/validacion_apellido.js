<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        function validarApellido() {
            var apellido = document.getElementById("txtApellido").value;

            if (apellido.trim() == "") {
                alert("Debe completar el campo apellido");
            } 
            
            if (apellido.length < 3) {
                alert("El apellido debe contener mas de 3 carácteres");
            } 
        }
    </script>
</head>
<body>
</body>
</html>