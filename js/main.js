$(document).ready(function(){

	$("#enviar").click(function(){
		var datos = {
			tipo: $("#tipo").val(),
			email: $("#email").val(),
			paterno: $("#paterno").val(),
			materno: $("#materno").val(),
			nombre: $("#nombre").val(),
			dia: $("#dia").val(),
			mes: $("#mes").val(),
			anio: $("#anio").val(),
			lugar: $("#lugar").val(),
			edad: $("#edad").val(),
			sexo: $("#sexo").val(),
			enfermedad: $("#enfermedad").val(),
			sangre: $("#sangre").val(),
			alergia: $("#alergia").val(),
			ocupacion: $("#ocupacion").val(),
			evento: $("#evento").val(),
			categoria: $("#categoria").val(),
			fecha_reg: $("#fecha_reg").val(),
			costo: $("#costo").val(),
			taller: $("#taller").val(),
			capture_captcha: $("#capture_captcha").val(),
			re_captcha: $("#re_captcha").val()
		};
		$.ajax({
                data:  datos,
                url:   'controler/proceso.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("<img width=\"50\" src=\"img/load.gif\">");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });

		
	});
});