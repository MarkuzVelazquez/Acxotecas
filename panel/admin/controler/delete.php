<?php

	include( 'conexion.php' );
		
		$sql = "DELETE FROM eventos WHERE id_evento =?";
		$sentencia = $conexion->prepare( $sql );
		$sentencia->bind_param( 'i' , $_GET[ 'id' ] );
		$exito = $sentencia->execute();
		
		if( $exito ){
			
			echo "<script type=\"text/javascript\">alert('Evento borrado con exito'); window.location='../show_event.php';</script>";
			
		}else{
			echo "<script type=\"text/javascript\">alert('Error al borrar'); window.location='../show_event.php';</script>";
		}
	
?>
