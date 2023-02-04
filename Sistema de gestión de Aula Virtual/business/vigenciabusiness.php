<?php 

include '../data/vigenciadata.php';

class VigenciaBusiness{
	private $vigenciaData;

	public function __construct(){
		$this->vigenciaData = new VigenciaData();
	}



    public function getAllTBVigencias(){
        return $this->vigenciaData->getAllTBVigencias();
    }

    public function getTipoVigencia($id){
      
        return $this->vigenciaData->getTipovigencia($id);
    }

    

  
   



}


?>