<?php 

include '../data/becadata.php';

class BecaBusiness{
	private $becaData;

	public function __construct(){
		$this->becaData = new BecaData();
	}



    public function getAllTBBecas(){
        return $this->becaData->getAllTBBecas();
    }

    public function getTipoBeca($id){
      
        return $this->becaData->getTipobeca($id);
    }

    

  
   



}


?>