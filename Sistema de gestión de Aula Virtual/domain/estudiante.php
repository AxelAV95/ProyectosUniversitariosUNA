<?php 


class Estudiante{
	
	private $estudianteid;
	private $estudiantenombre;
	private $estudiantecedula;
	private $estudianteedad;
	private $estudiantedireccion;
	private $estudianteusuarioid;
	private $estudiantecarreraid;
	private $estudiantebecaid;



	public function __construct($estudianteid, $estudiantenombre, $estudiantecedula, $estudianteedad, $estudiantedireccion, $estudianteusuarioid, $estudiantecarreraid, $estudiantebecaid)
	{
		$this->estudianteid = $estudianteid;
		$this->estudiantenombre = $estudiantenombre;
		$this->estudiantecedula = $estudiantecedula;
		$this->estudianteedad = $estudianteedad;
		$this->estudiantedireccion = $estudiantedireccion;
		$this->estudianteusuarioid = $estudianteusuarioid;
		$this->estudiantecarreraid = $estudiantecarreraid;
		$this->estudiantebecaid = $estudiantebecaid;
	}

	


	
    /**
     * @return mixed
     */
    public function getEstudianteid()
    {
    	return $this->estudianteid;
    }

    /**
     * @param mixed $estudianteid
     *
     * @return self
     */
    public function setEstudianteid($estudianteid)
    {
    	$this->estudianteid = $estudianteid;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getEstudiantenombre()
    {
    	return $this->estudiantenombre;
    }

    /**
     * @param mixed $estudiantenombre
     *
     * @return self
     */
    public function setEstudiantenombre($estudiantenombre)
    {
    	$this->estudiantenombre = $estudiantenombre;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getEstudiantecedula()
    {
    	return $this->estudiantecedula;
    }

    /**
     * @param mixed $estudiantecedula
     *
     * @return self
     */
    public function setEstudiantecedula($estudiantecedula)
    {
    	$this->estudiantecedula = $estudiantecedula;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getEstudianteedad()
    {
    	return $this->estudianteedad;
    }

    /**
     * @param mixed $estudianteedad
     *
     * @return self
     */
    public function setEstudianteedad($estudianteedad)
    {
    	$this->estudianteedad = $estudianteedad;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getEstudiantedireccion()
    {
    	return $this->estudiantedireccion;
    }

    /**
     * @param mixed $estudiantedireccion
     *
     * @return self
     */
    public function setEstudiantedireccion($estudiantedireccion)
    {
    	$this->estudiantedireccion = $estudiantedireccion;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getEstudianteusuarioid()
    {
    	return $this->estudianteusuarioid;
    }

    /**
     * @param mixed $estudianteusuarioid
     *
     * @return self
     */
    public function setEstudianteusuarioid($estudianteusuarioid)
    {
    	$this->estudianteusuarioid = $estudianteusuarioid;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getEstudiantecarreraid()
    {
    	return $this->estudiantecarreraid;
    }

    /**
     * @param mixed $estudiantecarreraid
     *
     * @return self
     */
    public function setEstudiantecarreraid($estudiantecarreraid)
    {
    	$this->estudiantecarreraid = $estudiantecarreraid;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getEstudiantebecaid()
    {
    	return $this->estudiantebecaid;
    }

    /**
     * @param mixed $estudiantebecaid
     *
     * @return self
     */
    public function setEstudiantebecaid($estudiantebecaid)
    {
    	$this->estudiantebecaid = $estudiantebecaid;

    	return $this;
    }
}



?>