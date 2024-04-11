<?php

include '../data/mangadata.php';

class MangaBusiness {

    private $mangaData;

    public function MangaBusiness() {
        $this->mangaData = new MangaData();
    }

    public function insertTBManga($manga) {
        return $this->mangaData->insertTBManga($manga);
    }

    public function updateTBManga($manga) {
        return $this->mangaData->updateTBManga($manga);
    }

    public function deleteTBManga($idmanga) {
        return $this->mangaData->deleteTBManga($idmanga);
    }

    public function getAllTBManga() {
        return $this->mangaData->getAllTBManga();
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