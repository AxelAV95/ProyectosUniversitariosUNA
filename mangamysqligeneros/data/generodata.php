<?php

include_once 'data.php';
include '../domain/genero.php';

class GeneroData extends Data {

    
    public function getTBGenerosManga($id) {
        //$data = new Data();
       // parent::__construct();
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT generonombre FROM tbgenero WHERE generoid=".$id;
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $currentGenero = null;
        while ($row = mysqli_fetch_array($result)) {
            $currentGenero = $row['generonombre'];
            
        }
        return $currentGenero;
    }

    public function getAllTBGeneros() {
        //$data = new Data();
       // parent::__construct();
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbgenero";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $generos = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentGenero = new Genero($row['generoid'], $row['generonombre']);
            array_push($generos, $currentGenero);
        }
        return $generos;
    }
    
}
//$data = new MangaData();
//$manga = new Manga(0,"dasd", 23, 2012);
//echo $data->insertTBManga($manga);
// $empleadoData = new empleadoData();
// print_r($empleadoData->getAllTBEmpleado());
