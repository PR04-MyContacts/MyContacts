<?php 
include("conexion.proc.php");

 	
	if(!isset($_SESSION['id_usuario'])){
	 	header('location:index.php');
	}
	
 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mod proc</title>
	</head>
	<body>
		<?php

			if(empty($_FILES['imagen']['name'])){


			$sql = "UPDATE tbl_contactos SET nombre='$_REQUEST[nombre]', apellido='$_REQUEST[apellido]', mail='$_REQUEST[mail]', telefono='$_REQUEST[telefono]', direccion='$_REQUEST[direccion]',direccion2='$_REQUEST[direccion2]', latitud1='$_REQUEST[latitud1]', latitud2='$_REQUEST[latitud2]', longitud1='$_REQUEST[longitud1]', longitud2='$_REQUEST[longitud2]' WHERE id_contacto=$_REQUEST[id_contacto]";

			$datos = mysqli_query($con, $sql);
			echo $sql;
			header("location: principal.php");
		}else{
			$ruta = "img/" . $_FILES['imagen']['name'];
			$imagen=$_FILES['imagen']['name'];
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			$sql = "UPDATE tbl_contactos SET nombre='$_REQUEST[nombre]', foto='$imagen',apellido='$_REQUEST[apellido]', mail='$_REQUEST[mail]', telefono='$_REQUEST[telefono]', direccion='$_REQUEST[direccion]',direccion2='$_REQUEST[direccion2]', latitud1='$_REQUEST[latitud1]', latitud2='$_REQUEST[latitud2]', longitud1='$_REQUEST[longitud1]', longitud2='$_REQUEST[longitud2]' WHERE id_contacto=$_REQUEST[id_contacto]";

			$datos = mysqli_query($con, $sql);
echo $sql;
			header("location: principal.php");
		}
		?>
	</body>
</html>