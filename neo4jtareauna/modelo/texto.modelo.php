<?php 

require_once "conexion.php";

class ModeloTexto
{
	
	static public function obtenerTextos(){

		 $resultado = Conexion::conectar()->run(
   			'MATCH (n:Texto) RETURN n LIMIT 25'
   		);


	    $datos = array();
	    $i = 0;
	    foreach ($resultado as $result) {
		    // Returns a Node
		    $node = $result->get('n');
		    // echo $node->getProperty('id');
		    // echo $node->getProperty('descripcion');

		    $aux = array('id' => $i, 'texto' => str_replace('_', ' ',$node->getProperty('descripcion')));
		    array_push($datos,$aux);
		    $i++;	 	
	  
		}

		return $datos;
		

	}

	static public function insertarTexto($texto){


	 $resultado = Conexion::conectar()->run(
	    'CREATE (ee:Texto {descripcion: "'.$texto.'"})' 
		);
			
		return $resultado;

	}
	

	static public function modificarTexto($id,$nuevoTexto){
		$resultado = Conexion::conectar()->run(
   		 'MATCH (n:Texto {descripcion: "'.$id.'"}) SET n.descripcion = "'.str_replace(' ', '_', $nuevoTexto).'"' 
		);

		return $resultado;
	}

	static public function eliminarTexto($valor){

		$resultado = Conexion::conectar()->run(
   		 'MATCH (n:Texto {descripcion: "'.$valor.'"}) DELETE n' 
		);

		return $resultado;
	}
}


 ?>