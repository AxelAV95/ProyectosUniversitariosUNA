<?php 

	echo $mangaid = $_POST['mangaid'];
        $generos = $_POST['generos'];
        $cadenagenerosid = "";
        foreach($generos as $genero){
            $cadenagenerosid .= $genero.',';
        }
        echo $cadenagenerosid;
	print_r($mangas);

 ?>