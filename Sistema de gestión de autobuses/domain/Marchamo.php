<?php


class Marchamo {

	private $marchamoid;
	private $idvehiculo;
  private $monto;
	private $montoPartes;
	private $costoMultasInteres;
	private $fechaPago;
	private $montoneto;


	function Marchamo(){

	}

	public function setNeto($neto){
		$this->montoneto=$neto;
	}

	public function setMarchamoID($id){
		$this->marchamoid=$id;
	}

	function getMarchamoID(){
		return $this->marchamoid;
	}

    function getIdVehiculo() {
        return $this->idvehiculo;
    }

	function getMonto() {
        return $this->monto;
    }
    function getNeto(){
    	return $this->montoneto;
    }
	function getMontoPartes(){
		return $this->montoPartes;
	}

	function getcostoMultasInteres() {
        return $this->costoMultasInteres;
    }


	function getFechaPago(){
		return $this->fechaPago;
	}
	public function setIdVehiculo($idvehiculo) {
        $this->idvehiculo = $idvehiculo;
    }

	public function setMonto($monto) {
        $this->monto = $monto;
    }

	public function setMontoPartes($montopartes){
		$this->montoPartes=$montopartes;
	}

	public function setCostoMultasInteres($costoMultas) {
        $this->costoMultasInteres = $costoMultas;
    }

	public function setFechaPago($fechaPago) {
        $this->fechaPago = $fechaPago;
    }
}
