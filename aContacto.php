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
    </head>
<body>
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
        <center><form action="aContacto.proc.php" method="POST" enctype="multipart/form-data">

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
            <input type="text" name="direccion" size="40" maxlength="100"><br/>
            Ubicación 1:<br/>
            Longitud:<input type="text" name="latitud1" size="40" maxlength="100"> Latitud: <input type="text" name="longitud1" size="40" maxlength="100"><br/>
            Ubicación 2:<br/>
            Longitud:<input type="text" name="latitud2" size="40" maxlength="100"> Latitud: <input type="text" name="longitud2" size="40" maxlength="100"><br/>

            <input type="submit" value="Registrar">
            </br>
            <a href="principal.php"><input type="volver" value="Volver"></a>

             </fieldset>

        </form></center>
        <div>
        <!--<a href="gestusers.php">Volver</a>!-->
    </body>
</html>