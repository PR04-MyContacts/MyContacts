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
        <title>Login</title>
    </head>
    <body>
        <div id="envoltura">
        <header id="cabecera">
            <h1>Login</h1>
        </header>
        <section id="seccion">
            <article>
                <header>
                    <h1>
                        <?php
                            if(isset($error)){
                                echo "ERROR: " . $error;
                                echo "<br/><br/>";
                            }
                        ?>  
                    </h1>
                </header>
                <form name="flogin" action="login.php" method="get">
                    <big>Mail: </big><input type="text" name="mail" size="25" maxlength="50"><br/><br/>
                    <big>Password: </big><input type="password" name="pass" size="25" maxlength="25"><br/><br/>
                    <input type="submit" name="acce" value="Acceder">
                </form>
            </article>
        </section>
    </body>
</html>