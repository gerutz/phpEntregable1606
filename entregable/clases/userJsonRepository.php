<?php
require_once 'usuarios.php';
require_once 'repositorioUsuarios.php';


class UserJsonRepository extends RepositorioUsuario {
    
    public function existeMail($mail) {
        
        $usuariosArray = $this->getAllUsers(); 
        
        foreach ($usuariosArray as $key=>$usuario){
            if($mail == $usuario->getMail()){
                return true;
            }
        }
        return false;
    } 
    
    public function guardarUsuario(Usuarios $nuevoUsuario) {        
            $miUsuarioArray = $this->usuarioToArray($nuevoUsuario);
            
            $usuarioJSON = json_encode($miUsuarioArray);
            
            file_put_contents('../usuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND);
    }
    
    private function usuarioToArray(Usuarios $miUsuario){        
        $usuarioArray = [];
        
        $usuarioArray['id'] = $miUsuario->getId();
        $usuarioArray['nombre'] = $miUsuario->getNombre();
        $usuarioArray['apellido'] = $miUsuario->getApellido();
        $usuarioArray['mail'] = $miUsuario->getMail();
        $usuarioArray['pass'] = $miUsuario->getPass();
        $usuarioArray['sexo'] = $miUsuario->getSexo();
        
        return $usuarioArray;
    }
    
    private function arrayToUsuario(Array $miUsuarioArray){
        return new Usuario($miUsuarioArray);
    }
    
    private function traerNuevoId()
	{
		if (!file_exists("../usuarios.json"))
		{
			return 1;
		}

		$usuarios = file_get_contents("../usuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);
		$ultimoUsuario = $usuariosArray[count($usuariosArray) - 2 ];
		$ultimoUsuarioArray = json_decode($ultimoUsuario, true);

		return $ultimoUsuarioArray["id"] + 1;
	}
        
    public function usuarioValido($mail, $pass){
        
        $usuario = $this->getUsuarioByEmail($mail);
        
        if($usuario){
            if(password_verify($pass, $usuario->getPass()));
            return true;
           
        }
        
        return false;
    }    

    
    public function getUsuarioByEmail($mail){
        
        $arrayUsuarios = $this->getAllUsers();
        
        foreach($arrayUsuarios as $key=>$usuario){
            if($mail ===$usuario->getMail()){
                return $usuario;
            }
        }
        return null;
    }
    
    public function getUuarioById($id){
        $arrayUsuarios = $this->getAllUsers();
        
        foreach($arrayUsuarios as $key => $usuario){
            if($id == $usuario->getId()){
                return $usuario;
            }
        }
        return null;
    }
    
    public function getAllUsers(){
        
        $usuarioEnBaseJSON = file_get_contents('../usuarios.json');
        
        $usuariosArray = explode(PHP_EOL, $usuarioEnBaseJSON);
        
        
        return $this->muchosArrayAMuchosUsuarios($usuariosArray);
        
    }
    
    private function muchosArrayAMuchosUsuarios($arrayDeUsuarios){
        
        $arrayUsuarios = [];
        
        foreach ($arrayUsuarios as $key=>$arrayUsuario){
            $arrayDeUsuarios[] = $this->arrayToUsuario(json_decode($arrayUsuario, 1));
        }
        return $arrayDeUsuarios;
    }
    
}


