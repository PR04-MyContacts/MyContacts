<?php 
include("conexion.proc.php");

 	
	if(!isset($_SESSION['id_usuario'])){
	 	header('location:index.php');
	}

	$borrar= "DELETE FROM tbl_contactos WHERE id_contacto=$_REQUEST[id] AND id_usuario=$_SESSION[id_usuario]";
	echo $borrar;
	$consulta=mysqli_query($con,$borrar);
	header('location:principal.php');


	?>