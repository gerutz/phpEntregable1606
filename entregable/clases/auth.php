<?php
    
require_once ('repositorioUsuarios.php');

class Auth {
    
    private $repositorioUsuario;
    
    private static $instance = null;
    
    public static function getInstance(RepositorioUsuario $repositorioUsuario){
    
        if(Auth::$instance === null){
            session_start();
            Auth::$instance = new Auth();
            Auth::$instance->setRepositorioUsuario($repositorioUsuario);
            Auth::$instance->checkLogin();
        }  
        
        return Auth::$instance;
    }
    
    public function setRepositorioUsuario(RepositorioUsuario $repositorioUsuario){
        $this->repositorioUsuario = $repositorioUsuario;
    }
    
    public function checkLogin(){            
        
        if(!isset($_SESSION['usuarioLogueado'])){
            if(isset($_COOKIE['usuarioLogueado'])){
                $idUsuario = $_COOKIE['usuarioLogueado'];
                
                $usuario = $this->repositorioUsuario->getUsuarioById($idUsuario);//crear funcion getUsuarioById
                
                $this->login($usuario);
            }
        }
    }
    
    public function login($usuario){
        unset($usuario['password']);
        $_SESSION['usuarioLogueado'] = $usuario;
        
    }
    
    public function logout(){} 
    
    public function estaLogueado(){
            return isset($_SESSION['usuarioLogueado']);
    }
    
    public function getUsuarioLogueado(){
        return $_SESSION["usuarioLogueado"];
    }   
}

