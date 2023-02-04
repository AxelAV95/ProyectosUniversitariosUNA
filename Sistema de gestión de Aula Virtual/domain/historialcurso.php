<?php 


class HistorialCurso{

	private $historialid;
	private $historialcursoid;
	private $historialfecha;
	private $historialestado;
	private $historialciclo;


	public function __construct($historialid, $historialcursoid, $historialfecha, $historialestado, $historialciclo)
	{
		$this->historialid = $historialid;
		$this->historialcursoid = $historialcursoid;
		$this->historialfecha = $historialfecha;
		$this->historialestado = $historialestado;
		$this->historialciclo = $historialciclo;
	}



	

    public function getHistorialid()
    {
    	return $this->historialid;
    }


    public function setHistorialid($historialid)
    {
    	$this->historialid = $historialid;

    	return $this;
    }

   
    public function getHistorialcursoid()
    {
    	return $this->historialcursoid;
    }

/
    public function setHistorialcursoid($historialcursoid)
    {
    	$this->historialcursoid = $historialcursoid;

    	return $this;
    }


    public function getHistorialfecha()
    {
    	return $this->historialfecha;
    }

 
    public function setHistorialfecha($historialfecha)
    {
    	$this->historialfecha = $historialfecha;

    	return $this;
    }

   
    public function getHistorialestado()
    {
    	return $this->historialestado;
    }

 
    public function setHistorialestado($historialestado)
    {
    	$this->historialestado = $historialestado;

    	return $this;
    }


    public function getHistorialciclo()
    {
    	return $this->historialciclo;
    }

  
    public function setHistorialcicloo($historialciclo)
    {
    	$this->historialciclo = $historialciclo;

    	return $this;
    }
}




?>