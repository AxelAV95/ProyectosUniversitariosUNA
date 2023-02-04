<?php

class Ruta {

    private $codigo;
    private $idruta;
	private $salida;
	private $destino;
    private $tarifaMi;
    private $tarifaMa;
    private $tiempoPromedio;
    private $bus;
	
	public function Ruta(){
    }
	
    function getCodigo() {
        return $this->codigo;
    }
    
    function getIdRuta() {
        return $this->idRuta;
    }
	
	function getSalida() {
        return $this->salida;
    }
	
	function getDestino() {
        return $this->destino;
    }
	
	function getTarifaMinima() {
        return $this->tarifaMi;
    }

    function getTarifaMaxima() {
        return $this->tarifaMa;
    }

    function getTiempoPromedio() {
        return $this->tiempoPromedio;
    }

    function getBus() {
        return $this->bus;
    }
	
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    
    public function setIdRuta($idRuta) {
        $this->idRuta = $idRuta;
    }
	
	public function setSalida($salida) {
        $this->salida = $salida;
    }
	
	public function setDestino($destino) {
        $this->destino = $destino;
    }
	
	public function setTarifaMinima($tarifaMi) {
        $this->tarifaMi = $tarifaMi;
    }

    public function setTarifaMaxima($tarifaMa) {
        $this->tarifaMa = $tarifaMa;
    }

    public function setTiempoPromedio($tiempoPromedio) {
        $this->tiempoPromedio = $tiempoPromedio;
    }

    public function setBus($bus) {
        $this->bus = $bus;
    }
	
}