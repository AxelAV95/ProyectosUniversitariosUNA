<?php
 

class RTV {

	private $rtvid;
	private $rtvempleadoid;
	private $rtvvehiculoid;
	private $rtvfechavencimiento;
	private $rtvmontobase;
	private $rtvmontoacumulado;
	private $rtvestado;

	private $idbus;
    private $fecharenovacion;
	private $repitencia;
	private $estadoRTV;
	
	public function RTV(){

	}

	public function setRTVID($rtvid) {
        $this->rtvid = $rtvid;
    }

    public function setEmpleadoID($id) {
        $this->rtvempleadoid = $id;
    }

    public function setVehiculoID($id) {
        $this->rtvvehiculoid = $id;
    }

    public function setFechaVencimiento($fecha) {
        $this->rtvfechavencimiento = $fecha;
    }

    public function setMontoBase($monto) {
        $this->rtvmontobase = $monto;
    }
    public function setMontoAcumulado($monto2) {
        $this->rtvmontoacumulado = $monto2;
    }
    public function setEstado($estado) {
        $this->rtvestado = $estado;
    }
    //-----------------------------------------------//

    function getRTVID() {
        return $this->rtvid;
    }

    function getEmpleadoID() {
        return $this->rtvempleadoid;
    }

    function getVehiculoID() {
        return $this->rtvvehiculoid;
    }
    function getFechaVencimiento() {
        return $this->rtvfechavencimiento;
    }
    function getMontoBase() {
        return $this->rtvmontobase;
    }
    function getMontoAcumulado() {
        return $this->rtvmontoacumulado;
    }
    function getEstado() {
        return $this->rtvestado;
    }



	/*function RTV($idbus,$fecharenovacion, $repitencia,$estadoRTV) {
        $this->idbus = $idbus;
        $this->fecharenovacion = $fecharenovacion;
        $this->repitencia = $repitencia;
        $this->estadoRTV = $estadoRTV;
    }*/
/*
    function getIdbus() {
        return $this->idbus;
    }
	
	function getFecharenovacion() {
        return $this->fecharenovacion;
    }
	
	function getRepitencia(){
		return $this->repitencia;
	}
	
	function getEstadoRTV() {
        return $this->estadoRTV;
    }
	
	
	public function setIdbus($idbus) {
        $this->idbus = $idbus;
    }

	public function setFecharenovacion($fecharenovacion) {
        $this->fecharenovacion = $fecharenovacion;
    }
	
	public function setRepitencia($repitencia) {
        $this->repitencia = $repitencia;
    }
	
	
	public function setEstadoRTV($estadoRTV) {
        $this->estadoRTV = $estadoRTV;
    }
	*/
	
}