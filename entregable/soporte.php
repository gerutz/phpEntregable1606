<?php

require_once 'usuarios.php';
require_once 'validar.php';
require_once 'auth.php';
require_once 'jsonRepository.php';


$tipoRepositorio = json;
$repositorio = null;

if($tipoRepositorio = json){
    $repositorio = new JSONRepository();          
}
        
$auth = Auth::getInstance($repositorio->getUserRepository());
$validar = Validar::getInstance($repositorio->getUserRepository());

