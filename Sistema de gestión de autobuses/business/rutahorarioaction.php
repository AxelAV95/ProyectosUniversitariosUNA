<?php 

	include 'rutahorarioBusiness.php';

	if (isset($_POST['insertar'])) {

   if ( !empty($_POST)) {
         
        // keep track post values
        $idruta = $_POST['idruta'];
        $tipodia= $_POST['tipodia'];
        $hora= $_POST['hora'];
		$bus= $_POST['bus'];
		$idavuelta = $_POST['idaVuelta'];
        $aux1 = "";
		$aux2 = "";

        foreach ($hora as $option1 ) {
                $aux1 .= $option1.'-';
        }
		foreach ($bus as $option2 ) {
                $aux2 .= $option2.'-';
        }
		
        $trimhorasinsertadas = trim($aux1, '-');
		$trimbusesinsertados = trim($aux2, '-');
         
        
		$rutahorario = new RutaHorario();
		$rutahorario -> setRutaid($idruta);
		$rutahorario -> setTipodia($tipodia);
		$rutahorario -> setHora($trimhorasinsertadas);
		$rutahorario -> setBus($trimbusesinsertados);
		$rutahorario -> setIdavuelta($idavuelta);

		$horBuss = new RutahorarioBusiness();
		$horBuss -> insertarHorario($rutahorario);
        
   }
    } 	else if (isset($_POST['insertar2'])) {

        if ( !empty($_POST)) {
              
             // keep track post values
             $horaioid = $_POST['rutahorarioid'];
             $idruta = $_POST['idruta']; 
             $tipodia= $_POST['tipodia'];
             $hora= $_POST['hora'];
             $bus= $_POST['bus'];
             $idavuelta = $_POST['idaVuelta'];
             $aux1 = "";
             $aux2 = "";
     
             foreach ($hora as $option1 ) {
                     $aux1 .= $option1.'-';
             }
             foreach ($bus as $option2 ) {
                     $aux2 .= $option2.'-';
             }
             
             $trimhorasinsertadas = trim($aux1, '-');
             $trimbusesinsertados = trim($aux2, '-');
              
             
             $rutahorario = new RutaHorario();
             $rutahorario -> setHorarioid($horaioid);
             $rutahorario -> setRutaid($idruta);
             $rutahorario -> setTipodia($tipodia);
             $rutahorario -> setHora($trimhorasinsertadas);
             $rutahorario -> setBus($trimbusesinsertados);
             $rutahorario -> setIdavuelta($idavuelta);
     
             $horBuss = new RutahorarioBusiness();
             $horBuss -> insertarHorario2($rutahorario);
             
        }
         }else if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
        // keep track post values
        $idhorario = $_POST['idhorario'];
        $horBuss = new RutahorarioBusiness();
        $horBuss -> eliminarHorario($idhorario);
         
    }
	
}else if (isset($_POST['actualizar'])) {

         if ( !empty($_POST)) {
            $idhorario = $_POST['idhorario'];
            $hora = $_POST['hora'];
			$bus= $_POST['bus'];
            $aux1 = "";
			$aux2 = "";

        foreach ($hora as $option1 ) {
                $aux1 .= $option1.'-';
        }
		foreach ($bus as $option2 ) {
                $aux2 .= $option2.'-';
        }

        $trimhorasinsertadas = trim($aux1, '-');
		$trimbusesinsertados = trim($aux2, '-');
		$rutahorario = new RutaHorario();
		$rutahorario -> setHorarioid($idhorario);
        $rutahorario -> setHora($trimhorasinsertadas);
		$rutahorario -> setBus($trimbusesinsertados);
        $horBuss = new rutahorarioBusiness();
        $horBuss -> actualizarHorario($rutahorario);
	

         }
    

   
}else if (isset($_POST['leer'])) {

}

?>