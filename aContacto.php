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
        <title>Registro</title>
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
<body onload="inicializar()">
  <BODY BACKGROUND="img/fondo.png">
        <?php
            //realizamos la conexión con mysql
            $con = mysqli_connect('localhost', 'root', '', 'bd_mycontacts');

            //como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
            $sql = "SELECT * FROM tbl_contactos ORDER BY id_usuario ASC";

            //mostramos la consulta para ver por pantalla si es lo que esperábamos o no
            //echo "$sql<br/>";

            //lanzamos la sentencia sql
            $datos = mysqli_query($con, $sql);
            ?>
             <div id="login">
        <center><form action="aContacto.proc.php" method="POST" enctype="multipart/form-data" name="formulario" onsubmit="return validaFormulario();">

            <fieldset class="clearfix">

            Nombre:<br/>
            <input type="text" name="nombre" size="20" maxlength="25"><br/>
            Apellido:<br/>
            <input type="text" name="apellido" size="20" maxlength="50"><br/>
            Imagen:<br/>
            <input type="file" name="imagen" id="imagen" /><br/>
            Mail:<br/>
            <input type="text" name="mail" size="40" maxlength="100"><br/>
            Teléfono:<br/>
            <input type="text" name="telefono" maxlength="9"><br/>
            Dirección:<br/>
            <input type="text" id ="direccion" name="direccion" size="40" maxlength="100" onchange="direc()"><br/>
            
            Ubicación 1:<br/>
            Longitud:<input type="text" name="longitud1" size="40" maxlength="100"> Latitud: <input type="text" name="latitud1" size="40" maxlength="100"><br/>
            Dirección secundaria:<br/>
            <input type="text" id ="direccion2" name="direccion2" size="40" maxlength="100" onchange="direc2()"><br/>
            Ubicación 2:<br/>
            Longitud:<input type="text" name="longitud2" size="40" maxlength="100"> Latitud: <input type="text" name="latitud2" size="40" maxlength="100"><br/>
            <div id="map_canvas" style="width:500px;height:500px">&nbsp;</div>
            </br>
            <input type="submit" value="Nuevo contacto">
            </br>
            <a href="principal.php"><input type="volver" value="Volver"></a>

             </fieldset>

        </form></center>
        <div>
        <!--<a href="gestusers.php">Volver</a>!-->
    </body>
</html>