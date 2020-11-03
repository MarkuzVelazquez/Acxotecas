$(document).ready(function(){

	$("#runner").click(function(){
		var datos = {
			email: $("#runner_email").val(),
		};
		$.ajax({
                data:  datos,
                url:   'runner/runner.php',
                type:  'post',
                beforeSend: function () {
                        $("#result_runner").html("<img width=\"50\" src=\"img/load.gif\">");
                },
                success:  function (response) {
                        $("#result_runner").html(response);
                }
        });

		
	});
});