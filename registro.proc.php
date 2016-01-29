<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$pass_encriptada=md5($_REQUEST['password']);

			$sql = "INSERT INTO tbl_usuario (nombre, apellido, password, mail, telefono, direccion, latitud1, longitud1, direccion2, latitud2, longitud2) VALUES ('$_REQUEST[nombre]','$_REQUEST[apellido]', '$pass_encriptada', '$_REQUEST[mail]','$_REQUEST[telefono]','$_REQUEST[direccion]','$_REQUEST[latitud1]','$_REQUEST[longitud1]','$_REQUEST[direccion2]','$_REQUEST[latitud2]','$_REQUEST[longitud2]')";
			//$password=md5($_POST['password']);
			//echo $sql;
			
			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: principal.php")
		?>
	</body>
</html>