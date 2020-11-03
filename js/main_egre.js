$(document).ready(function(){

	$("#enviar_egreso").click(function(){
		var datos = {
			tipo: $("#tipo_egresado").val(),
			email: $("#email_egresado").val(),
			paterno: $("#paterno_egresado").val(),
			materno: $("#materno_egresado").val(),
			nombre: $("#nombre_egresado").val(),
			dia: $("#dia_egresado").val(),
			mes: $("#mes_egresado").val(),
			anio: $("#anio_egresado").val(),
			lugar: $("#lugar_egresado").val(),
			edad: $("#edad_egresado").val(),
			sexo: $("#sexo_egresado").val(),
			enfermedad: $("#enfermedad_egresado").val(),
			sangre: $("#sangre_egresado").val(),
			alergia: $("#alergia_egresado").val(),
			ocupacion: $("#ocupacion_egresado").val(),
			evento: $("#evento_egresado").val(),
			categoria: $("#categoria_egresado").val(),
			no_cuenta: $("#no_cuenta_egresado").val(),
			mes_de_egresado: $("#mes_de_egresado").val(),
			anio_de_egresado: $("#anio_de_egresado").val(),
			licenciatura_egresado: $("#licenciatura_egresado").val(),
			fecha_reg: $("#fecha_reg_egresado").val(),
			costo: $("#costo_egresado").val(),
			taller: $("#taller_egresado").val(),
			capture_captcha: $("#capture_captcha_egresado").val(),
			re_captcha: $("#re_captcha_egresado").val()
		};
		$.ajax({
                data:  datos,
                url:   'controler/egreso.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado_egresado").html("<img width=\"50\" src=\"img/load.gif\">");
                },
                success:  function (response) {
                        $("#resultado_egresado").html(response);
                }
        });

		
	});
});