<?php

include '../data/generodata.php';

class GeneroBusiness {

    private $generoData;

    public function GeneroBusiness() {
        $this->generoData = new GeneroData();
    }

    public function getTBGenerosManga($id){
        return $this->generoData->getTBGenerosManga($id);
    }

    public function getAllTBGeneros() {
        return $this->generoData->getAllTBGeneros();
    }
    
}

// $b = new MangaBusiness();
// $m = new Manga(2,"Odsad",222231,22);

// echo  $queryUpdate = "UPDATE tbtomo SET tomonombre='" . $m->getNombre() .
//                 "', tomonumero='" . $m->getTomo() .
//                 "', tomoanio='" . $m->getAnio() .
//                 "' WHERE tomoid=" . $m->getIdManga() . ";";
// echo $b->updateTBManga($m);
// $empB = new empleadoBusiness();
// $empleado = new empleado(0, "111", "11", "111","111", 1);
// echo $empB->insertTBEmpleado($empleado);