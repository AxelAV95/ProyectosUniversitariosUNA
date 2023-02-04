<?php 

class Persona{

	//atributos
	private $nombre;
	private $apellido1;
	private $apellido2;
	private $cedula;
	private $direccion;
	private $correo;
	private $telefono;

	//constructor
	function Persona(){

	}

	//SET
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }
	
	public function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }

	public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

	public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    //GET


	
	function getNombre() {
        return $this->nombre;
    }
	
	function getApellido1() {
        return $this->apellido1;
    }
	
	function getApellido2() {
        return $this->apellido2;
    }

    function getCedula() {
        return $this->cedula;
    }
	
	
    function getCorreo() {
        return $this->correo;
    }


	function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }
	






}




?>