<?php
error_reporting(0);
session_start();
if (isset($_SESSION['usuario']))
{

include( 'conexion.php' );
  
  $sql = "SELECT * FROM registros WHERE id_registros = '".$_GET['id']."'";
  $sentencia = $conexion->query( $sql );//metodo()algo que hace
  $filas = $sentencia->num_rows;//propiedades,describir el objeto

  
  if ($filas){
    $datos = $sentencia->fetch_object();
    ?>
<!DOCTYPE html>
<html oncontextmenu="return false">
    <head>
        <title>Promoción Deportiva</title>
         <meta charset="UTF-8"/>
         <link rel="icon" href="../../../img/uaem.png" />
        <link rel="stylesheet" href="../css/estilos.css"/>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/pago.js"></script>
    </head>
    
    <body>
		
		<div id="principal">
        
        <header>
           <h2>Panel Admin</h2>            
        </header>
        		<?php $evento=$_GET['id'];?> 
        <section>

          <form method="POST" action="../mostrar.php">
            <p>
              <input type="hidden" name="evento" value="<?php echo $evento; ?>" >
              Pagina Anterior <input type="submit" value="Regresar"class="button">
            </p>
          </form>

        <form>
          <p>
            <label>Registra Pago</label>
            <input type="hidden" id="id_user" value="<?php echo $datos->id_registros;?>">
            <select id="pago">
              <option value="">Escoge Opción</option>
              <option value="SI">Si</option>
              <option value="NO">No</option>
            </select> 
          </p>
          <input type="button" value="Enviar" name="pay" id="pay" class="button">   
              <br>
               <span id="result_pay"></span>
        </form>
        </section>
        </div>
            <div id="footer">
                <p id="legal">&copy;2015 Todos los derechos reservados Diseñado por <a href="#">Lic. Omar</a></p>
            </div>
    </body>
</html> 
<?php
}else{
    echo 'No existe el resgistro';
    }
}
else
{
    echo '<script>location.href = "index.php";</script>'; 
}
?>