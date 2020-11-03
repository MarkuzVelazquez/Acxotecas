<?php 
session_start();
if (isset($_SESSION['usuario']))
{

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'DELETE FROM registros';

mysql_select_db('area_deportes');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not delete data: ' . mysql_error());
}
echo "<script type=\"text/javascript\">alert('Borrado exitoso'); window.location='../show_user.php';</script>";
mysql_close($conn);
		
}
else
{
    echo "<script type=\"text/javascript\">alert('Error al borrar'); window.location='../show_user.php';</script>";
}	
?>