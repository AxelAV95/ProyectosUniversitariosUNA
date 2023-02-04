<?php
class Prevista{
    private $idprevista;
    private $idcliente;
    private $saldoanterior;
    private $abonoactual;
    private $saldoactual;

    public function Prevista(){ }

    public function setIdPrevista($id){
        $this->idprevista = $id;
    }
    public function setIdCliente($idc){
        $this->idcliente = $idc;
    }
    public function setSaldoAnterior($saldoant){
        $this->saldoanterior = $saldoant;
    }
    public function setAbonoActual($abono){
        $this->abonoactual = $abono;
    }
    public function setSaldoActual($saldoact){
        $this->saldoactual = $saldoact;
    } 

    public function getIdPrevista(){
        return $this->idprevista;
    }
    public function getIdCliente(){
        return $this->idcliente;
    }
    public function getSaldoAnterior(){
        return $this->saldoanterior;
    }
    public function getAbonoActual(){
        return $this->abonoactual;
    }
    public function getSaldoActual(){
        return $this->saldoactual;
    }
}
?>