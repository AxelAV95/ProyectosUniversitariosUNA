<?php 

	include 'rutatarifabusiness.php';


    if (isset($_POST['actualizar'])) {

        if ( !empty($_POST)) {
           $id = $_POST['id'];
           $lugar = $_POST['lugar'];
           $monto = $_POST['monto'];
          
           $aux1 = "";
            foreach ($lugar as $option1 ) {
               $aux1 .= $option1.'-';
            }
            $lugaresinsertados = trim($aux1, '-');

            $aux2 = "";
            foreach ($monto as $option2 ) {
            $aux2 .= $option2.'-';
            }
            $montosinsertados = trim($aux2, '-');

        $rutatarifa = new Rutatarifa();
        $rutatarifa -> setTarifaid($id);
        $rutatarifa -> setLugar($lugaresinsertados);
        $rutatarifa -> setMontoCobrar($montosinsertados);
        $rutBuss = new RutatarifaBusiness();
        $rutBuss -> actualizarRutaTarifa($rutatarifa);
   

        }
   

  
} else if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
        // keep track post values
        $rutaid = $_POST['id'];
         
        $rutaTarifaBuss = new RutaTarifaBusiness();
        $rutaTarifaBuss -> eliminarRutaTarifa($rutaid);
         
    }

   
} else if (isset($_POST['insertar'])) {

   if ( !empty($_POST)) {

        // keep track post values
        $rutaid = $_POST['rutaid'];
        $idaVuelta = $_POST['idaVuelta'];

        $lugaresIDA=  $_POST['subruta'];
        $monto = $_POST['monto'];
        $lugaresVUELTA = array_reverse($lugaresIDA);
        $monto2 = $_POST['monto'];

        
        /*$lugar1= $_POST['lugar1'];
        $monto1= $_POST['monto1'];
        $lugar2= $_POST['lugar2'];
        $monto2= $_POST['monto2'];*/
        //======================================
        $aux1 = "";
        foreach ($lugaresIDA as $option ) {
            $aux1 .= $option.'-';
        }
        $lugaresIDAtrim = trim($aux1, '-');
        //======================================
        $aux2 = "";
        foreach ($monto as $option ) {
            $aux2 .= $option.'-';
        }
        $montoTrim = trim($aux2, '-');
        
        $aux3 = "";
        foreach ($lugaresVUELTA as $option ) {
            $aux3 .= $option.'-';
        }
        $lugaresVueltaTrim = trim($aux3, '-');
        //======================================
       /* $aux3 = "";
        foreach ($lugar2 as $option ) {
            $aux3 .= $option.'-';
        }
        $lugarIngresado2 = trim($aux3, '-');
        //======================================
        $aux4 = "";
        foreach ($monto2 as $option ) {
            $aux4 .= $option.'-';
        }
        $montoIngresado2 = trim($aux4, '-');*/

            $rutaTarifa = new RutaTarifa();
            $rutaTarifa -> setIdaVuelta($idaVuelta);
            $rutaTarifa -> setLugar($lugaresIDAtrim);
            $rutaTarifa -> setMontoCobrar($montoTrim);
            $rutaTarifa -> setRutaid($rutaid);
            
            $rutaTarifa2 = new RutaTarifa();
            $rutaTarifa2 -> setIdaVuelta($idaVuelta);
            $rutaTarifa2 -> setLugar($lugaresVueltaTrim);
            $rutaTarifa2 -> setMontoCobrar($montoTrim);
			$rutaTarifa2 -> setRutaid($rutaid);

            $rutaTarifaBuss = new RutaTarifaBusiness();
            $rutaTarifaBuss -> insertarRutaTarifa($rutaTarifa,$rutaTarifa2);
            
    }
 

}else if (isset($_POST['insertar2'])) {

    if ( !empty($_POST)) {
 
         // keep track post values
         $rutaid = $_POST['rutaid'];
         $idaVuelta = $_POST['idaVuelta'];
 
         $lugaresIDA=  $_POST['subruta'];
         $monto = $_POST['monto'];
         $lugaresVUELTA = array_reverse($lugaresIDA);
         $monto2 = $_POST['monto'];
         //======================================
         $aux1 = "";
         foreach ($lugaresIDA as $option ) {
             $aux1 .= $option.'-';
         }
         $lugaresIDAtrim = trim($aux1, '-');
         //======================================
         $aux2 = "";
         foreach ($monto as $option ) {
             $aux2 .= $option.'-';
         }
         $montoTrim = trim($aux2, '-');
         
         $aux3 = "";
         foreach ($lugaresVUELTA as $option ) {
             $aux3 .= $option.'-';
         }
         $lugaresVueltaTrim = trim($aux3, '-');
         //======================================
 
             $rutaTarifa = new RutaTarifa();
             $rutaTarifa -> setIdaVuelta($idaVuelta);
             $rutaTarifa -> setLugar($lugaresIDAtrim);
             $rutaTarifa -> setMontoCobrar($montoTrim);
             $rutaTarifa -> setRutaid($rutaid);
             
             $rutaTarifa2 = new RutaTarifa();
             $rutaTarifa2 -> setIdaVuelta($idaVuelta);
             $rutaTarifa2 -> setLugar($lugaresVueltaTrim);
             $rutaTarifa2 -> setMontoCobrar($montoTrim);
             $rutaTarifa2 -> setRutaid($rutaid);
 
             $rutaTarifaBuss = new RutaTarifaBusiness();
             $rutaTarifaBuss -> insertarRutaTarifa2($rutaTarifa,$rutaTarifa2);
             
     }
  
 
 }else if (isset($_POST['leer'])) {
   
}

?>