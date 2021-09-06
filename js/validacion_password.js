<!DOCTYPE html>
<html lang="en">
<head>
    <script>
   function validarPassword(){
    var password = document.getElementById("txtPassword").value;  

    var noValido = /\s/;

    if(noValido.test(password)){ 
         alert ("La contraseña no puede contener espacios en blanco"); 
        return false; 
        }   

     if (password.length < 8) {
                alert("La contraseña debe contener mas de 8 carácteres");
            } 
    }
    </script>
</head>
<body>
</body>
</html>