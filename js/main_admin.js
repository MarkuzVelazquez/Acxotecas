$(document).ready(function(){

	$("#administrativo_uaem").click(function(){
		var datos = {
			tipo: $("#tipo_administrativo").val(),
			email: $("#email_administrativo").val(),
			paterno: $("#paterno_administrativo").val(),
			materno: $("#materno_administrativo").val(),
			nombre: $("#nombre_administrativo").val(),
			dia: $("#dia_administrativo").val(),
			mes: $("#mes_administrativo").val(),
			anio: $("#anio_administrativo").val(),
			lugar: $("#lugar_administrativo").val(),
			edad: $("#edad_administrativo").val(),
			sexo: $("#sexo_administrativo").val(),
			enfermedad: $("#enfermedad_administrativo").val(),
			sangre: $("#sangre_administrativo").val(),
			alergia: $("#alergia_administrativo").val(),
			ocupacion: $("#ocupacion_administrativo").val(),
			evento: $("#evento_administrativo").val(),
			categoria: $("#categoria_administrativo").val(),
			fecha_reg: $("#fecha_reg_administrativo").val(),
			costo: $("#costo_administrativo").val(),
			taller: $("#taller_administrativo").val(),
			capture_captcha: $("#capture_captcha_administrativo").val(),
			re_captcha: $("#re_captcha_administrativo").val()
		};
		$.ajax({
                data:  datos,
                url:   'controler/administrativo.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado_administrativo").html("<img width=\"50\" src=\"img/load.gif\">");
                },
                success:  function (response) {
                        $("#resultado_administrativo").html(response);
                }
        });

		
	});
});