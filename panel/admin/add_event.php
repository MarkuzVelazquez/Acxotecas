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
            <form id="form_event" name="form_event">
                <h2>Registrar eventos</h2>
                <p>
                    <label>Nombre del evento</label>
                    <input type="text" id="name" class="email">
                </p>
                <br>
                <label>Fecha del evento</label>
                <select id="dia" required="required" >
                <option value="">Elige Dia</option>
                <?php
                for( $i = 1 ; $i <=31 ; $i++){
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?>
                    <?php
                }
                ?>
                </select>
                <select id="mes" required="required">
                <option value="">Elige Mes</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                </select>
                <select id="anio" required="required" >
                <option value="">Elige Año</option>
                <?php
                for( $i = 2000 ; $i <=2050 ; $i++){
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?>
                    <?php
                }
                ?>
                </select>
            <br><br>
                <p>
                    <label>Descripción (Max 250 Caracteres)</label>
                    <textarea cols="40" rows="10" id="texto" maxlength="250"></textarea>
                </p>
                <input type="button" value="Enviar" name="event" id="event" class="button">   
              <br>
               <span id="result_event"></span>
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