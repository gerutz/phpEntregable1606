<?php
require 'soporte.php';

if($auth->usuarioLogueado()){
    header("locaction:index.php");
}
    
if($_POST){

    $errores = $validar->validarLogin();

    if(empty($errores)){
        
        $usuario = $repositorio->getUserRepository()->getUserByMail($_POST['mail']);
        
        $auth->loguear($usuario);
        
        //implementar recordarme
        
        header("location:index.php"); 
     }
}
?>

<html>
    <head>
        <title>
            Login Page
        </title>
    </head>
    <body>
        <h1>Hola Ingresa los datos de tu cuenta</h1>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="mail" id="email" >
            <label for="pass">Password</label>
            <input type="password" id="pass">
            <button type="submit" value="Loguear">                
        </form>
    </body>
</html>