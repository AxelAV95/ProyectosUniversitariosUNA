<?php

include_once 'data.php';
include '../domain/manga.php';

class MangaData extends Database {

    public function MangaData(){

    }

    public function validarMangaDuplicado($nombre){
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = 'select count(*) as total from tbtomo where tomonombre = ?';
            $result = $pdo->prepare($consulta);
            $result->bindParam(1,$nombre,PDO::PARAM_STR);
            $result->execute();

            if($result->fetchColumn()==0){ //si no existe el dato lo inserto
                 return false;
            }else{ //si ya existe el dato lo redirecciono para mostrar el mensaje
                 return true;
            }
        }


    public function insertTBManga($manga) {
        $mangadata = new MangaData();

        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($mangadata -> validarMangaDuplicado($manga->getNombre())== true){
            return false;
        }else{
            $stmt = $pdo ->prepare("SELECT MAX(tomoid) AS tomoid  FROM tbtomo");
            $stmt -> execute();
            $nextId = 1;
                
            if($row = $stmt->fetch()){
                    $nextId = $row[0]+1;
            }

            $sql = "INSERT INTO tbtomo VALUES(?,?,?,?)";
            $q = $pdo->prepare($sql);
            $result = $q->execute(array($nextId, $manga->getNombre(),$manga->getTomo(),$manga->getAnio()));
        }

        

        Database::desconectar();
           
        return $result;
    }

    public function updateTBManga($manga) {
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $update = 'UPDATE `tbtomo` SET `tomonombre`=:nombre,`tomonumero`=:numero,`tomoanio`=:anio WHERE `tomoid` =:id ';

        $nombre = $manga->getNombre();
        $numero = $manga->getTomo();
        $anio= $manga->getAnio();
        $id = $manga->getIdManga();
        $q = $pdo->prepare($update);
        $q -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $q -> bindParam(':numero', $numero, PDO::PARAM_INT);
        $q -> bindParam(':anio', $anio , PDO::PARAM_INT);
        $q -> bindParam(':id',$id , PDO::PARAM_INT);

        $result = $q -> execute();
        Database::desconectar();

        return $result;
    }

    public function deleteTBManga($idmanga) {
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbtomo WHERE tomoid = ?";
           
        $q = $pdo->prepare($sql);
           
        $result = $q->execute(array($idmanga));
       
        return $result;
    }

    public function getAllTBManga() {
       $pdo = Database::conectar();
       $stm = $pdo->prepare("SELECT * FROM tbtomo");
       $stm->execute();
       Database::desconectar();
       return $stm->fetchAll(PDO::FETCH_ASSOC);
    }


    
}

// $mangaData = new MangaData();
// print_r($mangaData ->getAllTBManga());
