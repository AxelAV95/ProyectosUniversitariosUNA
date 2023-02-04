<?php 


class Cobro{

   private $cobrorecargo;
   private $cobromedidor;
   private $cobroclienteid;
   private $cobrofecha;
   private $cobroconceptomes;
   private $cobroaniocorrespondiente;
   private $cobrolecturaactual;
   private $cobrolecturaanterior;
   private $cobrometroscubicos;
   private $cobrotarifa;
   private $cobrometroscuadrados;
   private $cobrohidrante;
   private $cobrototalapagar;
   private $cobroestado;

   public function Cobro(){

   }

   public function setAnioCorrespondiente($anio){
       $this->cobroaniocorrespondiente=$anio;
   }

   public function getAnio(){
       return $this->cobroaniocorrespondiente;
   }

   public function setRecargo($recargo){
        $this->cobrorecargo = $recargo;
    }

    function getRecargo(){
		return $this->cobrorecargo;
    }

    public function setMedidor($medidor){
        $this->cobromedidor = $medidor;
    }

    function getMedidor(){
		return $this->cobromedidor;
    }

    public function setClienteID($clienteid){
        $this->cobroclienteid = $clienteid;
    }

    function getClienteID(){
        return $this->cobroclienteid;
    }

    public function setFecha($fecha){
        $this->cobrofecha=$fecha;
    }
    
    function getFecha(){
        return $this->cobrofecha;
    }

    public function setConceptoMes($conceptomes){
        $this->cobroconceptomes = $conceptomes;
    }

    function getConceptoMes(){
        return $this->cobroconceptomes;
    }

    public function setLecturaActual($lecturaactual){
        $this->cobrolecturaactual = $lecturaactual;
    }

    function getLecturaActual(){
        return $this->cobrolecturaactual;
    }

    public function setLecturaAnterior($lecturaanterior){
        $this->cobrolecturaanterior = $lecturaanterior;
    }

    function getLecturaAnterior(){
        return $this->cobrolecturaanterior;
    }

    public function setMetrosCubicos($metroscubicos){
        $this->cobrometroscubicos = $metroscubicos;
    }

    function getMetrosCubicos(){
        return $this->cobrometroscubicos;
    }

    public function setTarifa($tarifa){
        $this->cobrotarifa = $tarifa;
    }

    function getTarifa(){
        return $this->cobrotarifa;
    }

    public function setMetrosCuadrados($metroscuadrados){
        $this->cobrometroscuadrados = $metroscuadrados;
    }

    function getMetrosCuadrados(){
        return $this->cobrometroscuadrados;
    }

    public function setHidrante($hidrante){
        $this->cobrohidrante = $hidrante;
    }

    function getHidrante(){
        return $this->cobrohidrante;
    }

    public function setTotal($total){
        $this->cobrototalapagar = $total;
    }

    function getTotal(){
        return $this->cobrototalapagar;
    }

   
    
    public function setEstado($estado){
        $this->cobroestado=$estado;
    }

    function getEstado(){
        return $this->cobroestado;
    }


}









?>