function validarTodo() {

  event.preventDefault();

  var apellido = document.getElementById("txtApellido").value;
  var usuario=document.getElementById('cboPerfil');
  var username = document.getElementById("txtUserName").value;  
  var noValido = /\s/;
  var soloLetras= /^[a-zA-Z]*$/
  var nombre = document.getElementById("txtNombre").value;
  var documento = document.getElementById("txtDocumento").value;


if (documento.trim() == "") {
    swal({
        title: "El documento no puede estar vacio",
        icon: "warning",
    }); 
}

else if (documento.length < 7) {
    swal({
        title: "El documento debe contener minimo 7 carácteres",
        icon: "warning",
    });
} 

else if(soloLetras.test(documento)){ 
    event.preventDefault();
    swal({
        title: "El documento no puede contener letras ",
        icon: "warning",
    });
}

else if (nombre.trim() == "") {
    swal({
        title: "El nombre no puede estar vacio",
        icon: "warning",
    }); 

}


else if(!soloLetras.test(nombre)){ 
    event.preventDefault();
    swal({
        title: "El username no puede contener numeros o simbolos ",
        icon: "warning",
    });
}

else if (nombre.length < 3) {
    swal({
        title: "El nombre debe contener mas de 3 carácteres",
        icon: "warning",
    });
} 

else if(!soloLetras.test(apellido)){ 
    event.preventDefault();
    swal({
        title: "El username no puede contener numeros o simbolos ",
        icon: "warning",
    });
}

else if (apellido.trim() == "") {
    swal({
        title: "Debe completar el campo apellido",
        icon: "warning",
    });
} 

else if (apellido.length < 3) {
    swal({
        title: "El apellido debe contener mas de 3 carácteres",
        icon: "warning",
    });
} 


else if(noValido.test(username)){ 
    event.preventDefault();
    swal({
        title: "El username no puede contener espacios en blanco",
        icon: "warning",
    });

}

else if(!soloLetras.test(username)){ 
    event.preventDefault();
    swal({
        title: "El username no puede contener numeros o simbolos ",
        icon: "warning",
    });
}   

else if (username.length < 6) {
    event.preventDefault();
    swal({
        title: "El username debe contener 6 o mas carácteres",
        icon: "warning",
    });
} 

else if(usuario.value=="--Seleccionar--"||usuario.value == "NULL") {
    swal({
        title: "Selecciona Una opción en campo Perfil",
        icon: "warning",
    });
    usuario.focus();
}


else {
  document.getElementById("FormularioUsuario").submit();
}



}

