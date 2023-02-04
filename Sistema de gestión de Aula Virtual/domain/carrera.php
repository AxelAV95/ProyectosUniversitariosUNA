<?php 


class Carrera{
	
	private $carreraid;
	private $carreranombre;
	



	public function __construct($carreraid, $carreranombre)
	{
		$this->carreraid = $carreraid;
		$this->carreranombre = $carreranombre;
	
	}

	

    public function getCarreraid()
    {
    	return $this->carreraid;
    }

    
    public function setCarreraid($carreraid)
    {
    	$this->carreraid = $carreraid;

    	return $this;
    }

   
    public function getCarreranombre()
    {
    	return $this->carreranombre;
    }

 
    public function setCarreranombre($carreranombre)
    {
    	$this->carreranombre = $carreranombre;

    	return $this;
    }

   

  
}



?>