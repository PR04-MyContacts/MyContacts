<?php 
include("conexion.proc.php");

 	
	if(!isset($_SESSION['id_usuario'])){
	 	header('location:index.php');
	}


	$borrar= "DELETE FROM tbl_contactos WHERE id_usuario=$_SESSION[id_usuario]";
	echo $borrar;
	$consulta=mysqli_query($con,$borrar);

	$borrar0= "DELETE FROM tbl_usuario WHERE id_usuario=$_SESSION[id_usuario]";
	echo $borrar0;
	$consulta0=mysqli_query($con,$borrar0);

	
	header('location:index.php');


	?>