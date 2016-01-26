<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'bd_mycontacts');
			$sql = "INSERT INTO tbl_usuario (nombre, apellido, password, mail, telefono, direccion) VALUES ('$_REQUEST[nombre]','$_REQUEST[apellido]', '$_REQUEST[password]', '$_REQUEST[mail]','$_REQUEST[telefono]','$_REQUEST[direccion]')";
			//$password=md5($_POST['password']);
			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: principal.php")
		?>
	</body>
</html>