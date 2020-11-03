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
        <script type="text/javascript" src="js/acciones.js"></script>
        <script type="text/javascript" src="js/hidden-show.js"></script>
        <script type="text/javascript" src="js/new.js"></script>
        <script type="text/javascript" src="js/good.js"></script>
        <script type="text/javascript" src="js/main_est.js"></script>
        <script type="text/javascript" src="js/main_egre.js"></script>
        <script type="text/javascript" src="js/main_uaem.js"></script>
        <script type="text/javascript" src="js/main_tra.js"></script>
        <script type="text/javascript" src="js/main_admin.js"></script>

    </head>
    
    <body onload="Comenzar()">
    	<?php  
		date_default_timezone_set("America/Mexico_City" ) ; 
		$tiempo = getdate(time()); 
		$dia = $tiempo['wday']; 
		$dia_mes=$tiempo['mday']; 
		$mes = $tiempo['mon']; 
		$year = $tiempo['year']; 
		$hora= $tiempo['hours']; 
		$minutos = $tiempo['minutes']; 
		$segundos = $tiempo['seconds']; 


		switch ($dia){ 
		case "1": $dia_nombre="Lunes"; break; 
		case "2": $dia_nombre="Martes"; break; 
		case "3": $dia_nombre="Mi&eacute;rcoles"; break; 
		case "4": $dia_nombre="Jueves"; break; 
		case "5": $dia_nombre="Viernes"; break; 
		case "6": $dia_nombre="S&aacute;bado"; break; 
		case "0": $dia_nombre="Domingo"; break; 
		} 
		switch($mes){ 
		case "1": $mes_nombre="Enero"; break; 
		case "2": $mes_nombre="Febrero"; break; 
		case "3": $mes_nombre="Marzo"; break; 
		case "4": $mes_nombre="Abril"; break; 
		case "5": $mes_nombre="Mayo"; break; 
		case "6": $mes_nombre="Junio"; break; 
		case "7": $mes_nombre="Julio"; break; 
		case "8": $mes_nombre="Agosto"; break; 
		case "9": $mes_nombre="Septiembre"; break; 
		case "10": $mes_nombre="Octubre"; break; 
		case "11": $mes_nombre="Noviembre"; break; 
		case "12": $mes_nombre="Diciembre"; break; 
		} 

		$fecha_hoy=$dia_mes." de ".$mes_nombre." de ".$year; 

		?>
		
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
           <!-- Codigo para mostrar o ocultar seccion -->
			<form name="formulario" id="formulario" >
			<h2>Estudias o trabajas en la UAEM</h2>
			<p>
			<label>Seleccion opción</label>
			<select id="status" name="status" onChange="mostrar(this.value);">
				<option value="">Elige Opción</option>
				<option value="no">NO</option>
				<option value="si">SI</option>
			 </select>
			 </p>
			 <br>
			<div id="no" class="element" style="display: none;">
				<h2>Registro a los eventos de promoción deportiva</h2>
			<br>
			<p>
				<h4>El costo por participar en el evento es de $50</h4>
			</p>
			<br>
			<p>
				<input type="hidden" id="tipo" value="Externo">
				<label>Correo</label>
				<input type="email" id="email" required="required" class="email" >
			</p>
			<br>
			<p>
				<label>Apellido Paterno</label>
				<input type="text" id="paterno" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<p>
				<label>Apellido Materno</label>
				<input type="text" id="materno" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<p>
				<label>Nombre(s)</label>
				<input type="text" id="nombre" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<label>Fecha de Nacimiento</label>
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
				<option>ENERO</option>
				<option>FEBRERO</option>
				<option>MARZO</option>
				<option>ABRIL</option>
				<option>MAYO</option>
				<option>JUNIO</option>
				<option>JULIO</option>
				<option>AGOSTO</option>
				<option>SEPTIEMBRE</option>
				<option>OCTUBRE</option>
				<option>NOVIEMBRE</option>
				<option>DICIEMBRE</option>
				</select>
				<select id="anio" required="required" >
				<option value="">Elige Año</option>
				<?php
				for( $i = 1900 ; $i <=2050 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
			<br><br>
			<p>
				<label>Lugar de nacimiento</label>
				<select id="lugar" required="required">
					<option value="">Elige Lugar</option>					
					<option>Aguascalientes</option>
					<option>Baja California Norte</option>
					<option>Baja California Sur</option>
					<option>Campeche</option>
					<option>Chiapas</option>
					<option>Chihuahua</option>
					<option>Coahuila</option>
					<option>Colima</option>
					<option>Durango</option>
					<option>Guanajuato</option>
					<option>Guerrero</option>
					<option>Hidalgo</option>
					<option>Guadalajara</option>
					<option>Edo. México</option>
					<option>Michoacán</option>
					<option>Morelos</option>
					<option>Nayarit</option>
					<option>Monterrey</option>
					<option>Oaxaca</option>
					<option>Puebla</option>
					<option>Querétaro</option>
					<option>Quintana Roo</option>
					<option>San Luís Potosí</option>
					<option>Sinaloa</option>
					<option>Sonora</option>
					<option>Tabasco</option>
					<option>Tamaulipas</option>
					<option>Tlaxcala</option>
					<option>Veracruz</option>
					<option>Yucatán</option>
					<option>Zacatecas</option>
					<option>Distrito Federal</option>
				</select>
				
			</p>
			<br>
			<p>
				<label>Edad</label>
				<select id="edad" required="required" >
				<option value="">Proporciona Edad</option>
				<?php
				for( $i = 15 ; $i <=99 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
			</p>
			<br>
			<p>
				<label>Sexo</label>
				</select>
				<select id="sexo" required="required">
				<option value="">Elige Sexo</option>
				<option>HOMBRE</option>
				<option>MUJER</option>
				</select>
			</p>
			<br>
			<p>
				<label >Enfermedad</label>
				</select>
				<select id="enfermedad" required="required">
				<option value="">Elige Opción</option>
				<option>NINGUNA</option>
				<option>DIABETES</option>
				<option>ASMA</option>
				<option>CARDIOVASCULARES</option>
				<option>OTRA</option>
				</select>
			</p>
			<br>
			<p>
				<label>Tipo de sangre</label>
				</select>
				<select id="sangre" required="required">
				<option value="">Elige Tipo</option>
				<option>O-</option>
				<option>O+</option>
				<option>B-</option>
				<option>B+</option>
				<option>A-</option>
				<option>A+</option>
				<option>AB-</option>
				<option>AB+</option>
				<option>DESCONOCIDO</option>
				</select>
			</p>
			<br>
			<p>
				<label>Alergia</label>
				<select id="alergia">
				    <option value="">Elige Opción</option>
				    <option>Ninguna</option>
				    <option>Fármacos</option>
					<option>Polvo</option>
					<option>Alimento</option>
					<option>Veneno de insectos</option>
					<option>Moho</option>
					<option>Caspa de mascotas y otros animales</option>
					<option>Polen</option>
				</select>
			</p>
			<br>
			<p>
				<label>Ocupación</label>
				</select>
				<select id="ocupacion" required="required">
				<option value="">Elige opción</option>
				<option>TRABAJADOR</option>
				<option>ESTUDIANTE</option>
				</select>
			</p>
			<br>
			<p>
				<label>Evento</label>
				<?php
				include( 'controler/conexion.php');
				
				$dat="SELECT * FROM eventos";
				$stm = $conexion->query( $dat );
				
				//var_dump($datos);
				?>
				<select id="evento">
					<option value="" >Elige Evento</option>
					<?php
				while($datos = $stm->fetch_object()):
				
				echo "<option  value='".$datos->nombre_evento."'>".$datos->nombre_evento."</option>"; 
				endwhile;
			    ?>
				</select>
			</p>
			<br>
			<p>
				<label>Categoria</label>
				<select id="categoria" required="required">
				<option value="">Elige categoria</option>
				<option>JUVENIL 15-18 AÑOS</option>
				<option>LIBRE 19-29 AÑOS</option>
				<option>SUBMASTER 29-35 AÑOS</option>
				<option>MASTER 36-39 AÑOS</option>
				<option>VETERANO 39 AÑOS EN ADELANTE</option>
				</select>
			</p>
		<input type="hidden" value="<?php echo $fecha_hoy; ?>" id="fecha_reg"/>
		<input type="hidden" value="50" id="costo"/>
		<p>
		<label>Pertences algún equipo de la UAEM</label>
            <select id="taller">
				<option value="">Elige Opción</option>
				<option>NO</option>		
                <option>AJEDREZ</option>
                <option>ACONDICIONAMIENTO FISICO</option>
                <option>LUCHA OLIMPICA</option>
                <option>FUTBOL RAPIDO</option>
                <option>BASQUETBOL</option>
                <option>VOLEIBOL</option>
                <option>TAEKWONDO</option>
             </select>
		</p>
		<br>
		<p>
		<label>Codigo Captcha</label>
		<center>
		<div id="random">
		<?php 
		$random=rand(100000,999999);
		?>
		<input type="text" id="captcha"value="<?php echo $random; ?>"disabled/>
		</div>
		</center>
		</p>
		<br>
		<p>
			<label>Coloca Captcha</label>
			<input type="text" id="capture_captcha" maxlength="6" required="required" onkeypress="return justNumbers(event);"/>
			<input type="hidden" id="re_captcha" value="<?php echo $random; ?>"/>
		</p>
		
		<br>
			<p>En pleno uso de mis facultades, declaro estar sano 
     			y apto para participar en el evento, reconozco los riesgos inherentes 
     			a la práctica deportiva, por lo que voluntariamente y con conocimiento 
     			pleno de esto, acepto y asumo la responsabilidad de mi integridad física, 
     			y libero de toda responsabilidad a la Universidad Autónoma del Estado de México, 
     			al Centro Universitario Valle de Chalco y al Comité Organizador.
     		</p>
     		<center><p>Acepto las condiciones <input type="checkbox" value="acepto" id="acepto" onclick="document.formulario.enviar.disabled=!document.formulario.enviar.disabled"><br />
	        </p></center>
	        <input type="button" value="Enviar" name="enviar" id="enviar" class="button" disabled>					
			  	<span id="resultado"></span>
			</div>
			
			<!-- Pertenece a la UAEM-->
	
			<div id="si" class="element" style="display: none;">
				<!-- Mostrar opciones de miembros -->
				<p>
					<label>Tipo de miembro</label>
						<select id="status" name="tipo_uaem" onChange="mostrar(this.value);">
						<option value="tipo">Elige tipo</option>
						<option value="estudiante">ESTUDIANTE</option>
						<option value="egresado">EGRESADO</option>
						<option value="profesor">PROFESOR</option>
						<option value="administrativo">ADMINISTRATIVO</option>
						<option value="trabajador">TRABAJADOR</option>
						</select>
				</p>
			</div>		
			</form>

		<!-- Mostrar opciones estudiantes -->						
		<div id="estudiante" class="element" style="display: none;">
			<form name="formEstudiante" id="formEstudiante">
			<h3>Estudiante</h3>
			<p>
				<h4>El costo por participar en el evento es de $25</h4>
			</p>
			<p>
			<input type="hidden" id="tipo_estudiante" value="Alumno">
			<label>Correo</label>
			<input type="email" id="email_estudiante" required="required" class="email" >
			</p>
			<br>
			<p>
				<label>Apellido Paterno</label>
				<input type="text" id="paterno_estudiante" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<p>
				<label>Apellido Materno</label>
				<input type="text" id="materno_estudiante" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<p>
				<label>Nombre(s)</label>
				<input type="text" id="nombre_estudiante" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<label>Fecha de Nacimiento</label>
				<select id="dia_estudiante" required="required" >
				<option value="">Elige Dia</option>
				<?php
				for( $i = 1 ; $i <=31 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
				<select id="mes_estudiante" required="required">
				<option value="">Elige Mes</option>
				<option>ENERO</option>
				<option>FEBRERO</option>
				<option>MARZO</option>
				<option>ABRIL</option>
				<option>MAYO</option>
				<option>JUNIO</option>
				<option>JULIO</option>
				<option>AGOSTO</option>
				<option>SEPTIEMBRE</option>
				<option>OCTUBRE</option>
				<option>NOVIEMBRE</option>
				<option>DICIEMBRE</option>
				</select>
				<select id="anio_estudiante" required="required" >
				<option value="">Elige Año</option>
				<?php
				for( $i = 1900 ; $i <=2050 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
			<br><br>
			<p>
				<label>Lugar de nacimiento</label>
				<select id="lugar_estudiante" required="required">
					<option value="">Elige Lugar</option>					
					<option>Aguascalientes</option>
					<option>Baja California Norte</option>
					<option>Baja California Sur</option>
					<option>Campeche</option>
					<option>Chiapas</option>
					<option>Chihuahua</option>
					<option>Coahuila</option>
					<option>Colima</option>
					<option>Durango</option>
					<option>Guanajuato</option>
					<option>Guerrero</option>
					<option>Hidalgo</option>
					<option>Guadalajara</option>
					<option>Edo. México</option>
					<option>Michoacán</option>
					<option>Morelos</option>
					<option>Nayarit</option>
					<option>Monterrey</option>
					<option>Oaxaca</option>
					<option>Puebla</option>
					<option>Querétaro</option>
					<option>Quintana Roo</option>
					<option>San Luís Potosí</option>
					<option>Sinaloa</option>
					<option>Sonora</option>
					<option>Tabasco</option>
					<option>Tamaulipas</option>
					<option>Tlaxcala</option>
					<option>Veracruz</option>
					<option>Yucatán</option>
					<option>Zacatecas</option>
					<option>Distrito Federal</option>
				</select>
				
			</p>
			<br>
			<p>
				<label>Edad</label>
				<select id="edad_estudiante" required="required" >
				<option value="">Proporciona Edad</option>
				<?php
				for( $i = 15 ; $i <=99 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
			</p>
			<br>
			<p>
				<label>Sexo</label>
				</select>
				<select id="sexo_estudiante" required="required">
				<option value="">Elige Sexo</option>
				<option>HOMBRE</option>
				<option>MUJER</option>
				</select>
			</p>
			<br>
			<p>
				<label >Enfermedad</label>
				</select>
				<select id="enfermedad_estudiante" required="required">
				<option value="">Elige Opción</option>
				<option>NINGUNA</option>
				<option>DIABETES</option>
				<option>ASMA</option>
				<option>CARDIOVASCULARES</option>
				<option>OTRA</option>
				</select>
			</p>
			<br>
			<p>
				<label>Tipo de sangre</label>
				</select>
				<select id="sangre_estudiante" required="required">
				<option value="">Elige Tipo</option>
				<option>O-</option>
				<option>O+</option>
				<option>B-</option>
				<option>B+</option>
				<option>A-</option>
				<option>A+</option>
				<option>AB-</option>
				<option>AB+</option>
				<option>DESCONOCIDO</option>
				</select>
			</p>
			<br>
			<p>
				<label>Alergia</label>
				<select id="alergia_estudiante">
				    <option value="">Elige Opción</option>
				    <option>Ninguna</option>
				    <option>Fármacos</option>
					<option>Polvo</option>
					<option>Alimento</option>
					<option>Veneno de insectos</option>
					<option>Moho</option>
					<option>Caspa de mascotas y otros animales</option>
					<option>Polen</option>
				</select>
			</p>
			<br>
				<input type="hidden" id="ocupacion_estudiante" value="ESTUDIANTE">
			<p>
				<label>Evento</label>
				<?php
				include( 'controler/conexion.php');
				
				$dat="SELECT * FROM eventos";
				$stm = $conexion->query( $dat );
				
				//var_dump($datos);
				?>
				<select id="evento_estudiante">
					<option value="" >Elige Evento</option>
					<?php
				while($datos = $stm->fetch_object()):
				
				echo "<option  value='".$datos->nombre_evento."'>".$datos->nombre_evento."</option>"; 
				endwhile;
			    ?>
				</select>
			</p>
			<br>
			<p>
				<label>Categoria</label>
				<select id="categoria_estudiante" required="required">
				<option value="">Elige categoria</option>
				<option>JUVENIL 15-18 AÑOS</option>
				<option>LIBRE 19-29 AÑOS</option>
				<option>SUBMASTER 29-35 AÑOS</option>
				<option>MASTER 36-39 AÑOS</option>
				<option>VETERANO 39 AÑOS EN ADELANTE</option>
				</select>
			</p>
			<br>
				<p>	
					<label>No cuenta</label>
					<input type="text" id="no_cuenta" maxlength="7" onkeypress="return justNumbers(event);"/>
				</p>
				<br>
				<p>	
					<label>Licenciatura</label>
					<select id="licenciatura">
					<option value="">Elige Licenciatura</option>
					<option>ING.EN COMPUTACION</option>
					<option>LIC.EN INFORMATICA ADMINISTRATIVA</option>
					<option>LIC.EN DISEÑO INDUSTRIAL</option>
					<option>LIC.EN CONTADURIA</option>
					<option>LIC.EN ENFERMERIA</option>
					<option>LIC.EN DERECHO/option>
					<option>LIC.EN ENFERMERIA A DISTANICA</option>
					<option>M. EN CIENCIAS DE LA COMPUTACION</option>
					</select>
				</p>
				<br>
				<p>	
					<label>Semestre</label>
					<select id="semestre">
					<option value="">Elige Semestre</option>
					<option>1°</option>
					<option>2°</option>
					<option>3°</option>
					<option>4°</option>
					<option>5°</option>
					<option>6°</option>
					<option>7°</option>
					<option>8°</option>
					<option>9°</option>
					<option>10°</option>
					<option>11°</option>
					<option>12°</option>
					</select>
				</p>
				<br>
				<p>	
					<label>Turno</label>
					<select id="turno">
					<option value="">Elige Turno</option>
					<option>MATUTINO</option>
					<option>VESPERTINO</option>
					</select>
				</p>
				<br>
				<p>	
					<label>Grupo</label>
					<input type="text" id="grupo"/>
				</p>
				<br>
		<input type="hidden" value="<?php echo $fecha_hoy; ?>" id="fecha_reg_estudiante"/>
		<input type="hidden" value="25" id="costo_estudiante"/>
		<p>
		<label>Pertences algún equipo de la UAEM</label>
            <select id="taller_estudiante">
				<option value="">Elige Opción</option>
				<option>NO</option>		
                <option>AJEDREZ</option>
                <option>ACONDICIONAMIENTO FISICO</option>
                <option>LUCHA OLIMPICA</option>
                <option>FUTBOL RAPIDO</option>
                <option>BASQUETBOL</option>
                <option>VOLEIBOL</option>
                <option>TAEKWONDO</option>
             </select>
		</p>
		<br>
		<p>
		<label>Codigo Captcha</label>
		<center>
		<div id="random">
		<?php 
		$random=rand(100000,999999);
		?>
		<input type="text" id="captcha"value="<?php echo $random; ?>"disabled/>
		</div>
		</center>
		</p>
		<br>
		<p>
			<label>Coloca Captcha</label>
			<input type="text" id="capture_captcha_estudiante" maxlength="6" required="required" onkeypress="return justNumbers(event);"/>
			<input type="hidden" id="re_captcha_estudiante" value="<?php echo $random; ?>"/>
		</p>
		
		<br>
			<p>En pleno uso de mis facultades, declaro estar sano 
     			y apto para participar en el evento, reconozco los riesgos inherentes 
     			a la práctica deportiva, por lo que voluntariamente y con conocimiento 
     			pleno de esto, acepto y asumo la responsabilidad de mi integridad física, 
     			y libero de toda responsabilidad a la Universidad Autónoma del Estado de México, 
     			al Centro Universitario Valle de Chalco y al Comité Organizador.
     		</p>
			
     		<center><p>Acepto las condiciones <input type="checkbox" value="acepto" onclick="document.formEstudiante.alumno.disabled=!document.formEstudiante.alumno.disabled"><br />
	        </p></center>
	        <input type="button" value="Enviar" name="alumno" id="alumno" class="button" disabled>					
			<span id="resultado_alumno"></span>
			</form>
		</div>
		
		<!-- Mostrar opciones de egresados -->			
		<div id="egresado" class="element" style="display: none;">
			<form name="formEgresado" id="formEgresado">
			<h3>Egresado</h3>
			<p>
				<h4>El costo por participar en el evento es de $25</h4>
			</p>
			<p>
			<input type="hidden" id="tipo_egresado" value="Egresado">
			<label>Correo</label>
			<input type="email" id="email_egresado" required="required" class="email" >
			</p>
			<br>
			<p>
				<label>Apellido Paterno</label>
				<input type="text" id="paterno_egresado" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<p>
				<label>Apellido Materno</label>
				<input type="text" id="materno_egresado" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<p>
				<label>Nombre(s)</label>
				<input type="text" id="nombre_egresado" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<label>Fecha de Nacimiento</label>
				<select id="dia_egresado" required="required" >
				<option value="">Elige Dia</option>
				<?php
				for( $i = 1 ; $i <=31 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
				<select id="mes_egresado" required="required">
				<option value="">Elige Mes</option>
				<option>ENERO</option>
				<option>FEBRERO</option>
				<option>MARZO</option>
				<option>ABRIL</option>
				<option>MAYO</option>
				<option>JUNIO</option>
				<option>JULIO</option>
				<option>AGOSTO</option>
				<option>SEPTIEMBRE</option>
				<option>OCTUBRE</option>
				<option>NOVIEMBRE</option>
				<option>DICIEMBRE</option>
				</select>
				<select id="anio_egresado" required="required" >
				<option value="">Elige Año</option>
				<?php
				for( $i = 1900 ; $i <=2050 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
			<br><br>
			<p>
				<label>Lugar de nacimiento</label>
				<select id="lugar_egresado" required="required">
					<option value="">Elige Lugar</option>					
					<option>Aguascalientes</option>
					<option>Baja California Norte</option>
					<option>Baja California Sur</option>
					<option>Campeche</option>
					<option>Chiapas</option>
					<option>Chihuahua</option>
					<option>Coahuila</option>
					<option>Colima</option>
					<option>Durango</option>
					<option>Guanajuato</option>
					<option>Guerrero</option>
					<option>Hidalgo</option>
					<option>Guadalajara</option>
					<option>Edo. México</option>
					<option>Michoacán</option>
					<option>Morelos</option>
					<option>Nayarit</option>
					<option>Monterrey</option>
					<option>Oaxaca</option>
					<option>Puebla</option>
					<option>Querétaro</option>
					<option>Quintana Roo</option>
					<option>San Luís Potosí</option>
					<option>Sinaloa</option>
					<option>Sonora</option>
					<option>Tabasco</option>
					<option>Tamaulipas</option>
					<option>Tlaxcala</option>
					<option>Veracruz</option>
					<option>Yucatán</option>
					<option>Zacatecas</option>
					<option>Distrito Federal</option>
				</select>
				
			</p>
			<br>
			<p>
				<label>Edad</label>
				<select id="edad_egresado" required="required" >
				<option value="">Proporciona Edad</option>
				<?php
				for( $i = 15 ; $i <=99 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
			</p>
			<br>
			<p>
				<label>Sexo</label>
				</select>
				<select id="sexo_egresado" required="required">
				<option value="">Elige Sexo</option>
				<option>HOMBRE</option>
				<option>MUJER</option>
				</select>
			</p>
			<br>
			<p>
				<label >Enfermedad</label>
				</select>
				<select id="enfermedad_egresado" required="required">
				<option value="">Elige Opción</option>
				<option>NINGUNA</option>
				<option>DIABETES</option>
				<option>ASMA</option>
				<option>CARDIOVASCULARES</option>
				<option>OTRA</option>
				</select>
			</p>
			<br>
			<p>
				<label>Tipo de sangre</label>
				</select>
				<select id="sangre_egresado" required="required">
				<option value="">Elige Tipo</option>
				<option>O-</option>
				<option>O+</option>
				<option>B-</option>
				<option>B+</option>
				<option>A-</option>
				<option>A+</option>
				<option>AB-</option>
				<option>AB+</option>
				<option>DESCONOCIDO</option>
				</select>
			</p>
			<br>
			<p>
				<label>Alergia</label>
				<select id="alergia_egresado">
				    <option value="">Elige Opción</option>
				    <option>Ninguna</option>
				    <option>Fármacos</option>
					<option>Polvo</option>
					<option>Alimento</option>
					<option>Veneno de insectos</option>
					<option>Moho</option>
					<option>Caspa de mascotas y otros animales</option>
					<option>Polen</option>
				</select>
			</p>
			<br>
			<p>
				<label>Ocupación</label>
				</select>
				<select id="ocupacion_egresado" required="required">
				<option value="">Elige opción</option>
				<option>TRABAJADOR</option>
				<option>ESTUDIANTE</option>
				<option>OTRO</option>
				</select>
			</p>
			<br>
			<p>
				<label>Evento</label>
				<?php
				include( 'controler/conexion.php');
				
				$dat="SELECT * FROM eventos";
				$stm = $conexion->query( $dat );
				
				//var_dump($datos);
				?>
				<select id="evento_egresado">
					<option value="" >Elige Evento</option>
					<?php
				while($datos = $stm->fetch_object()):
				
				echo "<option  value='".$datos->nombre_evento."'>".$datos->nombre_evento."</option>"; 
				endwhile;
			    ?>
				</select>
			</p>
			<br>
			<p>
				<label>Categoria</label>
				<select id="categoria_egresado" required="required">
				<option value="">Elige categoria</option>
				<option>JUVENIL 15-18 AÑOS</option>
				<option>LIBRE 19-29 AÑOS</option>
				<option>SUBMASTER 29-35 AÑOS</option>
				<option>MASTER 36-39 AÑOS</option>
				<option>VETERANO 39 AÑOS EN ADELANTE</option>
				</select>
			</p>
			<br>
			<p>	
				<label>No cuenta</label>
				<input type="text" id="no_cuenta_egresado" maxlength="7" onkeypress="return justNumbers(event);"/>
			</p>
			<br>
			<p>

					<label>Fecha Egreso</label>
						<select id="mes_de_egresado">
						<option value="">Elige Mes</option>
						<option>ENERO</option>
						<option>FEBRERO</option>
						<option>MARZO</option>
						<option>ABRIL</option>
						<option>MAYO</option>
						<option>JUNIO</option>
						<option>JULIO</option>
						<option>AGOSTO</option>
						<option>SEPTIEMBRE</option>
						<option>OCTUBRE</option>
						<option>NOVIEMBRE</option>
						<option>DICIEMBRE</option>
						</select>
						<select id="anio_de_egresado">
						<option value="">Elige Año</option>
						<?php
						for( $i = 1996 ; $i <=2050 ; $i++){
							?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?>
							<?php
						}
						?>
						</select>	
				</p>
				<br>
				<p>	
					<label>Licenciatura</label>
					<select id="licenciatura_egresado">
					<option value="">Elige Licenciatura</option>
					<option>ING.EN COMPUTACION</option>
					<option>LIC.EN INFORMATICA ADMINISTRATIVA</option>
					<option>LIC.EN DISEÑO INDUSTRIAL</option>
					<option>LIC.EN CONTADURIA</option>
					<option>LIC.EN ENFERMERIA</option>
					<option>LIC.EN DERECHO/option>
					<option>LIC.EN ENFERMERIA A DISTANICA</option>
					<option>M. EN CIENCIAS DE LA COMPUTACION</option>
					</select>
				</p>
				<br>
		<input type="hidden" value="<?php echo $fecha_hoy; ?>" id="fecha_reg_egresado"/>
		<input type="hidden" value="25" id="costo_egresado"/>
		<p>
		<label>Pertences algún equipo de la UAEM</label>
            <select id="taller_egresado">
				<option value="">Elige Opción</option>
				<option>NO</option>		
                <option>AJEDREZ</option>
                <option>ACONDICIONAMIENTO FISICO</option>
                <option>LUCHA OLIMPICA</option>
                <option>FUTBOL RAPIDO</option>
                <option>BASQUETBOL</option>
                <option>VOLEIBOL</option>
                <option>TAEKWONDO</option>
             </select>
		</p>
		<br>
		<p>
		<label>Codigo Captcha</label>
		<center>
		<div id="random">
		<?php 
		$random=rand(100000,999999);
		?>
		<input type="text" id="captcha"value="<?php echo $random; ?>"disabled/>
		</div>
		</center>
		</p>
		<br>
		<p>
			<label>Coloca Captcha</label>
			<input type="text" id="capture_captcha_egresado" maxlength="6" required="required" onkeypress="return justNumbers(event);"/>
			<input type="hidden" id="re_captcha_egresado" value="<?php echo $random; ?>"/>
		</p>
		
		<br>
			<p>En pleno uso de mis facultades, declaro estar sano 
     			y apto para participar en el evento, reconozco los riesgos inherentes 
     			a la práctica deportiva, por lo que voluntariamente y con conocimiento 
     			pleno de esto, acepto y asumo la responsabilidad de mi integridad física, 
     			y libero de toda responsabilidad a la Universidad Autónoma del Estado de México, 
     			al Centro Universitario Valle de Chalco y al Comité Organizador.
     		</p>
			
     		<center><p>Acepto las condiciones <input type="checkbox" value="acepto" onclick="document.formEgresado.enviar_egreso.disabled=!document.formEgresado.enviar_egreso.disabled"><br />
	        </p></center>
	        <input type="button" value="Enviar" name="enviar_egreso" id="enviar_egreso" class="button" disabled>					
			<span id="resultado_egresado"></span>
			</form>
		</div>	
	
 		<!-- Mostrar opciones de profesor -->			
		<div id="profesor" class="element" style="display: none;">
			<form name="formProf" id="formProf">
				<input type="hidden" id="tipo_uaemjob" value="Profesor">
				<h3>Profesor</h3>
			<br>	
			<p>
				<h4>El costo por participar en el evento es de $25</h4>
			</p>
			<br>
			<p>
				<label>Correo</label>
				<input type="email" id="email_uaemjob" required="required" class="email" >
			</p>
			<br>
			<p>
				<label>Apellido Paterno</label>
				<input type="text" id="paterno_uaemjob" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<p>
				<label>Apellido Materno</label>
				<input type="text" id="materno_uaemjob" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<p>
				<label>Nombre(s)</label>
				<input type="text" id="nombre_uaemjob" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<label>Fecha de Nacimiento</label>
				<select id="dia_uaemjob" required="required" >
				<option value="">Elige Dia</option>
				<?php
				for( $i = 1 ; $i <=31 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
				<select id="mes_uaemjob" required="required">
				<option value="">Elige Mes</option>
				<option>ENERO</option>
				<option>FEBRERO</option>
				<option>MARZO</option>
				<option>ABRIL</option>
				<option>MAYO</option>
				<option>JUNIO</option>
				<option>JULIO</option>
				<option>AGOSTO</option>
				<option>SEPTIEMBRE</option>
				<option>OCTUBRE</option>
				<option>NOVIEMBRE</option>
				<option>DICIEMBRE</option>
				</select>
				<select id="anio_uaemjob" required="required" >
				<option value="">Elige Año</option>
				<?php
				for( $i = 1900 ; $i <=2050 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
			<br><br>
			<p>
				<label>Lugar de nacimiento</label>
				<select id="lugar_uaemjob" required="required">
					<option value="">Elige Lugar</option>					
					<option>Aguascalientes</option>
					<option>Baja California Norte</option>
					<option>Baja California Sur</option>
					<option>Campeche</option>
					<option>Chiapas</option>
					<option>Chihuahua</option>
					<option>Coahuila</option>
					<option>Colima</option>
					<option>Durango</option>
					<option>Guanajuato</option>
					<option>Guerrero</option>
					<option>Hidalgo</option>
					<option>Guadalajara</option>
					<option>Edo. México</option>
					<option>Michoacán</option>
					<option>Morelos</option>
					<option>Nayarit</option>
					<option>Monterrey</option>
					<option>Oaxaca</option>
					<option>Puebla</option>
					<option>Querétaro</option>
					<option>Quintana Roo</option>
					<option>San Luís Potosí</option>
					<option>Sinaloa</option>
					<option>Sonora</option>
					<option>Tabasco</option>
					<option>Tamaulipas</option>
					<option>Tlaxcala</option>
					<option>Veracruz</option>
					<option>Yucatán</option>
					<option>Zacatecas</option>
					<option>Distrito Federal</option>
				</select>
				
			</p>
			<br>
			<p>
				<label>Edad</label>
				<select id="edad_uaemjob" required="required" >
				<option value="">Proporciona Edad</option>
				<?php
				for( $i = 15 ; $i <=99 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
			</p>
			<br>
			<p>
				<label>Sexo</label>
				</select>
				<select id="sexo_uaemjob" required="required">
				<option value="">Elige Sexo</option>
				<option>HOMBRE</option>
				<option>MUJER</option>
				</select>
			</p>
			<br>
			<p>
				<label >Enfermedad</label>
				</select>
				<select id="enfermedad_uaemjob" required="required">
				<option value="">Elige Opción</option>
				<option>NINGUNA</option>
				<option>DIABETES</option>
				<option>ASMA</option>
				<option>CARDIOVASCULARES</option>
				<option>OTRA</option>
				</select>
			</p>
			<br>
			<p>
				<label>Tipo de sangre</label>
				</select>
				<select id="sangre_uaemjob" required="required">
				<option value="">Elige Tipo</option>
				<option>O-</option>
				<option>O+</option>
				<option>B-</option>
				<option>B+</option>
				<option>A-</option>
				<option>A+</option>
				<option>AB-</option>
				<option>AB+</option>
				<option>DESCONOCIDO</option>
				</select>
			</p>
			<br>
			<p>
				<label>Alergia</label>
				<select id="alergia_uaemjob">
				    <option value="">Elige Opción</option>
				    <option>Ninguna</option>
				    <option>Fármacos</option>
					<option>Polvo</option>
					<option>Alimento</option>
					<option>Veneno de insectos</option>
					<option>Moho</option>
					<option>Caspa de mascotas y otros animales</option>
					<option>Polen</option>
				</select>
			</p>
			<br>
			<input type="hidden" value="Profesor" id="ocupacion_uaemjob" >
			<p>
				<label>Evento</label>
				<?php
				include( 'controler/conexion.php');
				
				$dat="SELECT * FROM eventos";
				$stm = $conexion->query( $dat );
				
				//var_dump($datos);
				?>
				<select id="evento_uaemjob">
					<option value="" >Elige Evento</option>
					<?php
				while($datos = $stm->fetch_object()):
				
				echo "<option  value='".$datos->nombre_evento."'>".$datos->nombre_evento."</option>"; 
				endwhile;
			    ?>
				</select>
			</p>
			<br>
			<p>
				<label>Categoria</label>
				<select id="categoria_uaemjob" required="required">
				<option value="">Elige categoria</option>
				<option>JUVENIL 15-18 AÑOS</option>
				<option>LIBRE 19-29 AÑOS</option>
				<option>SUBMASTER 29-35 AÑOS</option>
				<option>MASTER 36-39 AÑOS</option>
				<option>VETERANO 39 AÑOS EN ADELANTE</option>
				</select>
			</p>
		<input type="hidden" value="<?php echo $fecha_hoy; ?>" id="fecha_reg_uaemjob"/>
		<input type="hidden" value="25" id="costo_uaemjob"/>
		<p>
		<label>Pertences algún equipo de la UAEM</label>
            <select id="taller_uaemjob">
				<option value="">Elige Opción</option>
				<option>NO</option>		
                <option>AJEDREZ</option>
                <option>ACONDICIONAMIENTO FISICO</option>
                <option>LUCHA OLIMPICA</option>
                <option>FUTBOL RAPIDO</option>
                <option>BASQUETBOL</option>
                <option>VOLEIBOL</option>
                <option>TAEKWONDO</option>
             </select>
		</p>
		<br>
		<p>
		<label>Codigo Captcha</label>
		<center>
		<div id="random">
		<?php 
		$random=rand(100000,999999);
		?>
		<input type="text" id="captcha"value="<?php echo $random; ?>"disabled/>
		</div>
		</center>
		</p>
		<br>
		<p>
			<label>Coloca Captcha</label>
			<input type="text" id="capture_captcha_uaemjob" maxlength="6" required="required" onkeypress="return justNumbers(event);"/>
			<input type="hidden" id="re_captcha_uaemjob" value="<?php echo $random; ?>"/>
		</p>
		
		<br>
			<p>En pleno uso de mis facultades, declaro estar sano 
     			y apto para participar en el evento, reconozco los riesgos inherentes 
     			a la práctica deportiva, por lo que voluntariamente y con conocimiento 
     			pleno de esto, acepto y asumo la responsabilidad de mi integridad física, 
     			y libero de toda responsabilidad a la Universidad Autónoma del Estado de México, 
     			al Centro Universitario Valle de Chalco y al Comité Organizador.
     		</p>
     		<center><p>Acepto las condiciones <input type="checkbox" value="acepto" id="acepto" onclick="document.formProf.uaemjob.disabled=!document.formProf.uaemjob.disabled"><br />
	        </p></center>
	        <input type="button" value="Enviar" name="uaemjob" id="uaemjob" class="button" disabled>					
			  	<span id="resultado_uaemjob"></span>
			</form>
		</div>	
		
		<!-- Mostrar opciones de administrativo -->			
		<div id="administrativo" class="element" style="display: none;">
			<form name="formAdministrativo" id="formAdministrativo">
				<input type="hidden" id="tipo_administrativo" value="Administrativo">
				<h3>Profesor</h3>
			<br>	
			<p>
				<h4>El costo por participar en el evento es de $25</h4>
			</p>
			<br>
			<p>
				<label>Correo</label>
				<input type="email" id="email_administrativo" required="required" class="email" >
			</p>
			<br>
			<p>
				<label>Apellido Paterno</label>
				<input type="text" id="paterno_administrativo" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<p>
				<label>Apellido Materno</label>
				<input type="text" id="materno_administrativo" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<p>
				<label>Nombre(s)</label>
				<input type="text" id="nombre_administrativo" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<label>Fecha de Nacimiento</label>
				<select id="dia_administrativo" required="required" >
				<option value="">Elige Dia</option>
				<?php
				for( $i = 1 ; $i <=31 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
				<select id="mes_administrativo" required="required">
				<option value="">Elige Mes</option>
				<option>ENERO</option>
				<option>FEBRERO</option>
				<option>MARZO</option>
				<option>ABRIL</option>
				<option>MAYO</option>
				<option>JUNIO</option>
				<option>JULIO</option>
				<option>AGOSTO</option>
				<option>SEPTIEMBRE</option>
				<option>OCTUBRE</option>
				<option>NOVIEMBRE</option>
				<option>DICIEMBRE</option>
				</select>
				<select id="anio_administrativo" required="required" >
				<option value="">Elige Año</option>
				<?php
				for( $i = 1900 ; $i <=2050 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
			<br><br>
			<p>
				<label>Lugar de nacimiento</label>
				<select id="lugar_administrativo" required="required">
					<option value="">Elige Lugar</option>					
					<option>Aguascalientes</option>
					<option>Baja California Norte</option>
					<option>Baja California Sur</option>
					<option>Campeche</option>
					<option>Chiapas</option>
					<option>Chihuahua</option>
					<option>Coahuila</option>
					<option>Colima</option>
					<option>Durango</option>
					<option>Guanajuato</option>
					<option>Guerrero</option>
					<option>Hidalgo</option>
					<option>Guadalajara</option>
					<option>Edo. México</option>
					<option>Michoacán</option>
					<option>Morelos</option>
					<option>Nayarit</option>
					<option>Monterrey</option>
					<option>Oaxaca</option>
					<option>Puebla</option>
					<option>Querétaro</option>
					<option>Quintana Roo</option>
					<option>San Luís Potosí</option>
					<option>Sinaloa</option>
					<option>Sonora</option>
					<option>Tabasco</option>
					<option>Tamaulipas</option>
					<option>Tlaxcala</option>
					<option>Veracruz</option>
					<option>Yucatán</option>
					<option>Zacatecas</option>
					<option>Distrito Federal</option>
				</select>
				
			</p>
			<br>
			<p>
				<label>Edad</label>
				<select id="edad_administrativo" required="required" >
				<option value="">Proporciona Edad</option>
				<?php
				for( $i = 15 ; $i <=99 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
			</p>
			<br>
			<p>
				<label>Sexo</label>
				</select>
				<select id="sexo_administrativo" required="required">
				<option value="">Elige Sexo</option>
				<option>HOMBRE</option>
				<option>MUJER</option>
				</select>
			</p>
			<br>
			<p>
				<label >Enfermedad</label>
				</select>
				<select id="enfermedad_administrativo" required="required">
				<option value="">Elige Opción</option>
				<option>NINGUNA</option>
				<option>DIABETES</option>
				<option>ASMA</option>
				<option>CARDIOVASCULARES</option>
				<option>OTRA</option>
				</select>
			</p>
			<br>
			<p>
				<label>Tipo de sangre</label>
				</select>
				<select id="sangre_administrativo" required="required">
				<option value="">Elige Tipo</option>
				<option>O-</option>
				<option>O+</option>
				<option>B-</option>
				<option>B+</option>
				<option>A-</option>
				<option>A+</option>
				<option>AB-</option>
				<option>AB+</option>
				<option>DESCONOCIDO</option>
				</select>
			</p>
			<br>
			<p>
				<label>Alergia</label>
				<select id="alergia_administrativo">
				    <option value="">Elige Opción</option>
				    <option>Ninguna</option>
				    <option>Fármacos</option>
					<option>Polvo</option>
					<option>Alimento</option>
					<option>Veneno de insectos</option>
					<option>Moho</option>
					<option>Caspa de mascotas y otros animales</option>
					<option>Polen</option>
				</select>
			</p>
			<br>
			<input type="hidden" value="Administrativo" id="ocupacion_administrativo" >
			<p>
				<label>Evento</label>
				<?php
				include( 'controler/conexion.php');
				
				$dat="SELECT * FROM eventos";
				$stm = $conexion->query( $dat );
				
				//var_dump($datos);
				?>
				<select id="evento_administrativo">
					<option value="" >Elige Evento</option>
					<?php
				while($datos = $stm->fetch_object()):
				
				echo "<option  value='".$datos->nombre_evento."'>".$datos->nombre_evento."</option>"; 
				endwhile;
			    ?>
				</select>
			</p>
			<br>
			<p>
				<label>Categoria</label>
				<select id="categoria_administrativo" required="required">
				<option value="">Elige categoria</option>
				<option>JUVENIL 15-18 AÑOS</option>
				<option>LIBRE 19-29 AÑOS</option>
				<option>SUBMASTER 29-35 AÑOS</option>
				<option>MASTER 36-39 AÑOS</option>
				<option>VETERANO 39 AÑOS EN ADELANTE</option>
				</select>
			</p>
		<input type="hidden" value="<?php echo $fecha_hoy; ?>" id="fecha_reg_administrativo"/>
		<input type="hidden" value="25" id="costo_administrativo"/>
		<p>
		<label>Pertences algún equipo de la UAEM</label>
            <select id="taller_administrativo">
				<option value="">Elige Opción</option>
				<option>NO</option>		
                <option>AJEDREZ</option>
                <option>ACONDICIONAMIENTO FISICO</option>
                <option>LUCHA OLIMPICA</option>
                <option>FUTBOL RAPIDO</option>
                <option>BASQUETBOL</option>
                <option>VOLEIBOL</option>
                <option>TAEKWONDO</option>
             </select>
		</p>
		<br>
		<p>
		<label>Codigo Captcha</label>
		<center>
		<div id="random">
		<?php 
		$random=rand(100000,999999);
		?>
		<input type="text" id="captcha"value="<?php echo $random; ?>"disabled/>
		</div>
		</center>
		</p>
		<br>
		<p>
			<label>Coloca Captcha</label>
			<input type="text" id="capture_captcha_administrativo" maxlength="6" required="required" onkeypress="return justNumbers(event);"/>
			<input type="hidden" id="re_captcha_administrativo" value="<?php echo $random; ?>"/>
		</p>
		
		<br>
			<p>En pleno uso de mis facultades, declaro estar sano 
     			y apto para participar en el evento, reconozco los riesgos inherentes 
     			a la práctica deportiva, por lo que voluntariamente y con conocimiento 
     			pleno de esto, acepto y asumo la responsabilidad de mi integridad física, 
     			y libero de toda responsabilidad a la Universidad Autónoma del Estado de México, 
     			al Centro Universitario Valle de Chalco y al Comité Organizador.
     		</p>
     		<center><p>Acepto las condiciones <input type="checkbox" value="acepto" id="acepto" onclick="document.formAdministrativo.administrativo_uaem.disabled=!document.formAdministrativo.administrativo_uaem.disabled"><br />
	        </p></center>
	        <input type="button" value="Enviar" name="administrativo_uaem" id="administrativo_uaem" class="button" disabled>					
			  	<span id="resultado_administrativo"></span>
			</form>
		</div>	
		
		<!-- Mostrar opciones de trabajador -->			
		<div id="trabajador" class="element" style="display: none;">
			<form name="formTrabajador" id="formTrabajador">
			<input type="hidden" id="tipo_trabajador" value="Trabajador_UAEM">
				<h3>Trabajador</h3>
			<br>	
			<p>
				<h4>El costo por participar en el evento es de $25</h4>
			</p>
			<br>
			<p>
				<label>Correo</label>
				<input type="email" id="email_trabajador" required="required" class="email" >
			</p>
			<br>
			<p>
				<label>Apellido Paterno</label>
				<input type="text" id="paterno_trabajador" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<p>
				<label>Apellido Materno</label>
				<input type="text" id="materno_trabajador" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<p>
				<label>Nombre(s)</label>
				<input type="text" id="nombre_trabajador" maxlength="60" required="required" onkeypress="return soloLetras(event)"/>
			</p>
			<br>
			<label>Fecha de Nacimiento</label>
				<select id="dia_trabajador" required="required" >
				<option value="">Elige Dia</option>
				<?php
				for( $i = 1 ; $i <=31 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
				<select id="mes_trabajador" required="required">
				<option value="">Elige Mes</option>
				<option>ENERO</option>
				<option>FEBRERO</option>
				<option>MARZO</option>
				<option>ABRIL</option>
				<option>MAYO</option>
				<option>JUNIO</option>
				<option>JULIO</option>
				<option>AGOSTO</option>
				<option>SEPTIEMBRE</option>
				<option>OCTUBRE</option>
				<option>NOVIEMBRE</option>
				<option>DICIEMBRE</option>
				</select>
				<select id="anio_trabajador" required="required" >
				<option value="">Elige Año</option>
				<?php
				for( $i = 1900 ; $i <=2050 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
			<br><br>
			<p>
				<label>Lugar de nacimiento</label>
				<select id="lugar_trabajador" required="required">
					<option value="">Elige Lugar</option>					
					<option>Aguascalientes</option>
					<option>Baja California Norte</option>
					<option>Baja California Sur</option>
					<option>Campeche</option>
					<option>Chiapas</option>
					<option>Chihuahua</option>
					<option>Coahuila</option>
					<option>Colima</option>
					<option>Durango</option>
					<option>Guanajuato</option>
					<option>Guerrero</option>
					<option>Hidalgo</option>
					<option>Guadalajara</option>
					<option>Edo. México</option>
					<option>Michoacán</option>
					<option>Morelos</option>
					<option>Nayarit</option>
					<option>Monterrey</option>
					<option>Oaxaca</option>
					<option>Puebla</option>
					<option>Querétaro</option>
					<option>Quintana Roo</option>
					<option>San Luís Potosí</option>
					<option>Sinaloa</option>
					<option>Sonora</option>
					<option>Tabasco</option>
					<option>Tamaulipas</option>
					<option>Tlaxcala</option>
					<option>Veracruz</option>
					<option>Yucatán</option>
					<option>Zacatecas</option>
					<option>Distrito Federal</option>
				</select>
				
			</p>
			<br>
			<p>
				<label>Edad</label>
				<select id="edad_trabajador" required="required" >
				<option value="">Proporciona Edad</option>
				<?php
				for( $i = 15 ; $i <=99 ; $i++){
					?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?>
					<?php
				}
				?>
				</select>
			</p>
			<br>
			<p>
				<label>Sexo</label>
				</select>
				<select id="sexo_trabajador" required="required">
				<option value="">Elige Sexo</option>
				<option>HOMBRE</option>
				<option>MUJER</option>
				</select>
			</p>
			<br>
			<p>
				<label >Enfermedad</label>
				</select>
				<select id="enfermedad_trabajador" required="required">
				<option value="">Elige Opción</option>
				<option>NINGUNA</option>
				<option>DIABETES</option>
				<option>ASMA</option>
				<option>CARDIOVASCULARES</option>
				<option>OTRA</option>
				</select>
			</p>
			<br>
			<p>
				<label>Tipo de sangre</label>
				</select>
				<select id="sangre_trabajador" required="required">
				<option value="">Elige Tipo</option>
				<option>O-</option>
				<option>O+</option>
				<option>B-</option>
				<option>B+</option>
				<option>A-</option>
				<option>A+</option>
				<option>AB-</option>
				<option>AB+</option>
				<option>DESCONOCIDO</option>
				</select>
			</p>
			<br>
			<p>
				<label>Alergia</label>
				<select id="alergia_trabajador">
				    <option value="">Elige Opción</option>
				    <option>Ninguna</option>
				    <option>Fármacos</option>
					<option>Polvo</option>
					<option>Alimento</option>
					<option>Veneno de insectos</option>
					<option>Moho</option>
					<option>Caspa de mascotas y otros animales</option>
					<option>Polen</option>
				</select>
			</p>
			<br>
			<input type="hidden" value="Trabajador_UAEM" id="ocupacion_trabajador" >
			<p>
				<label>Evento</label>
				<?php
				include( 'controler/conexion.php');
				
				$dat="SELECT * FROM eventos";
				$stm = $conexion->query( $dat );
				
				//var_dump($datos);
				?>
				<select id="evento_trabajador">
					<option value="" >Elige Evento</option>
					<?php
				while($datos = $stm->fetch_object()):
				
				echo "<option  value='".$datos->nombre_evento."'>".$datos->nombre_evento."</option>"; 
				endwhile;
			    ?>
				</select>
			</p>
			<br>
			<p>
				<label>Categoria</label>
				<select id="categoria_trabajador" required="required">
				<option value="">Elige categoria</option>
				<option>JUVENIL 15-18 AÑOS</option>
				<option>LIBRE 19-29 AÑOS</option>
				<option>SUBMASTER 29-35 AÑOS</option>
				<option>MASTER 36-39 AÑOS</option>
				<option>VETERANO 39 AÑOS EN ADELANTE</option>
				</select>
			</p>
		<input type="hidden" value="<?php echo $fecha_hoy; ?>" id="fecha_reg_trabajador"/>
		<input type="hidden" value="25" id="costo_trabajador"/>
		<p>
		<label>Pertences algún equipo de la UAEM</label>
            <select id="taller_trabajador">
				<option value="">Elige Opción</option>
				<option>NO</option>		
                <option>AJEDREZ</option>
                <option>ACONDICIONAMIENTO FISICO</option>
                <option>LUCHA OLIMPICA</option>
                <option>FUTBOL RAPIDO</option>
                <option>BASQUETBOL</option>
                <option>VOLEIBOL</option>
                <option>TAEKWONDO</option>
             </select>
		</p>
		<br>
		<p>
		<label>Codigo Captcha</label>
		<center>
		<div id="random">
		<?php 
		$random=rand(100000,999999);
		?>
		<input type="text" id="captcha"value="<?php echo $random; ?>"disabled/>
		</div>
		</center>
		</p>
		<br>
		<p>
			<label>Coloca Captcha</label>
			<input type="text" id="capture_captcha_trabajador" maxlength="6" required="required" onkeypress="return justNumbers(event);"/>
			<input type="hidden" id="re_captcha_trabajador" value="<?php echo $random; ?>"/>
		</p>
		
		<br>
			<p>En pleno uso de mis facultades, declaro estar sano 
     			y apto para participar en el evento, reconozco los riesgos inherentes 
     			a la práctica deportiva, por lo que voluntariamente y con conocimiento 
     			pleno de esto, acepto y asumo la responsabilidad de mi integridad física, 
     			y libero de toda responsabilidad a la Universidad Autónoma del Estado de México, 
     			al Centro Universitario Valle de Chalco y al Comité Organizador.
     		</p>
     		<center><p>Acepto las condiciones <input type="checkbox" value="acepto" id="acepto" onclick="document.formTrabajador.trabajador_uaem.disabled=!document.formTrabajador.trabajador_uaem.disabled"><br />
	        </p></center>
	        <input type="button" value="Enviar" name="trabajador_uaem" id="trabajador_uaem" class="button" disabled>					
			  	<span id="resultado_trabajador"></span>
			</form>
		</div>	
 
        </section>
        </div>
            <div id="footer">
                <p id="legal">&copy;2015 Todos los derechos reservados Diseñado por <a href="#">Lic. Omar Pat.Du </a></p>
            </div>
    </body>
</html>        
