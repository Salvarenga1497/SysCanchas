function ConvertirStringToDate(fechaString){
	event.preventDefault();
	var fechas = fechaString.split('/');
	if (fechas.length != 3)
		fecha = fechaString.split('-');

	var tipoDate = new Date(fechas[2], fechas[1], fechas[0]);


	return tipoDate;
}


function ConvertirStringToTime(timeString){
	event.preventDefault();
	var horas = timeString.split(':');
	if (horas.length != 2)
		horas = timeString.split('-');

	var tipoHora = new Date(horas[1], horas[0]);


	return tipoHora;
}


function validarAgenda(stringFechaDesde, stringFechaHasta,stringHoraDesde,stringHoraHasta) {

	event.preventDefault();

	stringFechaDesde=document.getElementById(stringFechaDesde).value;
	stringFechaHasta=document.getElementById(stringFechaHasta).value;

	stringHoraDesde=document.getElementById(stringHoraDesde).value;
	stringHoraHasta=document.getElementById(stringHoraHasta).value;

	var dateDesde = stringFechaDesde;
	var dateHasta = stringFechaHasta;

	var timeDesde = stringHoraDesde;
	var timeHasta = stringHoraHasta;

	Validador = { Estado: true, Mensaje: '' };

	if (stringFechaDesde == "") {
		swal({
			title: "La fecha de Inicio no debe estar vacio",
			icon: "warning",
		});

	}

	else if (stringFechaHasta == "") {
		swal({
			title: "La fecha de Fin no debe estar vacio",
			icon: "warning",
		});

	}

	else if (dateDesde > dateHasta) {
		swal({
			title: "La fecha de fin no puede ser menor a la de inicio.",
			icon: "warning",
		});

	}


	else if (stringHoraDesde == "") {
		swal({
			title: "La hora de Inicio no debe estar vacio",
			icon: "warning",
		});

	}


	else if (stringHoraHasta == "") {
		swal({
			title: "La hora de Fin no debe estar vacio",
			icon: "warning",
		});

	}

	

	else if (timeDesde > timeHasta) {
		swal({
			title: "La hora de fin no puede ser menor a la de inicio.",
			icon: "warning",
		});

	}
	
	

	else {
		document.getElementById("FormularioAgenda").submit();
	}

}
