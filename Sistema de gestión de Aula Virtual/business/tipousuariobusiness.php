<?php 

include '../data/tipousuariodata.php';

class TipoUsuarioBusiness{
	private $tipousuarioData;

	public function __construct(){
		$this->tipousuarioData = new TipoUsuarioData();
	}


	public function insertarTipoUsuario($tipousuario){
      
        return $this->tipousuarioData->insertarTipoUsuario($tipousuario);
    }

     public function modificarTipoUsuario($tipousuario){
        return $this->tipousuarioData->modificarTipoUsuario($tipousuario);
    }
    public function getTotalTipoUsuario(){
    	return $this->tipousuarioData->getTotalTipoUsuarios();
    }

    public function getAllTBTipoUsuarios(){
        return $this->tipousuarioData->getAllTBTipoUsuarios();
    }

    public function getAllTBHistorialTipoUsuario(){
         return $this->tipousuarioData->getAllTBHistorialTipoUsuario();
    }

    public function eliminarTipoUsuario($id){
        return $this->tipousuarioData->eliminarTipoUsuario($id);
    }

    public function getUltimoIdInsertado(){
        return $this->tipousuarioData->getUltimoIdInsertado();
    }



}


?>