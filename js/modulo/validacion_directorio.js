<!DOCTYPE html>
<html lang="en">
<head>
    <script>
    function validarDirectorio() {
            var directorio = document.getElementById("txtDirectorio").value;

            if (directorio.trim() == "") {
                alert("Debe completar el campo directorio");
            } 
            
            if (directorio.length < 3) {
                alert("El directorio debe contener mas de 3 carácteres");
            } 
        }
    </script>
</head>
<body>
</body>
</html>