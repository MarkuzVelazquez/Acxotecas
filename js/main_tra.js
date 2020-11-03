$(document).ready(function(){

	$("#trabajador_uaem").click(function(){
		var datos = {
			tipo: $("#tipo_trabajador").val(),
			email: $("#email_trabajador").val(),
			paterno: $("#paterno_trabajador").val(),
			materno: $("#materno_trabajador").val(),
			nombre: $("#nombre_trabajador").val(),
			dia: $("#dia_trabajador").val(),
			mes: $("#mes_trabajador").val(),
			anio: $("#anio_trabajador").val(),
			lugar: $("#lugar_trabajador").val(),
			edad: $("#edad_trabajador").val(),
			sexo: $("#sexo_trabajador").val(),
			enfermedad: $("#enfermedad_trabajador").val(),
			sangre: $("#sangre_trabajador").val(),
			alergia: $("#alergia_trabajador").val(),
			ocupacion: $("#ocupacion_trabajador").val(),
			evento: $("#evento_trabajador").val(),
			categoria: $("#categoria_trabajador").val(),
			fecha_reg: $("#fecha_reg_trabajador").val(),
			costo: $("#costo_trabajador").val(),
			taller: $("#taller_trabajador").val(),
			capture_captcha: $("#capture_captcha_trabajador").val(),
			re_captcha: $("#re_captcha_trabajador").val()
		};
		$.ajax({
                data:  datos,
                url:   'controler/worker.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado_trabajador").html("<img width=\"50\" src=\"img/load.gif\">");
                },
                success:  function (response) {
                        $("#resultado_trabajador").html(response);
                }
        });

		
	});
});