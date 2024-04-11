<?php 
	
	require_once "../controlador/texto.controlador.php";
	require_once "../modelo/texto.modelo.php";
	


	if(isset($_POST["tipo"] )== "insertar" && isset($_POST["texto"]) ){

	  
	  $dato = $_POST["texto"];
	  $resultado = ControladorTexto::insertarTexto($dato);

	   echo json_encode($resultado);

	}else if(isset($_POST["tipo"] )== "actualizar" && isset($_POST['textoActualizar']) ){

	  $id = $_POST['id']; //texto que está en la tabla y que se va modificar
	 
	  $nuevoTexto = $_POST["textoActualizar"]; //texto nuevo
	   $resultado = ControladorTexto::modificarTexto($id,$nuevoTexto);
	 

	   echo json_encode( $resultado);

	}else if(isset($_POST["tipo"]) == "borrar"){
		
		$valor = $_POST['valor'];
		$resultado = ControladorTexto::eliminarTexto($valor);
	 

		echo json_encode($resultado);

	}





 ?>