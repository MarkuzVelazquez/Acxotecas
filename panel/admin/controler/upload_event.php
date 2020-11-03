<?php

error_reporting(0);
sleep(1);

include('conexion.php');

//Nombre
if (trim($_POST['nombre'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona nombre evento');</script>";
}else{
  $nombre = mysql_real_escape_string($_POST['nombre']);
}
//Dia
if (trim($_POST['dia'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona dia del evento');</script>";
}else{
  $dia = mysql_real_escape_string($_POST['dia']);
}
//Mes
if (trim($_POST['mes'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona mes del evento');</script>";
}else{
  $mes = mysql_real_escape_string($_POST['mes']);
}
//Anio
if (trim($_POST['anio'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona año del evento');</script>";
}else{
  $anio = mysql_real_escape_string($_POST['anio']);
}
//Texto
if (trim($_POST['texto'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona una descripcion');</script>";
}else{
  $texto = mysql_real_escape_string($_POST['texto']);
}

$consulta = $conexion->query( "SELECT * FROM eventos WHERE nombre_evento ='".$nombre."'");
 $datos = $consulta->fetch_array();
 
 $nombre_bd = $datos['nombre_evento'];
    
 $result = $consulta->num_rows;
 
 if($result > 0):
    
echo "<script type=\"text/javascript\">alert('Este evento ya existe, verifica tu informacion');</script>";
     
 else:
 
 $query = "INSERT eventos ( nombre_evento , dia_evento , mes_evento , anio_evento , descripcion)
            VALUES(?,?,?,?,?)";
    
    $sentencia = $conexion->prepare( $query );
    
    $sentencia->bind_param( 'siiis' , $nombre , $dia  , $mes , $anio , $texto);
    
    $exito = $sentencia->execute();
    if( $exito ){  
        echo "<script type=\"text/javascript\">alert('Evento registrado correctamente, para ver los eventos, valla a eventos y escoga mostrar'); window.location='add_event.php';</script>";
        
    }else{        
        echo "<br>No se pudo enviar la información";
    }
    endif;
?>