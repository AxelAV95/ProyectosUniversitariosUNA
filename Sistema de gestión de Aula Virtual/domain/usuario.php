<?php 


class Usuario{

	private $usuarioid;
	private $usuarioidentidad;
	private $usuariopassword;
	private $usuarioestado;
	private $usuariotipo;
    

	public function __construct($usuarioid, $usuarioidentidad, $usuariopassword, $usuarioestado, $usuariotipo)
	{
		$this->usuarioid = $usuarioid;
		$this->usuarioidentidad = $usuarioidentidad;
		$this->usuariopassword = $usuariopassword;
		$this->usuarioestado = $usuarioestado;
		$this->usuariotipo = $usuariotipo;
	}



	
    /**
     * @return mixed
     */
    public function getUsuarioid()
    {
    	return $this->usuarioid;
    }

    /**
     * @param mixed $usuarioid
     *
     * @return self
     */
    public function setUsuarioid($usuarioid)
    {
    	$this->usuarioid = $usuarioid;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuarioidentidad()
    {
    	return $this->usuarioidentidad;
    }

    /**
     * @param mixed $usuarioidentidad
     *
     * @return self
     */
    public function setUsuarioidentidad($usuarioidentidad)
    {
    	$this->usuarioidentidad = $usuarioidentidad;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuariopassword()
    {
    	return $this->usuariopassword;
    }

    /**
     * @param mixed $usuariopassword
     *
     * @return self
     */
    public function setUsuariopassword($usuariopassword)
    {
    	$this->usuariopassword = $usuariopassword;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuarioestado()
    {
    	return $this->usuarioestado;
    }

    /**
     * @param mixed $usuarioestado
     *
     * @return self
     */
    public function setUsuarioestado($usuarioestado)
    {
    	$this->usuarioestado = $usuarioestado;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuariotipo()
    {
    	return $this->usuariotipo;
    }

    /**
     * @param mixed $usuariotipo
     *
     * @return self
     */
    public function setUsuariotipo($usuariotipo)
    {
    	$this->usuariotipo = $usuariotipo;

    	return $this;
    }
}




?>