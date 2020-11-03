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
        <script src="js/jquery.min.js"></script>
        <script src="js/new.js"></script>
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
            <form method="POST" action="mostrar.php">
                <h2>Mostrar participantes</h2>
                <p>
                    <label>Eliga el evento que desea administrar</label>
                <?php
                include( 'controler/conexion.php');
                
                $dat="SELECT * FROM eventos";
                $stm = $conexion->query( $dat );
                
                //var_dump($datos);
                ?>
                <select name="evento">
                    <option value="" >Elige Evento</option>
                    <?php
                while($datos = $stm->fetch_object()):
                
                echo "<option  value='".$datos->nombre_evento."'>".$datos->nombre_evento."</option>"; 
                endwhile;
                ?>
                </select>
                </p>
                <br>
                 <input type="Submit" value="Mostrar Todos" name="event" id="event" class="button">
          </form>

            <form method="POST" action="controler/delete_all.php">
                <h2>Eliminar participantes</h2>
                 <input type="Submit" value="Eliminar Todos" name="event" id="event" class="button">   
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
else
{
    echo '<script>location.href = "index.php";</script>'; 
}
?>