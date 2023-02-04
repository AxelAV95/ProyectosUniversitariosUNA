<?php 

class Rubrica{

	private $rubricaid;
	private $cursoid;
	private $examen1;
	private $examen2;
	private $examen3;
	private $tarea1;
	private $tarea2;
	private $prueba1;
	private $prueba2;


	
	public function __construct($rubricaid, $cursoid, $examen1, $examen2, $examen3, $tarea1, $tarea2, $prueba1, $prueba2)
	{
		$this->rubricaid = $rubricaid;
		$this->cursoid = $cursoid;
		$this->examen1 = $examen1;
		$this->examen2 = $examen2;
		$this->examen3 = $examen3;
		$this->tarea1 = $tarea1;
		$this->tarea2 = $tarea2;
		$this->prueba1 = $prueba1;
		$this->prueba2 = $prueba2;
	}

	
	


    /**
     * @return mixed
     */
    public function getRubricaid()
    {
        return $this->rubricaid;
    }

    /**
     * @param mixed $rubricaid
     *
     * @return self
     */
    public function setRubricaid($rubricaid)
    {
        $this->rubricaid = $rubricaid;

        return $this;
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
    public function getExamen1()
    {
        return $this->examen1;
    }

    /**
     * @param mixed $examen1
     *
     * @return self
     */
    public function setExamen1($examen1)
    {
        $this->examen1 = $examen1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExamen2()
    {
        return $this->examen2;
    }

    /**
     * @param mixed $examen2
     *
     * @return self
     */
    public function setExamen2($examen2)
    {
        $this->examen2 = $examen2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExamen3()
    {
        return $this->examen3;
    }

    /**
     * @param mixed $examen3
     *
     * @return self
     */
    public function setExamen3($examen3)
    {
        $this->examen3 = $examen3;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTarea1()
    {
        return $this->tarea1;
    }

    /**
     * @param mixed $tarea1
     *
     * @return self
     */
    public function setTarea1($tarea1)
    {
        $this->tarea1 = $tarea1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTarea2()
    {
        return $this->tarea2;
    }

    /**
     * @param mixed $tarea2
     *
     * @return self
     */
    public function setTarea2($tarea2)
    {
        $this->tarea2 = $tarea2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrueba1()
    {
        return $this->prueba1;
    }

    /**
     * @param mixed $prueba1
     *
     * @return self
     */
    public function setPrueba1($prueba1)
    {
        $this->prueba1 = $prueba1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrueba2()
    {
        return $this->prueba2;
    }

    /**
     * @param mixed $prueba2
     *
     * @return self
     */
    public function setPrueba2($prueba2)
    {
        $this->prueba2 = $prueba2;

        return $this;
    }
}

 ?>