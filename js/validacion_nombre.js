
function validarNombre() {

	event.preventDefault();

	var nombre = document.getElementById("txtNombre").value;

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


	else {
		document.getElementById("FormularioUsuario").submit();
	}

}

