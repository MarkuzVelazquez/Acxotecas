<!DOCTYPE html>    
<html oncontextmenu="return false">
    <head>
        <title>Promoción Deportiva</title>
         <meta charset="UTF-8"/>
         <link rel="icon" href="img/uaem.png" /> 
        <link rel="stylesheet" href="css/estilos.css"/>
        <link rel="stylesheet" href="css/coin-slider-styles.css" type="text/css" />
        <script src="js/jquery.min.js"></script>
        <script src="js/coin-slider.js"></script>
       <script src="js/main.js"></script>
       <script src="js/print.js"></script>
       <script src="js/number_runner.js"></script>
       <script type="text/javascript" src="js/acciones.js"></script>


    </head>
    
    <body onload="Comenzar()">
		
		<div id="principal">
        
        <header>
           <img src="img/banner.jpg"/><h1>Centro Universitario UAEM Valle de Chalco</h1>
           <h2>Área de Promoción Deportiva</h2>            
        </header>
        <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="information.php">¿Quiénes Somos?</a></li>
                <li><a href="#">Registro</a>
                    <ul>
                        <li><a href="register.php">Inscripción</a></li>
                        <li><a href="search.php">Baucher de Pago</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Contacto</a></li>
            </ul>
            <div id="fecha">
			<center>
				<div id="hora"></div>
			</center>
				<?php
				$month=date("n");

				$year=date("Y");

				$diaActual=date("j");

				$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;

				$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));

				$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",

				"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
				?>
				<table id="calendar">
					<caption><?php echo $meses[$month]." ".$year?></caption>
				<tr>
					<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>
					<th>Vie</th><th>Sab</th><th>Dom</th>
				</tr>
				<tr bgcolor="silver">
					<?php
					$last_cell=$diaSemana+$ultimoDiaMes;
					for($i=1;$i<=42;$i++)
						{
						if($i==$diaSemana)
						{
							$day=1;
						}
						if($i<$diaSemana || $i>=$last_cell)
						{
					echo "<td>&nbsp;</td>";
						}else{
							if($day==$diaActual)
					echo "<td class='hoy'>$day</td>";
							else
								echo "<td>$day</td>";
							$day++;
						}
						if($i%7==0)
						{
							echo "</tr><tr>\n";
						}
					}
				?>
				</table>
				<h5>
				                <?php 

                    $servidor="localhost";   
                    $usuario="root";         
                    $contraseña="";

                    $db = mysql_connect($servidor, $usuario,$contraseña); 
                      if (!$db)
                      {
                         echo "Error: No se ha podido conectar al servidor.";
                         exit;
                      }

                    $basedatos= mysql_select_db("area_deportes");  
                    if (!$basedatos)
                    {
                         echo "Error: No se ha podido conectar a la base de datos.";
                         exit;
                    }

                    $sql = "SELECT * FROM eventos WHERE mes_evento = '".$month."' AND anio_evento = '".$year."'";
                    $result = mysql_query($sql);

                    $num=mysql_num_rows( $result);

                    if($num==0){
                        echo 'No hay eventos';    
                    }else{

                    while ($row = mysql_fetch_array($result)):

                    $nombre_evento = $row[ 'nombre_evento' ];
                    $dia_evento = $row[ 'dia_evento' ];
                    $mes_evento = $row[ 'mes_evento' ];
                    $anio_evento = $row[ 'anio_evento' ];

                    echo "Eventos de este mes: <br>".$nombre_evento."<br>Fecha:".$dia_evento."-".$mes_evento."-".$anio_evento."";

                    endwhile;
                    }
                ?>
				</h5>
			</div>
        <section>
          <form >
          		<h2>Promoción Deportiva</h2>
              <p>
              <h3>Horario de Atención</h3>
              </p>
              <p>
                Martes de 11:00 a 16:00 Hrs.
              </p>
              <p>
                Miercoles de 11:00 a 19:00 Hrs.
              </p>
              <p>
                Jueves de 11:00 a 15:00 Hrs. 
              </p>
              <p>
              <h3>Lugar</h3>
              </p>
              <p><h4>Centro Universitario UAEM Valle de Chalco, Edificio D</h4></p>
          		
          </form>

          <br>

        </section>
        </div>
            <div id="footer">
                <p id="legal">&copy;2015 Todos los derechos reservados Diseñado por <a href="#">Lic. Omar Pat.Du </a></p>
            </div>
    </body>
</html>        
