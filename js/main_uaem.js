$(document).ready(function(){

	$("#uaemjob").click(function(){
		var datos = {
			tipo: $("#tipo_uaemjob").val(),
			email: $("#email_uaemjob").val(),
			paterno: $("#paterno_uaemjob").val(),
			materno: $("#materno_uaemjob").val(),
			nombre: $("#nombre_uaemjob").val(),
			dia: $("#dia_uaemjob").val(),
			mes: $("#mes_uaemjob").val(),
			anio: $("#anio_uaemjob").val(),
			lugar: $("#lugar_uaemjob").val(),
			edad: $("#edad_uaemjob").val(),
			sexo: $("#sexo_uaemjob").val(),
			enfermedad: $("#enfermedad_uaemjob").val(),
			sangre: $("#sangre_uaemjob").val(),
			alergia: $("#alergia_uaemjob").val(),
			ocupacion: $("#ocupacion_uaemjob").val(),
			evento: $("#evento_uaemjob").val(),
			categoria: $("#categoria_uaemjob").val(),
			fecha_reg: $("#fecha_reg_uaemjob").val(),
			costo: $("#costo_uaemjob").val(),
			taller: $("#taller_uaemjob").val(),
			capture_captcha: $("#capture_captcha_uaemjob").val(),
			re_captcha: $("#re_captcha_uaemjob").val()
		};
		$.ajax({
                data:  datos,
                url:   'controler/trabajador.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado_uaemjob").html("<img width=\"50\" src=\"img/load.gif\">");
                },
                success:  function (response) {
                        $("#resultado_uaemjob").html(response);
                }
        });

		
	});
});