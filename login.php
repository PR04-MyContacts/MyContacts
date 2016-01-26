<?php
	//iniciamos sesion - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
	session_start();

	//incluimos el fichero conexion.proc.php que realiza la conexión a MySQL
	include("conexion.proc.php");

	$pass_encriptada=md5($_REQUEST['pass']);

	//preparamos la consulta que intenta encontrar el usuario Y la contraseña introducidos
	$sql = "SELECT * FROM tbl_usuario WHERE mail='$_REQUEST[mail]' AND password='$pass_encriptada'";
	//echo $sql;
	//ejecutamos la consulta
	$resultado = mysqli_query($con,$sql);

	//si la consulta devuelve un registro, es que ha encontrado una coincidencia de usuario y contraseña, y por lo tanto, el usuario es correcto, hay que dejarlo pasar
	if(mysqli_num_rows($resultado)==1){
		//extraemos los datos de ese usuario para poder coger el nivel de acceso. no se hace en un bucle ya que, si no hay algún problema gordo, en la base de datos o hay un registro o no hay, no puede haber más de uno
		$datos_usuario=mysqli_fetch_array($resultado);
		
		//creamos la variable de sesión mail
		$_SESSION['id_usuario']=$datos_usuario['id_usuario'];
		$_SESSION['mail']=$_REQUEST['mail'];
		$_SESSION['nombre']=$datos_usuario['nombre'];

		//redirigimos a la página principal
		header("location: principal.php");
	} else {
		//como no se ha encontrado la pareja de usuario y contraseña, redirigimos a la página index.php con un mensaje de error
		$_SESSION['error']="Usuario y contraseña incorrectos";
		header("location: index.php");
	}

?>