<?php

class Manga {

    private $idmanga;
    private $nombre;
    private $tomo;
    private $anio;
    private $generos;

    function __construct($idmanga, $nombre,$tomo,$anio) {
        $this->idmanga = $idmanga;
        $this->nombre = $nombre;
        $this->tomo = $tomo;
        $this->anio = $anio;
       
    }

    function getIdManga() {
        return $this->idmanga ;
    }

    public function getGeneros(){
        return $this->generos;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    function getTomo() {
        return $this->tomo;
    }

    function getAnio() {
        return $this->anio;
    }

    function setIdManga($idmanga) {
        $this->idmanga = $idmanga;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTomo($tomo) {
        $this->tomo = $tomo;
    }

    function setAnio($anio) {
        $this->anio = $anio;
    }

    function setGeneros($generos) {
        $this->generos = $generos;
    }

}
