<?php

$servidor = 'localhost';
$usuario = 'root';
$pwd     ='';
$bd      = 'area_deportes';

$conexion = new mysqli($servidor , $usuario, $pwd, $bd) or die( 'No hay conexion');

?>
