<?php
session_start();
	//conectamos con la base de datos
	$con = mysqli_connect("mysql.hostinger.es", "u971083830_mycon", "qwe123", "u971083830_mycon");

	//si no se puede realizar la conexión, mostramos error
	if (!$con) {
		echo "Error: No se puede conectar a la BD." . PHP_EOL;
		exit;
	}
?>