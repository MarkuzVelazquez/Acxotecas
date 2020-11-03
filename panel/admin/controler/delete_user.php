<?php

	include( 'conexion.php' );
		
		$sql = "DELETE FROM registros WHERE id_registros =?";
		$sentencia = $conexion->prepare( $sql );
		$sentencia->bind_param( 'i' , $_GET[ 'id' ] );
		$exito = $sentencia->execute();
		
		if( $exito ){
			
			echo "<script type=\"text/javascript\">alert('Participante borrado con exito'); window.location='../show_user.php';</script>";
			
		}else{
			echo "<script type=\"text/javascript\">alert('Error al borrar'); window.location='../show_user';</script>";
		}
	
?>
