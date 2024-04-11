<?php

include './mangabusiness.php';

if (isset($_POST['update'])) {

    if (isset($_POST['nombre']) && isset($_POST['numerotomo']) && isset($_POST['anio']) && isset($_POST['mangaid']) ) {
        $id = $_POST['mangaid'];
        $nombre = $_POST['nombre'];
        $tomo = $_POST['numerotomo'];
        $anio = $_POST['anio'];
   
       
        
        if (strlen($nombre) > 0 && strlen($tomo) > 0 && strlen($anio) && strlen($id)) {

            $manga = new Manga($id, $nombre, $tomo, $anio);

                $mangaBusiness = new MangaBusiness();

                $result = $mangaBusiness->updateTBManga($manga);

                if ($result == 1) {
                    header("location: ../view/mangaview.php?success=updated");
                } else {
                    header("location: ../view/mangaview.php?error=dbError");
                }
        } else {
            header("location: ../view/mangaview.php?error=emptyField");
        }
    } else {
        header("location: ../view/mangaview.php?error=dbError");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['mangaid'])) {

        $id = $_POST['mangaid'];

        $mangaBusiness = new MangaBusiness();
        $result = $mangaBusiness->deleteTBManga($id);

        if ($result == 1) {
            header("location: ../view/mangaview.php?success=deleted");
        } else {
            header("location: ../view/mangaview.php?error=dbError");
        }
    } else {
        header("location: ../view/mangaview.php?error=error");
    }
} else if (isset($_POST['create'])) {

    if (isset($_POST['nombre']) && isset($_POST['numerotomo']) && isset($_POST['anio'])  ) {
        $nombre = $_POST['nombre'];
        $tomo = $_POST['numerotomo'];
        $anio = $_POST['anio'];
   

        if (strlen($nombre) > 0 && strlen($tomo) > 0 && strlen($anio)) {

             $manga = new Manga(0, $nombre, $tomo, $anio);

                $mangaBusiness = new MangaBusiness();

                $result = $mangaBusiness->insertTBManga($manga);

                if ($result == 1) {
                    header("location: ../view/mangaview.php?success=inserted");
                } else {
                    header("location: ../view/mangaview.php?error=dbError");
                }
        } else {
            header("location: ../view/mangaview.php?error=emptyField");
        }
    } else {
        header("location: ../view/mangaview.php?error=error");
    }
}