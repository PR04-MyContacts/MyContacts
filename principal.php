<?php 
include("conexion.proc.php");

 	
	if(!isset($_SESSION['id_usuario'])){
	 	header('location:index.php');
	}
	
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Tu panel de usuario</title>
 	<link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen" />
 </head>

 <body>
 	
 	<center>
 	<div class="div-contactos">
			<?php 
				$conAct= "SELECT * FROM tbl_contactos WHERE id_usuario=$_SESSION[id_usuario]";
 				$datos = mysqli_query($con,$conAct);
 				$pro = mysqli_fetch_array($datos);
				echo "Bievenido ".$_SESSION['mail']." <a href='logout.php'>| Log Out</a><a href='modificarContacto.php?id=$pro[id_usuario]'>| Modicar perfil</a>";
			 ?>
		
 	<?php
 		

 	
 	$conAct= "SELECT * FROM tbl_contactos WHERE id_usuario=$_SESSION[id_usuario]";
 	$datos = mysqli_query($con,$conAct);
 	





 	
		?>
	
	</br></br>
			
			<table  class="tabla">
		<?php
			

			while($pro = mysqli_fetch_array($datos)) {
				if(!empty($pro['foto'])){
					$fichero="img/$pro[foto]";
	      	if(file_exists($fichero)){
	      		echo utf8_encode("<tr><td><img class='imgcircular' src='$fichero'>$pro[nombre] <a href='verContacto.php?id=$pro[id_contacto]'><img class='imgMod' src=img/vermas.png></a> <a href='ModContacto.php?id=$pro[id_contacto]'><img class='imgMod' src=img/modificar.png></a> <a href='BorrarContacto.php?id=$pro[id_contacto]' ><img class='imgMod' src=img/borrar.jpg></a></td></tr>"); 
	      	}
				}else{
		 		echo utf8_encode("<tr><td><img class='img' src=img/usuario.jpeg>$pro[nombre] <a href='verContacto.php?id=$pro[id_contacto]'><img class='imgMod' src=img/vermas.png></a> <a href='ModContacto.php?id=$pro[id_contacto]'><img class='imgMod' src=img/modificar.png></a> <a href='BorrarContacto.php?id=$pro[id_contacto]' ><img class='imgMod' src=img/borrar.jpg></a></td></tr>");
	    		
	    		}
	      	//echo utf8_encode("<tr><td>$pro[act_nombre]</td></tr>"); 
	      	
			

			
				
			

		
}
						
		 ?>
			</table>
		</div>
</center>
 	

 	


 	
 </body>
 </html>