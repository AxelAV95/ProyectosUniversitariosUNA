<?php 

class ControladorTexto
{
	
	static public function obtenerTextos(){

		$respuesta = ModeloTexto::obtenerTextos();

		return $respuesta;
		

	}

	static public function insertarTexto($texto){

		$respuesta = ModeloTexto::insertarTexto($texto);

		echo json_encode($respuesta);

			

	}
	

	static public function modificarTexto($id,$texto){
		$respuesta = ModeloTexto::modificarTexto($id,$texto);

		echo json_encode($respuesta);
		
	}

	static public function eliminarTexto($texto){
		$respuesta = ModeloTexto::eliminarTexto($texto);

		echo json_encode($respuesta);
		
	}
}




 ?>