<?php 
include("conexion.proc.php");

 	
	if(!isset($_SESSION['id_usuario'])){
	 	header('location:index.php');
	}
	
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 		<?php
 	$consulta="SELECT * FROM tbl_contactos  WHERE id_contacto=$_REQUEST[id]";
 	$datos = mysqli_query($con,$consulta);
 	
 				$pro = mysqli_fetch_array($datos);

 				?>
 	<meta charset="UTF-8">
 	<title>Tu panel de usuario</title>
 	<link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen" />
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;hl=es&amp;key=ABQIAAAA30JtKUU8se-7KKPRGSfCMBT2yXp_ZAY8_ufC3CFXhHIE1NvwkxRZNdns2BwZvEY-V68DvlyUYwi1-Q" type="text/javascript"></script>
 	<script type="text/javascript">
//<![CDATA[  
function load() {
  if (GBrowserIsCompatible()) {
    var latitud = <?php echo $pro['latitud1']; ?>;
    var longitud = <?php echo $pro['longitud1']; ?>;
    var zoom = 20;
    var mapa = new GMap2(document.getElementById("mapa"));
    mapa.setCenter(new GLatLng(latitud, longitud), zoom);
    mapa.addControl(new GSmallMapControl());
mapa.addControl(new GMapTypeControl());

  }
 
  var point = new GPoint(<?php echo $pro['longitud1']; ?>, <?php echo $pro['latitud1']; ?>)
  var nuevoMarcador = new GMarker(point);
  GEvent.addListener(nuevoMarcador, "click", function() {
     this.openInfoWindowHtml("Lat: " + this.getPoint().lat() + "<br/>Lon: " + this.getPoint().lng());
 	});
  	mapa.addOverlay(nuevoMarcador);


  var point = new GPoint(<?php echo $pro['longitud2']; ?>, <?php echo $pro['latitud2']; ?>)
  var nuevoMarcador = new GMarker(point);
  GEvent.addListener(nuevoMarcador, "click", function() {
     this.openInfoWindowHtml("Lat: " + this.getPoint().lat() + "<br/>Lon: " + this.getPoint().lng());
 	});
  	mapa.addOverlay(nuevoMarcador);





}

//]]>
</script>


 </head>

 <body onload="load()" onunload="GUnload()">
 	
 	
 	<div class="div-vercontactos">
			<?php 
				$conAct= "SELECT * FROM tbl_contactos WHERE id_usuario=$_SESSION[id_usuario]";
 				$datos = mysqli_query($con,$conAct);
 				$pro = mysqli_fetch_array($datos);
				echo "Bienvenido ".$_SESSION['mail']." <a href='login.php'>| Log Out</a>";
			 ?>

		
 	<?php
 		

 	

 	






 	
		?>
	
	</br></br>
			
			<div  class="div-ver">
		<?php
			
 	$ver= "SELECT * FROM tbl_contactos WHERE id_usuario=$_SESSION[id_usuario] AND id_contacto=$_REQUEST[id]";
 	$datos = mysqli_query($con,$ver);
 	$contacto = mysqli_fetch_array($datos);
 	if(!empty($contacto['foto'])){
					$fichero="img/$contacto[foto]";
					echo"</br><img class='imgcircular' src='$fichero'>";
				}else{
					echo"</br><img class='img' src=img/usuario.jpeg>";
				}
 	
 	echo "</br>$contacto[nombre] $contacto[apellido]</br>";
 	echo "$contacto[mail]</br>";
 	echo "$contacto[direccion]</br>";
 	echo "$contacto[telefono]</br></br>";
	echo "<a href='principal.php'><img class='imgVolver'src='img/volver.png'></a>";	
						
		 ?>
		<div id="mapa" class="mapa"></div>

			</div>
		</div>

 	




 	
 </body>
 </html>