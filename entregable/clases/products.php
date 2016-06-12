<?php
require_once 'soporte.php';

class Products {
    private $id;
    private $title;
    private $description;
    private $price;
    private $stock;
    private $id_owner;
    
    function __construct(Array $productSend) {
        $this->id = $productSend['id'];
        $this->title = $productSend['title'];
        $this->description = $productSend['description'];
        $this->price = $productSend['price'];     
        $this->stock = $productSend['stock'];    
        $this->id_owner = $productSend['id_owner'];       

    }
    
    public function setId ($id){
        $this->id = $id;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function setStock($stock){
        $this->stock = $stock; 
    }
    public function setIdOwner($id_owner){
        $this->id_owner = $auth->getUsuarioLogueado();//  Consultar si esta ok esta implementacion.
    }
    
    
    public function getId(){
        return $this-> id;
    }
    public function getTitle(){
        return $this->title;      
    }
    public function getDescription(){
        return $this->description;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getStock(){
        return $this->stock;
    }
    public function getIdOwner(){
        return $this->id_owner;
    }
   

}    

