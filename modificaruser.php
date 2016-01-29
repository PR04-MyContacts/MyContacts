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
		<title>Modificar usuario</title>
		<link href="css/registro.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
        <script type="text/javascript" src="validaFormulario.js"></script>
         <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false">
        </script>
            <script type="text/javascript">
            var mapa;
            var marcador;
            var geocoder;            
            var marcador2;
            function inicializar(){    
            geocoder = new google.maps.Geocoder();        
            var myLatlng = new google.maps.LatLng(37.192869,-3.613186);
            var mapOptions = {
                  zoom: 5,
                  center: myLatlng,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            mapa = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);    

            google.maps.event.addListener(mapa, 'click', function (event){
                creaMarcador(event.latLng)
                });

            }

            function creaMarcador(localizacion){                
                // Crear marcador
                   if (marcador) marcador.setMap(null);                   
                   marcador = new google.maps.Marker({
                   position: localizacion,
                   draggable: true, 
                   map: mapa
                });
                mapa.setCenter(localizacion);
                 // Rellenar X e Y
                document.formulario.latitud1.value=localizacion.lat();
                document.formulario.longitud1.value=localizacion.lng();

                // Modificar X e Y al mover
                google.maps.event.addListener(marcador,'drag',function(event){
                    document.formulario.latitud1.value=event.latLng.lat();
                    document.formulario.longitud1.value=event.latLng.lng();
                    //mapa.setCenter(localizacion);
                });

            }

            function direc(){            
            var dire = document.getElementById("direccion").value;            
              geocoder.geocode( {'address': dire}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                  mapa.setCenter(results[0].geometry.location);
                  creaMarcador(results[0].geometry.location);
              }
             else {
                  alert("Error: " + status);
            }    



             

            });

            }

              function creaMarcador2(localizacion){                
                // Crear marcador
                   if (marcador2) marcador2.setMap(null);                   
                   marcador2 = new google.maps.Marker({
                   position: localizacion,
                   draggable: true, 
                   map: mapa
                });
                mapa.setCenter(localizacion);
                 // Rellenar X e Y
                document.formulario.latitud2.value=localizacion.lat();
                document.formulario.longitud2.value=localizacion.lng();

                // Modificar X e Y al mover
                google.maps.event.addListener(marcador2,'drag',function(event){
                    document.formulario.latitud2.value=event.latLng.lat();
                    document.formulario.longitud2.value=event.latLng.lng();
                    //mapa.setCenter(localizacion);
                });

            }

            function direc2(){            
            var dire = document.getElementById("direccion2").value;            
              geocoder.geocode( {'address': dire}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                  mapa.setCenter(results[0].geometry.location);
                  creaMarcador2(results[0].geometry.location);
              }
             else {
                  alert("Error: " + status);
            }
              });

            }
            </script>
	</head>
	<body onload="inicializar()" BACKGROUND="img/fondo.png">
		
		<?php


			//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
			$sql = "SELECT * FROM tbl_usuario WHERE id_usuario=$_REQUEST[id]";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql que devuelve el producto en cuestión
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				$prod=mysqli_fetch_array($datos);
				?>

			<div id="login">
				<center><h1>Modifique los datos de su usuario!</h1>
					<br>
				<form action="modificarusers.proc.php" name="formulario" method="post" onsubmit="return validaFormulario();">
				<fieldset class="clearfix">

				
				Nombre: &nbsp
	            <input id="nombre" name= "nombre" class="element text" maxlength="255" value="<?php echo $prod['nombre']; ?>"/>&nbsp
	            Apellidos: &nbsp
	            <input id="apellido" name= "apellido" class="element text" maxlength="255" size="48" value="<?php echo $prod['apellido']; ?>"/><br/>
	            
	                        
	            Contraseña:<br/>
	            <input id="password" name= "password" type ="password" class="element text" maxlength="255" value="<?php echo $prod['password']; ?>"/><br/>	      
	            
	            
	            Mail:<br/>
	            <input id="mail" name="mail" class="element text medium" type="text" maxlength="255" value="<?php echo $prod['mail']; ?>"/><br>

	            Teléfono:<br/>
	            <input id="telefono" name="telefono" class="element text medium" type="text" maxlength="255" value="<?php echo $prod['telefono']; ?>"/><br/>
	            
	            Dirección 1:<br/>
	            <input id="direccion" id ="direccion" name="direccion" class="element text large" onchange="direc()" value="<?php echo $prod['direccion']; ?>" type="text"><br/>
	            
	            <input type="hidden" id="latitud1" id="latitud1" name= "latitud1" class="element text" maxlength="255" value="<?php echo $prod['latitud1']; ?>"/>&nbsp
	            
	            <input type="hidden" id="longitud1" id="longitud1" name= "longitud1" class="element text" maxlength="255" value="<?php echo $prod['latitud2']; ?>"/>
	            
	            Dirección 2:<br/>
	            <input id="direccion2" name="direccion2" class="element text large" onchange="direc2()" value="<?php echo $prod['direccion2']; ?>" type="text"><br/>
	            
	            <input type ="hidden" id="latitud2" id="latitud2" name= "latitud2" class="element text" maxlength="255" value="<?php echo $prod['latitud2']; ?>"/>&nbsp
	            
	            <input type ="hidden" id="longitud2" id="longitud2" name= "longitud2" class="element text" maxlength="255" value="<?php echo $prod['longitud2']; ?>"/><br/>
				<div id="map_canvas" style="width:500px;height:500px">&nbsp;</div>
            	
				
				<br/>
				<input type="submit" value="Modificar">
				</br>
				<a href="principal.php"><input type="volver" value="Volver"></a>
				</fieldset>

		</form></center>


				<?php
			} else {
				echo "Usuario con id=$_REQUEST[id_usuario] no encontrado!";
			}
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
		<br/><br/>
	</body>
</html>