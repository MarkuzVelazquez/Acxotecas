<?php
session_start();
if (isset($_SESSION['usuario']))
{
?>
<!DOCTYPE html>
<html oncontextmenu="return false">
    <head>
        <title>Promoción Deportiva</title>
         <meta charset="UTF-8"/>
         <link rel="icon" href="../../img/uaem.png" />
        <link rel="stylesheet" href="css/estilos.css"/> 
    </head>
    
    <body>
		
		<div id="principal">
        
        <header>
           <h2>Panel Admin</h2>            
        </header>
        		
        <section>
			<ul class="menu">
                <li><a href="welcome.php">Inicio</a></li>
                <li><a href="#">Eventos</a>
                	<ul>
                		<li><a href="add_event.php">Registro</a></li>
                		<li><a href="show_event.php">Mostrar</a></li>
                	</ul>	
                </li>
                <li><a href="#">Registros</a>
                    <ul>
                        <li><a href="show_user.php">Mostrar</a></li>
                    </ul>
                </li>
                <li><a href="controler/logout.php">Salir</a></li>

            </ul>
            <div id="admin">
            <p>Bienvenido al panel de administradores: <a href="#"><?php echo $usuario = $_SESSION['usuario']; ?></a></p> 
                <img src="img/admin.png">
            </div>
                
        </section>
        </div>
            <div id="footer">
                <p id="legal">&copy;2015 Todos los derechos reservados Diseñado por <a href="#">Lic. Omar</a></p>
            </div>
    </body>
</html> 
<?php
}
else
{
    echo '<script>location.href = "index.php";</script>'; 
}
?>