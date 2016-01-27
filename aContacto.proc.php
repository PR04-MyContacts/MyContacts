
		<?php
		 include("conexion.proc.php");

    
    if(!isset($_SESSION['id_usuario'])){
        header('location:index.php');
    }
    		$repetido="SELECT * FROM tbl_contactos WHERE id_usuario=$_SESSION[id_usuario] AND nombre='$_REQUEST[nombre]' AND apellido='$_REQUEST[apellido]'";
    		$lanzar= mysqli_query($con, $repetido);
    		if(mysqli_num_rows($lanzar) != 0){
    			echo "Este usuario ya existe";
    			echo "<a href='principal.php'>Volver</a>";
    		}else{
			$ruta = "img/" . $_FILES['imagen']['name'];
			$imagen=$_FILES['imagen']['name'];
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			$con = mysqli_connect('localhost', 'root', '', 'bd_mycontacts');
			$sql = "INSERT INTO tbl_contactos (id_usuario, nombre, apellido, mail, telefono, direccion, foto, latitud1, longitud1, latitud2, longitud2) VALUES ('$_SESSION[id_usuario]','$_REQUEST[nombre]','$_REQUEST[apellido]', '$_REQUEST[mail]','$_REQUEST[telefono]','$_REQUEST[direccion]','$imagen','$_REQUEST[latitud1]','$_REQUEST[longitud1]','$_REQUEST[latitud2]','$_REQUEST[longitud2]')";
			$datos = mysqli_query($con, $sql);


			header("location: principal.php");
		}
		?>
