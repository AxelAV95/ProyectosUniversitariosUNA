<?php 

class Curso{
	
	private $cursoid;
	private $cursosigla;
	private $cursonombre;
	private $cursocupo;
	private $cursovigenciaid;
    private $cursocarreraid;
    private $cursoprofesorid;


    public function __construct($cursoid, $cursosigla, $cursonombre, $cursocupo, $cursovigenciaid, $cursocarreraid, $cursoprofesorid)
    {
        $this->cursoid = $cursoid;
        $this->cursosigla = $cursosigla;
        $this->cursonombre = $cursonombre;
        $this->cursocupo = $cursocupo;
        $this->cursovigenciaid = $cursovigenciaid;
        $this->cursocarreraid = $cursocarreraid;
        $this->cursoprofesorid = $cursoprofesorid;
    }

	


	
    /**
     * @return mixed
     */
    public function getCursoid()
    {
    	return $this->cursoid;
    }

    /**
     * @param mixed $cursoid
     *
     * @return self
     */
    public function setCursoid($cursoid)
    {
    	$this->cursoid = $cursoid;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getCursosigla()
    {
    	return $this->cursosigla;
    }

    /**
     * @param mixed $cursosigla
     *
     * @return self
     */
    public function setCursosigla($cursosigla)
    {
    	$this->cursosigla = $cursosigla;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getCursonombre()
    {
    	return $this->cursonombre;
    }

    /**
     * @param mixed $cursonombre
     *
     * @return self
     */
    public function setCursonombre($cursonombre)
    {
    	$this->cursonombre = $cursonombre;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getCursocupo()
    {
    	return $this->cursocupo;
    }

    /**
     * @param mixed $cursocupo
     *
     * @return self
     */
    public function setCursocupo($cursocupo)
    {
    	$this->cursocupo = $cursocupo;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getCursovigenciaid()
    {
    	return $this->cursovigenciaid;
    }

    /**
     * @param mixed $cursovigenciaid
     *
     * @return self
     */
    public function setCursovigenciaid($cursovigenciaid)
    {
    	$this->cursovigenciaid = $cursovigenciaid;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getCursocarreraid()
    {
        return $this->cursocarreraid;
    }

    /**
     * @param mixed $cursocarreraid
     *
     * @return self
     */
    public function setCursocarreraid($cursocarreraid)
    {
        $this->cursocarreraid = $cursocarreraid;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCursoprofesorid()
    {
        return $this->cursoprofesorid;
    }

    /**
     * @param mixed $cursoprofesorid
     *
     * @return self
     */
    public function setCursoprofesorid($cursoprofesorid)
    {
        $this->cursoprofesorid = $cursoprofesorid;

        return $this;
    }
}


?>