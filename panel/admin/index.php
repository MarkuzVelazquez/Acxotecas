<?php
session_start();
if (isset($_SESSION['usuario']))
{
    echo '<script>location.href = "welcome.php";</script>'; 
}
else
{
?>
<!DOCTYPE html>    
<html oncontextmenu="return false">
    <head>
        <title>Promoción Deportiva</title>
         <meta charset="UTF-8"/>
         <link rel="icon" href="../../img/uaem.png" />
        <link rel="stylesheet" href="css/estilos.css"/>
        <script src="js/jquery.min.js"></script> 
        <script src="js/start.js"></script>   
    </head>
    
    <body>
		
		<div id="principal">
        
        <header>
           <h2>Panel Admin</h2>            
        </header>
        		
        <section>
			
                <form method="POST" action="return false" onsubmit="return false">
                    <p>
                        <label>Usuario</label>
                        <input type="text" name="user" id="user" value="" placeholder="Usuario" class="email">
                    </p>
                    <p>
                        <label>Contraseña</label>
                        <input type="password" name="pass" id="pass" value="" placeholder="*******">
                    </p>
                    <p>
                        <button onclick="Validar(document.getElementById('user').value, document.getElementById('pass').value);">ENTRAR</button>
                    </p>
                    <br>
                    <div id="resultado"></div>
                </form>
        </section>
        </div>
            <div id="footer">
                <p id="legal">&copy;2015 Todos los derechos reservados Diseñado por <a href="#">Lic. Omar</a></p>
            </div>
    </body>
</html> 
<?php
}
?>       
