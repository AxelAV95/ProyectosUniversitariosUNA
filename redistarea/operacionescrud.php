

<?php 

	/*Configuraciones con el REDIS de este lado*/
	include_once "config.php";




	
	if(isset($_POST["tipo"] )== "insertar" && isset($_POST["texto"]) ){

	  
	  $dato = $_POST["texto"];
	  $redis->rpush("listatexto", $dato); 
	  

	   echo json_encode($dato);

	}else if(isset($_POST["tipo"] )== "actualizar" && isset($_POST['textoActualizar']) ){

	  $id = $_POST['id'];
	  $key = $_POST['key'];
	  $nuevoTexto = $_POST["textoActualizar"];
	  $redis->lSet($key, $id, $nuevoTexto);

	   echo json_encode( $redis);

	}else if(isset($_POST["tipo"]) == "borrar"){
		$id = $_POST['id'];
		$key = $_POST['key'];
		$valor = str_replace('_', ' ', $_POST['valor']); 
		$redis->lRem($key, $valor,$id); 

		echo json_encode($redis);

	}





 ?>