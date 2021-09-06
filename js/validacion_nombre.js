<!DOCTYPE html>
<html lang="en">
<head>
    <script>
    function validarApellido() {
            var nombre = document.getElementById("txtNombre").value;

            if (nombre.trim() == "") {
                alert("Debe completar el campo nombre");
            } 
            
            if (nombre.length < 3) {
                alert("El nombre debe contener mas de 3 carácteres");
            } 
        }
    </script>
</head>
<body>
</body>
</html>