
                function Validar(user, pass)
                {
                    $.ajax({
                        url: "controler/validar.php",
                        type: "POST",
                        data: "user="+user+"&pass="+pass,
                        beforeSend: function () {
                        $("#resultado").html("<img width=\"50\" src=\"img/load.gif\">");
                },
                        success: function(resp){
                            $('#resultado').html(resp)
                        }        
                    });
                }
