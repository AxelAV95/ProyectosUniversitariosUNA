<?php 

	include '../data/tipoempleadodata.php';

	class tipoEmpleadoBusiness{

		private $tipoempleadoData;

		public function tipoEmpleadoBusiness() {
        	$this->tipoempleadoData = new tipoEmpleadoData();
    	}

    	 public function insertar($tipo) {
        return $this->tipoempleadoData-> insertarTipoEmpleado($tipo);
    	}

    public function actualizar($tipo,$id) {
        return $this->tipoempleadoData->actualizarTipoEmpleado($tipo,$id);
    }

    public function eliminar($id) {
        return $this->tipoempleadoData->eliminarTipoEmpleado($id);
    }

    public function obtener() {
        return $this->tipoempleadoData->obtenerTipoEmpleado();
    }

	}

?>