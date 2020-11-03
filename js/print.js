$(document).ready(function(){

	$("#search").click(function(){
		var datos = {
			email: $("#search_email").val(),
		};
		$.ajax({
                data:  datos,
                url:   'pdf/pdf_generator.php',
                type:  'post',
                beforeSend: function () {
                        $("#result_search").html("<img width=\"50\" src=\"img/load.gif\">");
                },
                success:  function (response) {
                        $("#result_search").html(response);
                }
        });

		
	});
});