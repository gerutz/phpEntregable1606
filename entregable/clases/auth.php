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
    }

   
    
    public function checkLogin(){}
    
    public function login(){}
    
    public function logout(){} 
    
    public function estaLogueado(){}
    
    public function getUsuarioLogueado(){}   
}

