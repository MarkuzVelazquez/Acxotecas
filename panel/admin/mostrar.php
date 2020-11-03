<?php
error_reporting(0);
session_start();
if (isset($_SESSION['usuario']))
{
  if($_POST['evento']==NULL){
    $evento_inf=$_POST['evento'];
    echo "<script type=\"text/javascript\">alert('No haz seleccionado un evento'); window.location='show_user.php';</script>";
  }else{
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
                <li><a href="show_user.php">Volver a la pagina anterior</a></li>
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
     
$sql = "SELECT * FROM registros WHERE evento LIKE '%$evento_inf%'";
$result = mysql_query($sql);

$num=mysql_num_rows( $result);


if($num==0){
    echo 'No hay ningun evento registrado';    
}else{
    
    ?>
    <div id="tabla">
    <center><p><h2>Participantes Registrados</h2></p></center>  
                            
        <table border="1" width="100%">
        <thead>
        <th>No. Competidor</th>
        <th>Nombre</th>
        <th>A.Paterno</th>
        <th>A.Materno</th>
        <th>Nombre Evento</th>     
        <th>Email</th>
        <th>Pago</th>
        <th>Registrar Pago</th>
        <th>Borrar</th>
        
        </thead>
        <tbody>
        

    <?php
//echo "<BR>Hay errores en la consulta sql";
while ($row = mysql_fetch_array($result)):

           $numero = $row[ 'id_registros' ];
           $nombre = $row[ 'nombre' ];
           $paterno = $row[ 'paterno' ];
           $materno = $row[ 'materno' ];
           $evento = $row[ 'evento' ];
           $email = $row[ 'email' ];
           $pago = $row[ 'pago' ];
           
           ?>
            <tr>
              <td><?php echo $numero; ?></td>
               <td><?php echo $nombre; ?></td>
               <td><?php echo $paterno ?></td>
               <td><?php echo $materno ?></td>
               <td><?php echo $evento ?></td>
               <td><?php echo $email ?></td>
               <td><?php echo $pago; ?></td> 
               <td><a href="controler/pago.php?id=<?php echo $numero; ?>">Click Aqui</a></td> 
               <td><a href="controler/delete_user.php?id=<?php echo $numero; ?>">Borrar</a></td> 
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
}
else
{
    echo '<script>location.href = "index.php";</script>'; 
}
?>