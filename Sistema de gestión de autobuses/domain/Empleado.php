<?php 

require_once('Persona.php'); 
class Empleado extends Persona{

	private $cuentaB;
	private $numeroL;
	private $tipoL;
	private $idEmp;
	private $tipoEmp;
	private $fechaV;

	public function Empleado(){
        // allocate your stuff
    }
	
	function setFechaVencimiento($date){
		$this->fechaV = $date;
	}


	function getFechaVencimiento(){
		return $this -> fechaV;
	}
	/*function Empleado($cuentaB){
		$this -> $cuentaBancaria = $cuentaB;
	}*/

	function setTipoEmpleado($tipEmp){
		$this -> tipoEmp = $tipEmp;
	}

	function getTipoEmpleado(){
		return $this -> tipoEmp;
	}
	function setIdEmpleado($id){
		$this -> idEmp = $id;
	}

	function getIdEmpleado(){
		return $this -> idEmp;
	}
	function setCuentaBancaria($cuentaBanc){
		$this -> cuentaB = $cuentaBanc;
	}

	function setNumLicencia($numLic){
		$this -> numeroL = $numLic;
	}

	function setTipoLicencia($tipoLic){
		$this -> tipoL= $tipoLic;
	}

	function getNumLicencia(){
		return $this -> numeroL;
	}

	function getTipoLicencia(){
		return $this -> tipoL;
	}

	function getCuentaBancaria(){
		return $this -> cuentaB;
	}
}



?>