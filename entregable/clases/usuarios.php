<?php

class Usuarios {
    private $id;
    private $nombre;
    private $apellido;
    private $mail;
    private $pass;
    private $cpass;
    private $sexo;
    
    function __construct(Array $usuarioEnviado) {
        $this->id = $usuarioEnviado['id'];
        $this->nombre = $usuarioEnviado['nombre'];
        $this->apellido = $usuarioEnviado['apellido'];
        $this->mail = $usuarioEnviado['mail'];
        $this->pass = $this->setPass($usuarioEnviado['pass']);      
        $this->sexo = $usuarioEnviado['sexo'];       
    }
    
    public function setNombre ($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function setPass($pass){
        $this->pass = password_hash($pass, PASSWORD_DEFAULT);
    }
    public function setCpass($cpass){
        $this->setCpAss = $cpass;
    }
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    
    
    public function getNombre(){
        return $this-> nombre;
    }
    public function getApellido(){
        return $this->apellido;      
    }
    public function getId(){
        return $this->id;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getPass(){
        return $this->pass;
    }
    public function getCpass(){
        return $this->cpass;
    }
    public function getSexo(){
        return $this->sexo;
    }

}    