<?php

require_once('Ruta.php'); 

class Vehiculo {

	private $idvehiculo;
    private $placa;
	private $marca;
	private $modelo;
	private $tipo;
	private $capacidad;
	private $estado;
	private $empleadoid;
	
	
	function Vehiculo() {

    }

    function getIdvehiculo() {
        return $this->idvehiculo;
    }
	
	function getPlaca() {
        return $this->placa;
    }
	
	function getMarca() {
        return $this->marca;
    }
	
	function getModelo() {
        return $this->modelo;
    }
	
	function getTipo(){
		return $this->tipo;
	}
	
	function getCapacidad() {
        return $this->capacidad;
    }
	
	function getEstado() {
        return $this->estado;
    }
	
	function getEmpleadoId(){
		return $this->empleadoid;
	}
	
	public function setIdvehiculo($idvehiculo) {
        $this->idvehiculo = $idvehiculo;
    }

	public function setPlaca($placa) {
        $this->placa = $placa;
    }
	
	
	public function setMarca($marca) {
        $this->marca = $marca;
    }
	
	public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
	
	public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
	
	public function setCapacidad($capacidad) {
        $this->capacidad = $capacidad;
    }
	
	public function setEstado($estado) {
        $this->estado = $estado;
    }
	
	function setEmpleadoId($empleadoid){
		$this->empleadoid = $empleadoid;
	}

}