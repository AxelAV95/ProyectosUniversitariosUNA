<?php

class RutaHorario {

    private $horarioid;
    private $rutaid;
    private $tipodia;
    private $hora;
	private $bus;
	private $idavuelta;
	
	function RutaHorario(){
    }

    function getHorarioid() {
        return $this->horarioid;
    }

    function getRutaid() {
        return $this->rutaid;
    }

    function getTipodia() {
        return $this->tipodia;
    }

    function getHora() {
        return $this->hora;
    }
	
	function getBus() {
        return $this->bus;
    }
	function getIdavuelta(){
		return $this->idavuelta;
	}

    public function setHorarioid($horarioid) {
        $this->horarioid = $horarioid;
    }

    public function setRutaid($rutaid) {
        $this->rutaid = $rutaid;
    }
    
    public function setTipodia($tipodia) {
        $this->tipodia = $tipodia;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }
	
	public function setBus($bus) {
        $this->bus = $bus;
    }
	
	public function setIdavuelta($idavuelta){
		$this->idavuelta = $idavuelta;
	}

}