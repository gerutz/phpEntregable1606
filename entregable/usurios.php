<?php

class Usuarios {
    private $id;
    private $nombre;
    private $apellido;
    private $mail;
    private $pass;
    private $cpass;
    private $sexo;
    
    function __construct($usuarioEnviado) {
        $this->id = $usuarioEnviado['id'];
        $this->nombre = $usuarioEnviado['nombre'];
        $this->apellido = $usuarioEnviado['apellido'];
        $this->mail = $usuarioEnviado['mail'];
        $this->pass = $usuarioEnviado['pass'];
        $this->cpass = $usuarioEnviado['cpass'];
        $this->sexo = $usuarioEnviado['sexo'];       
    }
    
}
