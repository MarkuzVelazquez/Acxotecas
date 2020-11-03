<?php

error_reporting(0);
sleep(1);

include('conexion.php');

$tipo = $_POST['tipo'];
$fecha_reg = $_POST['fecha_reg'];
$costo = $_POST['costo'];
$re_captcha = $_POST['re_captcha'];
//Validacion email
if (trim($_POST['email']) == '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona un correo');</script>";
}else{
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === FALSE){
        echo "<script type=\"text/javascript\">alert('Este correo no es valido, verificalo');</script>";
        }else{
         $email =  mysql_real_escape_string($_POST['email']);
        }
}
//Validacion paterno
if (trim($_POST['paterno'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona apellido paterno');</script>";
}else{
$paterno = mysql_real_escape_string($_POST['paterno']);
}
//Materno
if (trim($_POST['materno'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona apellido materno');</script>";
}else{
  $materno = mysql_real_escape_string($_POST['materno']);
}
//Nombre
if (trim($_POST['nombre'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona nombre');</script>";
}else{
  $nombre = mysql_real_escape_string($_POST['nombre']);
}
//Dia
if (trim($_POST['dia'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona dia de nacimiento');</script>";
}else{
  $dia = mysql_real_escape_string($_POST['dia']);
}
//Mes
if (trim($_POST['mes'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona mes de nacimiento');</script>";
}else{
  $mes = mysql_real_escape_string($_POST['mes']);
}
//Anio
if (trim($_POST['anio'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona año de nacimiento');</script>";
}else{
  $anio = mysql_real_escape_string($_POST['anio']);
}
//Lugar
if (trim($_POST['lugar'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona lugar de nacimiento');</script>";
}else{
  $lugar = mysql_real_escape_string($_POST['lugar']);
}
//Edad
if (trim($_POST['edad'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona edad');</script>";
}else{
  $edad = mysql_real_escape_string($_POST['edad']);
}
//Sexo
if (trim($_POST['sexo'])== '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona genero (sexo)');</script>";
}else{
  $sexo = mysql_real_escape_string($_POST['sexo']);
}
//Enfermedad
if (trim($_POST['enfermedad'])== '')
{
       echo "<script type=\"text/javascript\">alert('Inidica si padece enfermedad');</script>";
}else{
  $enfermedad = mysql_real_escape_string($_POST['enfermedad']);
}
//Sangre
if (trim($_POST['sangre'])== '')
{
       echo "<script type=\"text/javascript\">alert('Inidica tipo de sangre');</script>";
}else{
  $sangre = mysql_real_escape_string($_POST['sangre']);
}
//Alergia
if (trim($_POST['alergia'])== '')
{
       echo "<script type=\"text/javascript\">alert('Indica si padece alergia');</script>";
}else{
  $alergia = mysql_real_escape_string($_POST['alergia']);
}
//Ocupacion
if (trim($_POST['ocupacion'])== '')
{
       echo "<script type=\"text/javascript\">alert('Indica ocupacion');</script>";
}else{
  $ocupacion = mysql_real_escape_string($_POST['ocupacion']);
}
//Evento
if (trim($_POST['evento'])== '')
{
       echo "<script type=\"text/javascript\">alert('Indica el evento en el cual va a participar');</script>";
}else{
  $evento = mysql_real_escape_string($_POST['evento']);
}
//Categoria
if (trim($_POST['categoria'])== '')
{
       echo "<script type=\"text/javascript\">alert('Indica la categoria a la que pertenece');</script>";
}else{
  $categoria = mysql_real_escape_string($_POST['categoria']);
}
//Taller
if (trim($_POST['taller'])== '')
{
       echo "<script type=\"text/javascript\">alert('Indica si pertenece a un equipo representativo de la UAEM');</script>";
}else{
  $taller = mysql_real_escape_string($_POST['taller']);
}
//Captcha
if (trim($_POST['capture_captcha']) == '')
{
       echo "<script type=\"text/javascript\">alert('Coloca el codigo captcha');</script>";
}else{
  $capture_captcha = $_POST['capture_captcha'];
}
//Comprobar
if($capture_captcha==$re_captcha){

$consulta = $conexion->query( "SELECT * FROM registros WHERE email = '".mysql_real_escape_string($email)."' 
                              AND paterno = '".mysql_real_escape_string($paterno)."' AND materno = '".$materno."'
                              AND nombre = '".mysql_real_escape_string($nombre)."'");
 $datos = $consulta->fetch_array();
 
 $email_bd = $datos['email'];
 $paterno_bd = $datos['paterno'];
 $materno_bd = $datos['materno'];
 $nombre_bd = $datos['nombre'];
    
 $result = $consulta->num_rows;
 
 if($result > 0):
    
echo "<script type=\"text/javascript\">alert('Este registro ya existe, verifica tu informacion');</script>";
     
 else:
 
 $query = "INSERT registros ( tipo , email , paterno , materno , nombre , dia , mes , anio , lu_na , edad , sexo , enfermedad , sangre , alergia , ocupacion , evento , categoria , fe_re , costo , equipo_uaem)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    
    $sentencia = $conexion->prepare( $query );
    
    $sentencia->bind_param( 'sssssisisissssssssis' , $tipo , $email , $paterno  , $materno , $nombre , $dia  , $mes , $anio , $lugar , $edad , $sexo , $enfermedad , $sangre , $alergia , $ocupacion , $evento , $categoria , $fecha_reg , $costo , $taller);
    
    $exito = $sentencia->execute();
    if( $exito ){  
        echo "<script type=\"text/javascript\">alert('Datos enviados correctamente, a continuación proporcione los datos solicitados para obtener su baucher de pago'); window.location='search.php';</script>";
        
    }else{        
        echo "<br>No se pudo enviar la información";
    }
    endif;
}else{
       echo "<script type=\"text/javascript\">alert('Verifica que los codigos captcha sean iguales');</script>";
    
}
?>