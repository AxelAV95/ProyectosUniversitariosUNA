<?php

class Genero {

    private $id;
    private $nombre;
   

    function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre; 
    }

    function getIdGenero() {
        return $this->id ;
    }

    public function getNombre() {
        return $this->nombre;
    }

    function setIdGenero($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
