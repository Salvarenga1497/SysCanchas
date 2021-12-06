
function validarNombre() {

	event.preventDefault();

	var nombre = document.getElementById("txtNombre").value;

	var usuario=document.getElementById('cboUsuario');

	if (nombre.trim() == "") {
		swal({
			title: "El nombre no puede estar vacio",
			icon: "warning",
		}); 

	}

	else if (nombre.length < 3) {
    swal({
        title: "El nombre debe contener mas de 3 carácteres",
        icon: "warning",
    });
} 

	else if(usuario.value=="--Seleccionar--"||usuario.value == "NULL") {
		swal({
			title: "Selecciona una opción en campo Usuario",
			icon: "warning",
		});
		usuario.focus();
	}


	else {
		document.getElementById("FormularioCancha").submit();
	}

}
