<!DOCTYPE html>
<html lang="en">
<head>
    <script>
   function validarUserName(){
    var username = document.getElementById("txtUserName").value;  

    var noValido = /\s/;

    if(noValido.test(username)){ 
         alert ("El username no puede contener espacios en blanco"); 
        return false; 
        }   

     if (username.length < 6) {
                alert("El username debe contener 6 o mas carácteres");
            } 
    }
    </script>
</head>
<body>
</body>
</html>