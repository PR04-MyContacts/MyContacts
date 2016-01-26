<?php
    //iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
    session_start();
    //si existe la variable de sesión error, la guardamos en la variable error ya que al destruir la sesión, esta desaparecería
    if(isset($_SESSION ['error'])){
        $error=$_SESSION['error'];
    }
    //destruimos la sesión para no poder llegar de manera indirecta a ninguna página posterior a la de login
    session_destroy();
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
            $sql = "SELECT * FROM tbl_usuario ORDER BY idUser ASC";

            //mostramos la consulta para ver por pantalla si es lo que esperábamos o no
            //echo "$sql<br/>";

            //lanzamos la sentencia sql
            $datos = mysqli_query($con, $sql);
            ?>
             <div id="login">
        <center><form action="registro.proc.php" method="POST">

            <fieldset class="clearfix">

            Nombre:<br/>
            <input type="text" name="nombre" size="20" maxlength="25"><br/>
            Apellidos:<br/>
            <input type="text" name="apellido" size="20" maxlength="50"><br/>
            Contraseña:<br/>
            <input type="password" name="password"><br/>
            Mail:<br/>
            <input type="text" name="mail" size="40" maxlength="100"><br/>
            Teléfono:<br/>
            <input type="text" name="telefono" maxlength="9"><br/>
            Dirección:<br/>
            <input type="text" name="direccion" size="40" maxlength="100"><br/>
            
            <input type="submit" value="Registrar">
            </br>
            <a href="index.php"><input type="volver" value="Volver"></a>

             </fieldset>

        </form></center>
        <div>
        <!--<a href="gestusers.php">Volver</a>!-->
    </body>
</html>