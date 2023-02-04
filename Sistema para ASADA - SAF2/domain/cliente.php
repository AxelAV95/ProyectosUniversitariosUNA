<?php 
require_once('persona.php'); 

class Cliente extends Persona{

	private $numeroMedidor;
	private $idcliente;
	private $casasEnlazadas;
	private $numPropiedades;
	private $tipoCliente;
	private $estado;


	public function Cliente(){}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function setNumeroMedidor($numeroMedidor){
		$this->numeroMedidor = $numeroMedidor;
	}

	function getNumeroMedidor(){
		return $this->numeroMedidor;
	}


	public function setIdcliente($id){
		$this->idcliente = $id;
	}

	function getEstado(){
		return $this->estado;
	}

	function getIdcliente(){
		return $this->idcliente;
	}

	public function setCasasEnlazadas($casas){
		$this->casasEnlazadas = $casas;
	}

	function getCasasEnlazadas(){
		return $this->casasEnlazadas;
	}

	public function setNumPropiedades($propi){
		$this->numPropiedades = $propi;
	}

	function getNumPropiedades(){
		return $this->numPropiedades;
	}

	public function setTipoCliente($tipo){
		$this->tipoCliente = $tipo;
	}

	function getTipoCliente(){
		return $this->tipoCliente;
	}


}




?>