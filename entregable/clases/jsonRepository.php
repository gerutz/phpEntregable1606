<?php
    require_once 'repositorio.php';
    require_once 'userJsonRepository';
    
    class JSONRepository extends Repositorio {
        private $userRepository;
        
        public function getUserRepository(){
            if($this->userRepository === null){
                $userRepository = new UserJsonRepository();                
            }
            return $this->userRepository;
        }
    }
