<?php 

include '../data/carreradata.php';

class CarreraBusiness{
	private $carreraData;

	public function __construct(){
		$this->carreraData = new CarreraData();
	}



    public function getAllTBCarreras(){
        return $this->carreraData->getAllTBCarreras();
    }

    public function getTipoCarrera($id){
      
        return $this->carreraData->getTipocarrera($id);
    }

    

  
   



}


?>