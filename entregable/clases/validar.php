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

    
}