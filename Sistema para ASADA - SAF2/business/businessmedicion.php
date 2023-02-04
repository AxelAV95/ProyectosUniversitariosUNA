<?php 

	include '../data/mediciondata.php';
    

	class BusinessMedicion{

		private $medicionData;

         


		public function BusinessMedicion() {
        	$this->medicionData = new MedicionData();
    	}

    	 public function insertarMedicion($medicion) {
        return $this->medicionData-> insertar($medicion);
    	}

    	public function seleccionarConsumo(){
    		return $this->medicionData->seleccionarConsumo();
    	}

    	public function getLecturaActual($param1,$param2){
    		return $this->medicionData->getLecturaActual($param1,$param2);
    	}

    	public function getLecturaAnterior($param1,$param2){
    		return $this->medicionData->getLecturaAnterior($param1,$param2);
    	}

    	public function getInfoCliente($param1, $param2){
    		return $this->medicionData->getInfoCliente($param1,$param2);
    	}

    	public function insertarMedicionGeneral($medicion){
    		return $this->medicionData-> insertarMedicionGeneral($medicion);
    	}

    	public function actualizarMedicionGeneral($medicion){
    		return $this->medicionData-> actualizarMedicionGeneral($medicion);
    	}

    	public function eliminarMedicionGeneral($medicion){
    		return $this->medicionData->eliminarMedicionGeneral($medicion);
    	}

    
	}

?>