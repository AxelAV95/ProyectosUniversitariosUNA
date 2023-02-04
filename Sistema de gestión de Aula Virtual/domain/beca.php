<?php 


class Beca{
	
	private $becaid;
	private $becatipo;
	



	public function __construct($becaid, $becatipo)
	{
		$this->becaid = $becaid;
		$this->becatipo = $becatipo;
	
	}

	

    public function getBecaid()
    {
    	return $this->becaid;
    }

    
    public function setBecaid($becaid)
    {
    	$this->becaid = $becaid;

    	return $this;
    }

   
    public function getBecatipo()
    {
    	return $this->becatipo;
    }

 
    public function setBecatipo($becatipo)
    {
    	$this->becatipo = $becatipo;

    	return $this;
    }

   

  
}



?>