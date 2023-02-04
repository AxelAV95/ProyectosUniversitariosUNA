<?php 

class Consumo extends Medicion{

	
	private $consumoMetrosCubicos;
	private $consumoid;


	function Consumo(){

	}

	public function setConsumoID($id){

		$this->consumoid =$id;
	}

	public function getConsumoID(){
		return $this ->consumoid;
	}

	


}



?>