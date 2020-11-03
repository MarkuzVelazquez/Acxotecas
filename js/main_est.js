$(document).ready(function(){

	$("#alumno").click(function(){
		var datos = {
			tipo: $("#tipo_estudiante").val(),
			email: $("#email_estudiante").val(),
			paterno: $("#paterno_estudiante").val(),
			materno: $("#materno_estudiante").val(),
			nombre: $("#nombre_estudiante").val(),
			dia: $("#dia_estudiante").val(),
			mes: $("#mes_estudiante").val(),
			anio: $("#anio_estudiante").val(),
			lugar: $("#lugar_estudiante").val(),
			edad: $("#edad_estudiante").val(),
			sexo: $("#sexo_estudiante").val(),
			enfermedad: $("#enfermedad_estudiante").val(),
			sangre: $("#sangre_estudiante").val(),
			alergia: $("#alergia_estudiante").val(),
			ocupacion: $("#ocupacion_estudiante").val(),
			evento: $("#evento_estudiante").val(),
			categoria: $("#categoria_estudiante").val(),
			no_cuenta: $("#no_cuenta").val(),
			licenciatura: $("#licenciatura").val(),
			semestre: $("#semestre").val(),
			turno: $("#turno").val(),
			grupo: $("#grupo").val(),
			fecha_reg: $("#fecha_reg_estudiante").val(),
			costo: $("#costo_estudiante").val(),
			taller: $("#taller_estudiante").val(),
			capture_captcha: $("#capture_captcha_estudiante").val(),
			re_captcha: $("#re_captcha_estudiante").val()
		};
		$.ajax({
                data:  datos,
                url:   'controler/student.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado_alumno").html("<img width=\"50\" src=\"img/load.gif\">");
                },
                success:  function (response) {
                        $("#resultado_alumno").html(response);
                }
        });

		
	});
});