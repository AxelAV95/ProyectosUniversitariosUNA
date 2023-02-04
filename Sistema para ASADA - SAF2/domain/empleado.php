<?php 
require_once('persona.php'); 

class Empleado extends Persona{
	private $id;
	
	 function Empleado(){

	}
	public function setId($id){
		$this->id = $id;
	}

	function getId(){
		return $this->id;
	}



}




?>