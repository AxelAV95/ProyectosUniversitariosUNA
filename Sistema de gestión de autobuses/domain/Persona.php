<?php

class Persona {

    private $cedula;
	private $nombre;
	private $apellido1;
	private $apellido2;
	private $telefono;
	private $direccion;
	
	function Persona($cedula, $nombre, $apellido1, $apellido2, $telefono, $direccion) {
        $this->cedula = $cedula;
		$this->nombre = $nombre;
		$this->apellido1 = $apellido1;
		$this->apellido2 = $apellido2;
        $this->telefono = $telefono;
		$this->direccion = $direccion;
    }
	
	function getCedula() {
        return $this->cedula;
    }
	
	function getNombre() {
        return $this->nombre;
    }
	
	function getApellido1() {
        return $this->apellido1;
    }
	
	function getApellido2() {
        return $this->apellido2;
    }
	
	function getTelefono() {
        return $this->telefono;
    }
	
	function getDireccion() {
        return $this->direccion;
    }
	
	public function setCedula($cedula) {
        $this->cedula = $cedula;
    }
	
	public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
	
	public function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }
	
	public function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }
	
	public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
	
	public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
	
}