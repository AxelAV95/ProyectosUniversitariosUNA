<?php 
class Usuario{

    //ATRIBUTOS
    private $usuario;
    private $password;
    private $tipo;

    public function Usuario(){}

    public function setUsuario($user){
        $this->usuario = $user;
    }

    public function setPassword($pass){
        $this->password = $pass;
    }

    public function setTipo($tipo){
        $this->tipo=$tipo;
    }

    function getUsuario(){
		return $this->usuario;
	}
    
    function getPassword(){
		return $this->password;
    }
    function getTipo(){
        return $this->tipo;
    }



}










?>