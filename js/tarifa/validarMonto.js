<!DOCTYPE html>
<html lang="en">
<head>
    <script>
    function validarMonto() {
            var monto = document.getElementById("numMonto").value;

            if (monto.trim() == "") {
                alert("Debe completar el campo monto");
            } 
            
            if (monto.length < 3) {
                alert("El monto debe contener mas de 3 carácteres");
            } 
        }
    </script>
</head>
<body>
</body>
</html>