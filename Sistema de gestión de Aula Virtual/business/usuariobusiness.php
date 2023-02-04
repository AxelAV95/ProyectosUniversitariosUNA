<?php 

include '../data/usuariodata.php';

class UsuarioBusiness{
	private $usuarioData;

	public function __construct(){
		$this->usuarioData = new UsuarioData();
	}

	public function actualizarEstadoUsuario($usuario, $password){
		return $this->usuarioData->actualizarEstadoUsuario($usuario, $password);
	}
	public function getAllTBusuarios(){
		return $this->usuarioData->getAllTBusuarios();
	}

	public function getDatosUsuario($usuario, $password){
		return $this->usuarioData->getDatosUsuario($usuario, $password);
	}

	/*-------------------------------------------*/
	public function insertarUsuario($usuario){
      
        return $this->usuarioData->insertarUsuario($usuario);
    }

     public function modificarUsuario($usuario){
        return $this->usuarioData->modificarUsuario($usuario);
    }
    public function getTotalUsuario(){
    	return $this->usuarioData->getTotalUsuario();
    }

    public function getAllTBHistorialUsuario(){
         return $this->usuarioData->getAllTBHistorialUsuario();
    }

    public function eliminarUsuario($id){
        return $this->usuarioData->eliminarUsuario($id);
    }

    public function getUltimoIdInsertado(){
        return $this->usuarioData->getUltimoIdInsertado();
    }


}


?>