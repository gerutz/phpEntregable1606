<?php
    require_once 'repositorio.php';
    require_once 'userJsonRepository.php';
    
    class JSONRepository extends Repositorio {
        private $userRepository;
        private $productRepository;
        
        public function getUserRepository(){
            if($this->userRepository === null){
                $userRepository = new UserJsonRepository();                
            }
            return $this->userRepository;
        }
        
        public function getProductRepository(){
            if($this->productRepository === null){
                $productRepository = new ProductJsonRepository();                
            }
            return $this->productRepository;
        }

    }
