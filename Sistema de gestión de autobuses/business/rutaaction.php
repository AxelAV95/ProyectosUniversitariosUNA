<?php 

	include 'rutabusiness.php';


	if (isset($_POST['actualizar'])){

     
    if ( !empty($_POST)) {
         
        // keep track post values
        $id = $_POST['id'];
        $codigo = $_POST['codigo'];
        $salida= $_POST['salida'];
        $destino= $_POST['destino'];
        $tarifaMi= $_POST['tarifaMi'];
        $tarifaMa= $_POST['tarifaMa'];
        $tiempoPromedio= $_POST['tiempoPromedio'];

        $ruta = new Ruta();
        $ruta -> setCodigo($codigo);
        $ruta -> setSalida($salida);
        $ruta -> setDestino($destino);
        $ruta -> setTarifaMinima($tarifaMi);
        $ruta -> setTarifaMaxima($tarifaMa);
        $ruta -> setTiempoPromedio($tiempoPromedio);
        $ruta -> setIdRuta($id);

        $rutaBuss = new RutaBusiness();
        $rutaBuss -> actualizarRuta($ruta);    
        
    }

   
} else if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        $rutaBuss = new RutaBusiness();
        $rutaBuss -> eliminarRuta($id);
         
    }

   
} else if (isset($_POST['insertar'])) {

   if ( !empty($_POST)) {
        // keep track post values
        $codigo = $_POST['codigo'];
        $salida= $_POST['salida'];
        $destino= $_POST['destino'];
        $tarifaMi= $_POST['tarifaMi'];
        $tarifaMa= $_POST['tarifaMa'];
        $tiempoPromedio= $_POST['tiempoPromedio'];
       
            $ruta = new Ruta();
            $ruta -> setCodigo($codigo);
            $ruta -> setSalida($salida);
            $ruta -> setDestino($destino);
            $ruta -> setTarifaMinima($tarifaMi);
            $ruta -> setTarifaMaxima($tarifaMa);
            $ruta -> setTiempoPromedio($tiempoPromedio);

            $rutaBuss = new RutaBusiness();
            $rutaBuss -> insertarRuta($ruta);
        }
    
}else if (isset($_POST['leer'])) {


    

   
}

?>