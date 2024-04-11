<?php

include_once 'data.php';
include '../domain/manga.php';

class MangaData extends Data {

    public function insertTBManga($manga) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tomoid) AS tomoid  FROM tbtomo";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
       echo $queryInsert = "INSERT INTO tbtomo VALUES (" . $nextId . ",'" .
                $manga->getNombre() . "','" .
                $manga->getTomo() . "','" .
                $manga->getAnio() . "','".
                $manga->getGeneros() . "');";

        $result = mysqli_query($conn, $queryInsert);
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

    public function actualizarGeneros($generos,$id){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
       $queryUpdate = "UPDATE tbtomo SET 
                 tomogenero='" . $generos .
                "' WHERE tomoid=" . $id . ";";

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

    public function getMangaGeneros($id){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $querySelect = "SELECT tomogenero FROM tbtomo WHERE tomoid=".$id;

        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $generos = null;
        while ($row = mysqli_fetch_array($result)) {
            $generos = $row['tomogenero'];
            
        }
        return $generos;

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
//$data = new MangaData();
//$manga = new Manga(0,"dasd", 23, 2012);
//echo $data->insertTBManga($manga);
// $empleadoData = new empleadoData();
// print_r($empleadoData->getAllTBEmpleado());
