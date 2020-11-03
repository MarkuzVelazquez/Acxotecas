$(document).ready(function(){

	$("#pay").click(function(){
		var datos = {
			user: $("#id_user").val(),
			pago: $("#pago").val()
		};
		$.ajax({
                data:  datos,
                url:   'controler/update.php',
                type:  'post',
                beforeSend: function () {
                        $("#result_pay").html("<img width=\"50\" src=\"../img/load.gif\">");
                },
                success:  function (response) {
                        $("#result_pay").html(response);
                }
        });

		
	});
});