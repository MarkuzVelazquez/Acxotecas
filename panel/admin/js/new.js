$(document).ready(function(){

	$("#event").click(function(){
		var datos = {
			nombre: $("#name").val(),
			dia: $("#dia").val(),
			mes: $("#mes").val(),
			anio: $("#anio").val(),
			texto: $("#texto").val()
		};
		$.ajax({
                data:  datos,
                url:   'controler/upload_event.php',
                type:  'post',
                beforeSend: function () {
                        $("#result_event").html("<img width=\"50\" src=\"img/load.gif\">");
                },
                success:  function (response) {
                        $("#result_event").html(response);
                }
        });

		
	});
});