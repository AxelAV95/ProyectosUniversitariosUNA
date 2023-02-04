<?php 

class TipoUsuario{

	private $tipoid;
	private $tipodescripcion;


	
	public function __construct($tipoid, $tipodescripcion)
	{
		$this->tipoid = $tipoid;
		$this->tipodescripcion = $tipodescripcion;
	}


	
    /**
     * @return mixed
     */
    public function getTipoid()
    {
    	return $this->tipoid;
    }

    /**
     * @param mixed $tipoid
     *
     * @return self
     */
    public function setTipoid($tipoid)
    {
    	$this->tipoid = $tipoid;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getTipodescripcion()
    {
    	return $this->tipodescripcion;
    }

    /**
     * @param mixed $tipodescripcion
     *
     * @return self
     */
    public function setTipodescripcion($tipodescripcion)
    {
    	$this->tipodescripcion = $tipodescripcion;

    	return $this;
    }
}


?>