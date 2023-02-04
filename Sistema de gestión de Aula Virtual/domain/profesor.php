<?php 


class Profesor{
	
	private $profesorid;
	private $profesornombre;
	private $profesorcedula;
	private $profesoredad;
	private $profesorsexo;
	private $profesorexperiencia;
	private $profesorgrado;
	private $profesorusuarioid;



	public function __construct($profesorid, $profesornombre, $profesorcedula, $profesoredad, $profesorsexo, $profesorexperiencia, $profesorgrado, $profesorusuarioid)
	{
		$this->profesorid = $profesorid;
		$this->profesornombre = $profesornombre;
		$this->profesorcedula = $profesorcedula;
		$this->profesoredad = $profesoredad;
		$this->profesorsexo = $profesorsexo;
		$this->profesorexperiencia = $profesorexperiencia;
		$this->profesorgrado = $profesorgrado;
		$this->profesorusuarioid = $profesorusuarioid;
	}





    /**
     * @return mixed
     */
    public function getProfesorid()
    {
        return $this->profesorid;
    }

    /**
     * @param mixed $profesorid
     *
     * @return self
     */
    public function setProfesorid($profesorid)
    {
        $this->profesorid = $profesorid;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfesornombre()
    {
        return $this->profesornombre;
    }

    /**
     * @param mixed $profesornombre
     *
     * @return self
     */
    public function setProfesornombre($profesornombre)
    {
        $this->profesornombre = $profesornombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfesorcedula()
    {
        return $this->profesorcedula;
    }

    /**
     * @param mixed $profesorcedula
     *
     * @return self
     */
    public function setProfesorcedula($profesorcedula)
    {
        $this->profesorcedula = $profesorcedula;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfesoredad()
    {
        return $this->profesoredad;
    }

    /**
     * @param mixed $profesoredad
     *
     * @return self
     */
    public function setProfesoredad($profesoredad)
    {
        $this->profesoredad = $profesoredad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfesorsexo()
    {
        return $this->profesorsexo;
    }

    /**
     * @param mixed $profesorsexo
     *
     * @return self
     */
    public function setProfesorsexo($profesorsexo)
    {
        $this->profesorsexo = $profesorsexo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfesorexperiencia()
    {
        return $this->profesorexperiencia;
    }

    /**
     * @param mixed $profesorexperiencia
     *
     * @return self
     */
    public function setProfesorexperiencia($profesorexperiencia)
    {
        $this->profesorexperiencia = $profesorexperiencia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfesorgrado()
    {
        return $this->profesorgrado;
    }

    /**
     * @param mixed $profesorgrado
     *
     * @return self
     */
    public function setProfesorgrado($profesorgrado)
    {
        $this->profesorgrado = $profesorgrado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfesorusuarioid()
    {
        return $this->profesorusuarioid;
    }

    /**
     * @param mixed $profesorusuarioid
     *
     * @return self
     */
    public function setProfesorusuarioid($profesorusuarioid)
    {
        $this->profesorusuarioid = $profesorusuarioid;

        return $this;
    }
}


 ?>