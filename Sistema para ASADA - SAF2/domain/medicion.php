<?php 

class Medicion{

	private $cliente;
	private $fecha;
	private $lecturaActual;
	private $lecturaAnterior;
	private $consumoMetrosCubicos;
	private $medicionid;
	private $mes;
	private $anio;
	private $medidorid;

	

	public function Medicion(){

	}

	public function getMedidorID(){
		return $this->medidorid;
	}

	public function setMedidorID($id){
		$this->medidorid=$id;
	}

	public function setAnio($year){
		$this->anio=$year;
	}


	public function setMes($month){
		$this->mes=$month;
	}

	public function setMedicionID($id){
		$this->medicionid=$id;
	}

	public function setCliente($client){
		$this->cliente=$client;
	}

	public function setFecha($date){
		$this->fecha=$date;

	}

	public function setLecturaActual($actual){
		$this->lecturaActual = $actual;
	}

	public function setLecturaAnterior($anterior){
		$this->lecturaAnterior= $anterior;
	}

	public function setConsumoMetrosCubicos($cubicMeters){
		$this->consumoMetrosCubicos = $cubicMeters;
	}

	function getAnio(){
		return $this->anio;

	}

	function getMes(){
		return $this->mes;

	}


	function getMedicionID(){
		return $this->medicionid;

	}

	function getCliente(){
		return $this->cliente;

	}

	function getFecha(){
		return $this->fecha;
	}

	function getLecturaActual(){
		return $this->lecturaActual;
	}

	function getLecturaAnterior(){
		return $this->lecturaAnterior;
	}

	function getConsumoMetrosCubicos(){
		return $this->consumoMetrosCubicos;
	}


}



?>