<?php

require_once 'repositorioUsuarios.php';

class Validar {
    
    private $userRepository;
    private static $instance = null;
    
    public static function getInstance(RepositorioUsuario $userRepository){
        if(Validar::$instance === null){
            Validar::$instance = new Validar();
            Validar::$instance->setUserRepository($userRepository);
        }
        return Validar::$instance;
    }
    
    private function setUserRepository(RepositorioUsuario $userRepository){
        $this->userRepository = $userRepository;
    }

    public function __construct() {
        
    }   
    
    public function validarUsuario($miUsuario){
        
        $errores = [];
        
        if(trim($miUsuario['nombre']) == ""){
            $errores[] = "Falta el nombre";
        }
        if(trim($miUsuario['apellido']) == ""){
            $errores[] = "Falta apellido";            
        }
        if(trim($miUsuario['mail']) == ""){
            $errores[] = "Falta el mail";
        }
        if(trim($miUsuario['pass']) == ""){
            $errores[] = "Falta ingresar password";
        }
        if($miUsuario['pass'] != $miUsuario['cpass']){
            $errrores[] = "La password no coiniciden";
        }
        if(!filter_var($miUsuario['mail'],FILTER_VALIDATE_EMAIL )){
            $errores[] = "El mail esta mal escrito";
        }
        
        if($this->userRepository->existeMail($miUsuario['mail'])){
            $errores[] = "Ese mail ya esta registrado";
        }
    
        return $errores;
    }
    
    
    public function validarLogin(){
        $errores = [];
        
        if(trim($_POST['mail'] == "")){
            $errores[] = "no ingresaste mail";          
        }
        if(!($this->userRepository->existeMail($_POST['mail']))){
            $errores = "Usuario no registrado";
        }
        if(!$this->userRepository->usuarioValido($_POST['mail'],$_POST['pass'])){
            $errores[] = "no coincide email y pass";
        }
        if(trim($_POST['pass']) = ""){
            $errores = "Password vacia";
        }
     
        return $errores[];
    }
    
}