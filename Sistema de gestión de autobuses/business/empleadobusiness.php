<?php 

	include '../data/empleadodata.php';

	class EmpleadoBusiness{

		private $empleadoData;

		public function EmpleadoBusiness() {
        	$this->empleadoData = new EmpleadoData();
    	}

    	 public function insertarEmpleado($empleado) {
        return $this->empleadoData-> insertarEmpleado($empleado);
    	}

    public function actualizarEmpleado($empleado) {
        return $this->empleadoData->actualizarEmpleado($empleado);
    }

    public function eliminarEmpleado($id) {
        return $this->empleadoData->eliminarEmpleado($id);
    }

    public function obtenerEmpleados() {
        return $this->empleadoData->obtenerEmpleados();
    }

    public function actualizarLicencias($val1, $val2, $val3){
            return $this->empleadoData->actualizarLicencias($val1,$val2,$val3);

	}
}

?>