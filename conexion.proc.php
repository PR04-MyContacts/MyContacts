<?php
	//conectamos con la base de datos
	$con = mysqli_connect("localhost", "root", "", "bd_mycontacts");

	//si no se puede realizar la conexión, mostramos error
	if (!$con) {
		echo "Error: No se puede conectar a la BD." . PHP_EOL;
		exit;
	}
?>