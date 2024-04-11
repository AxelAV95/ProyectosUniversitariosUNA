<?php

include_once 'data.php';
include '../domain/manga.php';

class MangaData extends Data {


    public function validarRepeticionManga($manganombre){
        $verificacion = false;
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $consulta = "SELECT COUNT(*) as total FROM tbtomo WHERE tomonombre = '".$manganombre."'";
        $result = mysqli_query($conn, $consulta);

        
        if($result->fetch_row()[0] == 1){
             $verificacion = true;
        }

        return $verificacion;
       
    }

    public function insertTBManga($manga) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $dataManga = new MangaData();
        //Get the last id
        $queryGetLastId = "SELECT MAX(tomoid) AS tomoid  FROM tbtomo";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbtomo VALUES (" . $nextId . ",'" .
                $manga->getNombre() . "','" .
                $manga->getTomo() . "','" .
                $manga->getAnio() . "','" .
                1 . "');";

        if($dataManga->validarRepeticionManga($manga->getNombre())){
             $result = 0;
        }else{
             $result = mysqli_query($conn, $queryInsert);
        }
       
        mysqli_close($conn);
        return $result;
    }

    public function updateTBManga($manga) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
       $queryUpdate = "UPDATE tbtomo SET tomonombre='" . $manga->getNombre() .
                "', tomonumero='" . $manga->getTomo() .
                "', tomoanio='" . $manga->getAnio() .
                "' WHERE tomoid=" . $manga->getIdManga() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function deleteTBManga($idmanga) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbtomo where tomoid =" . $idmanga . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllTBManga() {
        //$data = new Data();
       // parent::__construct();
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbtomo";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $mangas = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentManga = new Manga($row['tomoid'], $row['tomonombre'], $row['tomonumero'], $row['tomoanio']);
            array_push($mangas, $currentManga);
        }
        return $mangas;
    }
    
}

$mangaData = new MangaData();
if($mangaData->validarRepeticionManga("Bleach")){
    echo "si hay";
}else{
    echo "no hay";
}

// $empleadoData = new empleadoData();
// print_r($empleadoData->getAllTBEmpleado());
