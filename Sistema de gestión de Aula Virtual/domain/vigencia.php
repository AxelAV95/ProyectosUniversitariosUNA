<?php 


class Vigencia{
	
	private $vigenciaid;
	private $vigenciadescripcion;
	



	public function __construct($vigenciaid, $vigenciadescripcion)
	{
		$this->vigenciaid = $vigenciaid;
		$this->vigenciadescripcion = $vigenciadescripcion;
	
	}

	

    public function getVigenciaid()
    {
    	return $this->vigenciaid;
    }

    
    public function setVigenciaid($vigenciaid)
    {
    	$this->vigenciaid = $vigenciaid;

    	return $this;
    }

   
    public function getVigenciadescripcion()
    {
    	return $this->vigenciadescripcion;
    }

 
    public function setVigenciadescripcion($vigenciadescripcion)
    {
    	$this->vigenciadescripcion = $vigenciadescripcion;

    	return $this;
    }

   

  
}



?>