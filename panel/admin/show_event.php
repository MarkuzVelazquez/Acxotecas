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
     
$sql = "SELECT * FROM eventos";
$result = mysql_query($sql);

$num=mysql_num_rows( $result);


if($num==0){
    echo 'No hay ningun evento registrado';    
}else{
    
    ?>
    <div id="tabla">
    <center><p><h2>Eventos Registrados</h2></p></center>  
                            
        <table border="1" width="100%">
        <thead>
        <th>Nombre Evento</th>     
        <th>Fecha</th>
        <th>Descripción</th>
        <th>Borrar</th>
        
        </thead>
        <tbody>
        

    <?php
//echo "<BR>Hay errores en la consulta sql";
while ($row = mysql_fetch_array($result)):

           
           $id_evento = $row[ 'id_evento' ];
           $nombre = $row[ 'nombre_evento' ];
           $dia_evento = $row[ 'dia_evento' ];
           $mes_evento = $row[ 'mes_evento' ];
           $anio_evento = $row[ 'anio_evento' ];
           $descripcion = $row[ 'descripcion' ];
           
           ?>
            <tr>
               <td><?php echo $nombre; ?></td>
               <td><?php echo $dia_evento."-".$mes_evento."-".$anio_evento; ?></td>
               <td><?php echo $descripcion; ?></td> 
               <td><a href="controler/delete.php?id=<?php echo $id_evento; ?>">Borrar</a></td> 
            </tr>
            <?php
            endwhile;
        }
        ?>   
        </tbody>
        </table>   
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