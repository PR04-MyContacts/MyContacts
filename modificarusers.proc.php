<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql

			$sql = "UPDATE tbl_usuario SET nombre='$_REQUEST[nombre]', apellido='$_REQUEST[apellido]', password='$_REQUEST[password]', mail='$_REQUEST[mail]', telefono='$_REQUEST[telefono]', direccion='$_REQUEST[direccion]' WHERE id_usuario=$_REQUEST[id_usuario]";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: principal.php")
		?>
	</body>
</html>