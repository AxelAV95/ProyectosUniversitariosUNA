<?php 

	include '../data/rutadata.php';

	class RutaBusiness{

		private $rutaData;

		public function RutaBusiness() {
        	$this->rutaData = new RutaData();
    	}

    	 public function insertarRuta($ruta) {
        return $this->rutaData-> insertarRuta($ruta);
    	}

    public function actualizarRuta($ruta) {
        return $this->rutaData->actualizarRuta($ruta);
    }

    public function eliminarRuta($id) {
        return $this->rutaData->eliminarRuta($id);
    }

    public function obtenerRutas() {
        return $this->rutaData->obtenerRutas();
    }

	}






?>