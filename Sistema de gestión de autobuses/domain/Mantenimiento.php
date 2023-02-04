<?php

class Mantenimiento {

    private $mantenimientoid;
    private $vehiculoid;
    private $empleadoid;
    private $fechaInicio;
    private $fechaFin;
    private $costoUnitario;
    private $detalleCostoUnitario;
    private $costoTotal;
    private $frenos;
    private $carroceria;
    private $motor;
    private $rotula;
	
	public function Mantenimiento(){
    }

    function getMantenimientoid() {
        return $this->mantenimientoid;
    }
    function getVehiculoid() {
        return $this->vehiculoid;
    }
    function getEmpleadoid() {
        return $this->empleadoid;
    }
    function getFechaInicio() {
        return $this->fechaInicio;
    }
    function getFechaFin() {
        return $this->fechaFin;
    }
    function getCostoUnitario() {
        return $this->costoUnitario;
    }
    function getDetalleCostoUnitario() {
        return $this->detalleCostoUnitario;
    }
    function getCostoTotal() {
        return $this->costoTotal;
    }
    function getFrenos() {
        return $this->frenos;
    }
    function getCarroceria() {
        return $this->carroceria;
    }
    function getMotor() {
        return $this->motor;
    }
    function getRotula() {
        return $this->rotula;
    }
//================================================================
    public function setMantenimientoid($mantenimientoid) {
        $this->mantenimientoid = $mantenimientoid;
    }
    public function setVehiculoid($vehiculoid) {
        $this->vehiculoid = $vehiculoid;
    }
    public function setEmpleadoid($empleadoid) {
        $this->empleadoid = $empleadoid;
    }
    public function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }
    public function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }
    public function setCostoUnitario($costoUnitario) {
        $this->costoUnitario = $costoUnitario;
    }
    public function setDetalleCostoUnitario($detalleCostoUnitario) {
        $this->detalleCostoUnitario = $detalleCostoUnitario;
    }
    public function setCostoTotal($costoTotal) {
        $this->costoTotal = $costoTotal;
    }
    public function setFrenos($frenos) {
        $this->frenos = $frenos;
    }
    public function setCarroceria($carroceria) {
        $this->carroceria = $carroceria;
    }
    public function setMotor($motor) {
        $this->motor = $motor;
    }
    public function setRotula($rotula) {
        $this->rotula = $rotula;
    }

}