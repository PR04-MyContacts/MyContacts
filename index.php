<!doctype html>
<html lang="en-US">
<head>

    <meta charset="utf-8">
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <title>Login</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">


</head>
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
<body>
    <BODY BACKGROUND="img/fondo.png">
<br><center><img src="img/logomc.png"></center>
    <div id="login">
        
        <form action="login.php" method="get">
            
            <fieldset class="clearfix">
                
                <p><span class="fontawesome-user"></span><input type="text" name="mail" value="ejemplo@gmail.com" onBlur="if(this.value == '') this.value = 'ejemplo@gmail.com'" onFocus="if(this.value == 'ejemplo@gmail.com') this.value = ''" required></p> 
                <p><span class="fontawesome-lock"></span><input type="password" name="pass" value="password" onBlur="if(this.value == '') this.value = 'password'" onFocus="if(this.value == 'password') this.value = ''" required></p> 
                <p><input type="submit" name="acce" value="Acceder"></p>

            </fieldset>

        </form>

        <p>No eres miembro? <a href="registro.php">Regístrate! </a><span class="fontawesome-arrow-right"></span></p>
    </div>

</body>
</html>