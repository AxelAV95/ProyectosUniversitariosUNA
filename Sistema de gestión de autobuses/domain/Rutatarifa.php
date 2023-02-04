<?php

class RutaTarifa {

    private $tarifaid;
    private $rutaid;
    private $idaVuelta;
    private $lugar;
    private $montoCobrar;
	
	public function RutaTarifa(){
    }

    function getTarifaid() {
        return $this->tarifaid;
    }

    function getRutaid() {
        return $this->rutaid;
    }

    function getIdaVuelta() {
        return $this->idaVuelta;
    }

    function getLugar() {
        return $this->lugar;
    }

    function getMontoCobrar() {
        return $this->montoCobrar;
    }

    public function setTarifaid($tarifaid) {
        $this->tarifaid = $tarifaid;
    }

    public function setRutaid($rutaid) {
        $this->rutaid = $rutaid;
    }
    
    public function setIdaVuelta($idaVuelta) {
        $this->idaVuelta = $idaVuelta;
    }

    public function setLugar($lugar) {
        $this->lugar = $lugar;
    }

    public function setMontoCobrar($montoCobrar) {
        $this->montoCobrar = $montoCobrar;
    }

}