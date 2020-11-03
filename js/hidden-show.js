function mostrar(id) {
	if (id == "no") {
		$("#no").show();
		$("#si").hide();
	}
	if (id == "si") {
		$("#no").hide();
		$("#si").show();
	}
	if (id == "tipo") {
		$("#tipo").show();
		$("#estudiante").hide();
		$("#egresado").hide();
		$("#profesor").hide();
		$("#administrativo").hide();
		$("#trabajador").hide();
	}	
	if (id == "estudiante") {
		$("#tipo").hide();
		$("#estudiante").show();
		$("#egresado").hide();
		$("#profesor").hide();
		$("#administrativo").hide();
		$("#trabajador").hide();
	}
	if (id == "egresado") {
		$("#tipo").hide();
		$("#estudiante").hide();
		$("#egresado").show();
		$("#profesor").hide();
		$("#administrativo").hide();
		$("#trabajador").hide();
	}
	if (id == "profesor") {
		$("#tipo").hide();
		$("#estudiante").hide();
		$("#egresado").hide();
		$("#profesor").show();
		$("#administrativo").hide();
		$("#trabajador").hide();
	}
	if (id == "administrativo") {
		$("#tipo").hide();
		$("#estudiante").hide();
		$("#egresado").hide();
		$("#profesor").hide();
		$("#administrativo").show();
		$("#trabajador").hide();
	}	
	if (id == "trabajador") {
		$("#tipo").hide();
		$("#estudiante").hide();
		$("#egresado").hide();
		$("#profesor").hide();
		$("#administrativo").hide();
		$("#trabajador").show();
	}
}
