<?php

    require 'soporte.php';

    $nombre = "";

    if($auth->estaLogueado()){   
        $usuario = $auth->getUsuarioLogueado();
        $nombre = $usuario->getNombre();
    }

    $errores = $validar->validarLogin();

    // registrarse
    // login
    // logout
?>
<html>
    

    <head>
        <title> Home Entregable</title>
    </head>
    <body>    
        <h1>Welcome <?php echo $nombre ?> to nuestro entregable</h1>
        <?php if(!$auth->estaLogueado()){?>
        <ul>
            <li>
                <a href="login.php">Login</a>  <!-- implementar login.php-->
            </li>
            <li>
                <a href="register.php">Registrate</a>
            </li>          

        <?php } else { ?> <!-- else -->
            <li>
                <a href="log-out.php">Registrate</a> <!-- implementar log-out.php-->
            </li>          
        </ul>    
        <?php } ?>

    </body>
</html>                